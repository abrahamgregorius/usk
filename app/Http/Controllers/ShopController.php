<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function products_get() {
        $products = Product::get();
        return view('shop.products', compact('products'));
    }

    public function products_create() {
        return view('shop.products.create');
    }

    public function products_store(Request $request) {
        Product::create($request->all());
        return redirect('/shop/products')->with('success', 'Product successfully created');
    }

    public function products_edit($id) {
        $product = Product::find($id);
        return view('shop.products.edit', compact('product'));
    }

    public function products_update(Request $request, string $id) {
        $product = Product::find($id);
        $product->update($request->all());
        return redirect('/shop/products')->with('success', 'Product successfully updated');
    }

    public function products_destroy($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect('/shop/products')->with('success', 'Product successfully deleted');
    }

    public function transactions_get() {
        $transactions = collect(Transaction::where('status', 'success')->latest()->get())->groupBy('code');
        return view('shop.transactions', compact('transactions'));
    }
}
