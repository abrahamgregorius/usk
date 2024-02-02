@extends('layout.app')
@section('content')

<div class="section">
    <div class="section-head">
        <h1 class="text-2xl font-semibold">Topup</h1>
    </div>
    <div class="section-body mt-4">
        @if(session('error'))
            <div class="alert w-full bg-red-600 text-white my-4 py-2 px-4 rounded">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert w-full bg-green-600 text-white my-2 py-2 px-4 rounded">{{ session('success') }}</div>
        @endif
        <form action="/bank/topup" method="POST">
            @csrf
            <div class="form-control  flex flex-col gap-1">
                <label for="username">User</label>
                <select name="user_id" class="bg-slate-300 outline-none px-4 py-2 rounded" id="">
                    <option value="">--SELECT AN OPTION--</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-control  flex flex-col gap-1">
                <label for="credit">Credit</label>
                <input type="credit" name="credit" class="bg-slate-300 outline-none px-4 py-2 rounded" autocomplete="off" id="credit">
            </div>
            <div class="form-control mt-4">
                <button class="w-full bg-blue-950 hover:bg-blue-900 transition text-white py-2 rounded ">Topup</button>
            </div>
        </form>
    </div>
</div>

@endsection
