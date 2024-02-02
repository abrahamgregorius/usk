<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function withdraw_get() {
        $users = User::where('role', 'student')->get();
        return view('bank.withdraw', compact('users'));
    }

    public function withdraw_post(Request $request) {
        if($request->debit == null) {
            return redirect()->back()->with('error', 'Requested debit null');
        }

        if($request->debit < 0) {
            return redirect()->back()->with('error', 'Requested debit cannot be negative');
        }

        $wallets = Wallet::where('user_id', $request->user_id)->where('status', 'success')->get();

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
            'debit' => $request->debit,
            'user_id' => $request->user_id,
            'status' => 'success'
        ]);
        return redirect('/bank/transactions')->with('success', 'Withdraw successful');
    }

    public function topup_get() {
        $users = User::where('role', 'student')->get();
        return view('bank.topup', compact('users'));
    }

    public function topup_post(Request $request) {
        if($request->credit == null) {
            return redirect()->back()->with('error', 'Requested credit null');
        }

        if($request->debit < 0) {
            return redirect()->back()->with('error', 'Requested credit cannot be negative');
        }

        Wallet::create([
            'credit' => $request->credit,
            'user_id' => $request->user_id,
            'status' => 'success'
        ]);
        return redirect('/bank/transactions')->with('success', 'Top up request sent');
    }

    public function transactions_get() {
        $wallets = Wallet::latest()->get();
        return view('bank.transactions', compact('wallets'));
    }

    public function pending_get() {
        $wallets = Wallet::where('status', 'pending')->get();
        return view('bank.pending', compact('wallets'));
    }

    public function pending_post($id) {
        $wallet = Wallet::find($id);
        $wallet->update(['status' => 'success']);
        return redirect('/bank/transactions');
    }

    public function reject_post($id){
        $wallet = Wallet::find($id);
        $wallet->update(['status' => 'success']);
        return redirect('/bank/transactions');
    }
}
