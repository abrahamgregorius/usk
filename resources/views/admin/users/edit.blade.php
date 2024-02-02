@extends('layout.app')
@section('content')

    <div class="section">
        <div class="section-head mb-4">
            <h1 class="text-2xl font-semibold">Edit user</h1>
        </div>
        <div class="section-body">
            <form action="/admin/users/{{ $user->id }}" class="flex gap-2 flex-col" method="POST">
                @csrf
                <div class="form-control  flex flex-col gap-1">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="bg-slate-300 outline-none px-4 py-2 rounded" value="{{ $user->username }}" autocomplete="off" id="username">
                </div>
                <div class="form-control  flex flex-col gap-1">
                    <label for="username">Role</label>
                    <select name="role" class="bg-slate-300 outline-none px-4 py-2 rounded" id="">
                        <option @if($user->role == "admin") selected @endif value="admin">admin</option>
                        <option @if($user->role == "shop") selected @endif value="shop">shop</option>
                        <option @if($user->role == "bank") selected @endif value="bank">bank</option>
                        <option @if($user->role == "student") selected @endif value="student">student</option>
                    </select>
                </div>
                <div class="form-control mt-4">
                    <button class="w-full bg-blue-950 hover:bg-blue-900 transition text-white py-2 rounded ">Update</button>
                </div>
            </form>
        </div>
    </div>



@endsection
