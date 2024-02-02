<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function products_get() {
        $products = Product::get();
        $wallets = Wallet::where('user_id', auth()->user()->id)->where('status', 'success')->get();

        $credit = 0;
        $debit = 0;

        foreach($wallets as $wallet) {
            $credit += $wallet->credit;
            $debit += $wallet->debit;
        }
        $balance = $credit - $debit;

        return view('student.products', compact('balance', 'products'));
    }

    public function products_post($id) {
        $product = Product::find($id);

        Transaction::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'status' => 'pending'
        ]);

        return redirect()->back();
    }

    public function withdraw_get() {
        $wallets = Wallet::where('user_id', auth()->user()->id)->where('status', 'success')->get();

        $credit = 0;
        $debit = 0;

        foreach($wallets as $wallet) {
            $credit += $wallet->credit;
            $debit += $wallet->debit;
        }
        $balance = $credit - $debit;

        return view('student.withdraw', compact('balance'));
    }

    public function topup_get() {
        $wallets = Wallet::where('user_id', auth()->user()->id)->where('status', 'success')->get();

        $credit = 0;
        $debit = 0;

        foreach($wallets as $wallet) {
            $credit += $wallet->credit;
            $debit += $wallet->debit;
        }
        $balance = $credit - $debit;

        return view('student.topup', compact('balance'));
    }

    public function withdraw_post(Request $request) {
        if($request->debit == null) {
            return redirect()->back()->with('error', 'Requested debit null');
        }

        if($request->debit < 0) {
            return redirect()->back()->with('error', 'Requested debit cannot be negative');
        }

        $wallets = Wallet::where('user_id', auth()->user()->id)->where('status', 'success')->get();

        $credit = 0;
        $debit = 0;

        foreach($wallets as $wallet) {
            $credit += $wallet->credit;
            $debit += $wallet->debit;
        }
        $balance = $credit - $debit;

        if($request->debit > $balance) {
            return redirect()->back()->with('error', 'Insufficient balance');
        }

        Wallet::create([
            'user_id' => auth()->user()->id,
            'debit' => $request->debit,
            'status' => 'success'
        ]);

        return redirect()->back()->with('success', 'Withdraw successful');
    }

    public function topup_post(Request $request) {
        if($request->credit == null) {
            return redirect()->back()->with('error', 'Requested credit null');
        }

        if($request->debit < 0) {
            return redirect()->back()->with('error', 'Requested credit cannot be negative');
        }

        Wallet::create([
            'user_id' => auth()->user()->id,
            'credit' => $request->credit,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Top up request sent');
    }

    public function cart_get() {
        $cart = Transaction::where('user_id', auth()->user()->id)->where('status', 'pending')->get();
        $wallets = Wallet::where('user_id', auth()->user()->id)->where('status', 'success')->get();

        $credit = 0;
        $debit = 0;

        foreach($wallets as $wallet) {
            $credit += $wallet->credit;
            $debit += $wallet->debit;
        }
        $balance = $credit - $debit;

        $totalprice = 0;

        foreach($cart as $item) {
            $totalprice += $item->product->price;
        }

        return view('student.cart', compact('cart', 'balance', 'totalprice'));
    }

    public function cart_post() {
        $cart = Transaction::where('user_id', auth()->user()->id)->where('status', 'pending')->get();
        $wallets = Wallet::where('user_id', auth()->user()->id)->where('status', 'success')->get();

        if(count($cart) < 1) {
            return redirect('/student/products')->with('status', 'Empty cart');
        }

        $credit = 0;
        $debit = 0;

        foreach($wallets as $wallet) {
            $credit += $wallet->credit;
            $debit += $wallet->debit;
        }
        $balance = $credit - $debit;

        $totalprice = 0;

        foreach($cart as $item) {
            $totalprice += $item->product->price;
        }

        if($totalprice > $balance) {
            return redirect()->back()->with('error', 'Insufficient balance');
        }
        else {
            Wallet::create([
                'user_id' => auth()->user()->id,
                'debit' => $totalprice,
                'status' => 'success'
            ]);

            $code = bin2hex(random_bytes(3));

            foreach($cart as $item) {
                $name = $item->product->name;

                if($item->product->stock <= 0) {
                    return redirect()->back()->with('error', "Product \"$name\" is out of stock");
                }

                $item->update([
                    'code' => "SKS_$code",
                    'status' => 'success'
                ]);


                $item->product->update([
                    'stock' => $item->product->stock-1
                ]);
            }

            return redirect("/student/transactions")->with('success', "Order SKS_$code has been purchased");
        }
    }

    public function cart_destroy($id) {
        $transaction = Transaction::find($id);
        $transaction->delete();
        return redirect()->back();
    }

    public function transactions_get() {
        $transactions = collect(Transaction::where('user_id', auth()->user()->id)->where('status', 'success')->latest()->get())->groupBy('code');
        return view('student.transactions', compact('transactions'));
    }

    public function invoice($code) {
        $transactions = Transaction::where('code', $code)->get();
        return view('layout.invoice', compact('transactions', 'code'));
    }
}
