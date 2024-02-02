@extends('layout.app')
@section('content')

    <div class="section">
        <div class="section-head mb-4">
            <h1 class="text-2xl font-semibold">Create user</h1>
        </div>
        <div class="section-body">
            <form action="/admin/users/create" class="flex gap-2 flex-col" method="POST">
                @csrf
                <div class="form-control  flex flex-col gap-1">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="bg-slate-300 outline-none px-4 py-2 rounded" autocomplete="off" id="username">
                </div>
                <div class="form-control  flex flex-col gap-1">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="bg-slate-300 outline-none px-4 py-2 rounded" autocomplete="off" id="password">
                </div>
                <div class="form-control  flex flex-col gap-1">
                    <label for="username">Role</label>
                    <select name="role" class="bg-slate-300 outline-none px-4 py-2 rounded" id="">
                        <option value="">--SELECT AN OPTION--</option>
                        <option value="admin">admin</option>
                        <option value="shop">shop</option>
                        <option value="bank">bank</option>
                        <option value="student">student</option>
                    </select>
                </div>
                <div class="form-control mt-4">
                    <button class="w-full bg-blue-950 hover:bg-blue-900 transition text-white py-2 rounded ">Create</button>
                </div>
            </form>
        </div>
    </div>



@endsection
