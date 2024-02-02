<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users_get() {
        $users = User::get();
        return view('admin.users', compact('users'));
    }

    public function users_create() {
        return view('admin.users.create');
    }

    public function users_store(Request $request) {
        User::create($request->all());
        return redirect('/admin/users');
    }

    public function users_edit($id) {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function users_update(Request $request, string $id) {
        $user = User::find($id);
        $user->update($request->all());
        return redirect('/admin/users');
    }

    public function users_delete($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }


    public function transactions_get(){
        $transactions = collect(Transaction::where('status', 'success')->latest()->get())->groupBy('code');
        return view('admin.transactions', compact('transactions'));
    }
}
