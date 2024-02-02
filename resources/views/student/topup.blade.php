@extends('layout.app')
@section('content')

<div class="section">
    <div class="section-head flex justify-between">
        <h1 class="text-2xl font-semibold">Topup</h1>
        <p>Balance: <span class="p-2 rounded bg-green-400">${{$balance}}</span></p>
    </div>
    <div class="section-body mt-4">
        @if(session('error'))
            <div class="alert w-full bg-red-600 text-white my-4 py-2 px-4 rounded">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert w-full bg-green-600 text-white my-2 py-2 px-4 rounded">{{ session('success') }}</div>
        @endif
        <form action="/student/topup" method="POST">
            @csrf
            <div class="form-control  flex flex-col gap-1">
                <label for="credit">Credit</label>
                <input type="number" name="credit" class="bg-slate-300 outline-none px-4 py-2 rounded" autocomplete="off" id="credit">
            </div>
            <div class="form-control mt-4">
                <button class="w-full bg-blue-950 hover:bg-blue-900 transition text-white py-2 rounded ">Topup</button>
            </div>
            <div class="form-control flex items-center justify-center w-full text-slate-700 mt-5">
                <p>After clicking topup, wait until approval from The Bank</p>
            </div>
        </form>
    </div>
</div>

@endsection
