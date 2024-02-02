@extends('layout.app')
@section('content')

<div class="section">
    <div class="section-head flex justify-between">
        <h1 class="text-2xl font-semibold">Withdraw</h1>
        <p>Balance: <span class="p-2 rounded bg-green-400">${{$balance}}</span></p>
    </div>
    <div class="section-body mt-4">
        @if(session('error'))
            <div class="alert w-full bg-red-600 text-white my-4 py-2 px-4 rounded">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert w-full bg-green-600 text-white my-2 py-2 px-4 rounded">{{ session('success') }}</div>
        @endif
        <form action="/student/withdraw" method="POST">
            @csrf
            <div class="form-control  flex flex-col gap-1">
                <label for="debit">Debit</label>
                <input type="number" name="debit" class="bg-slate-300 outline-none px-4 py-2 rounded" autocomplete="off" id="debit">
            </div>
            <div class="form-control mt-4">
                <button class="w-full bg-blue-950 hover:bg-blue-900 transition text-white py-2 rounded">Withdraw</button>
            </div>
            <div class="form-control flex items-center justify-center w-full text-slate-700 mt-5">
                <p>This will automatically reduce your balance</p>
            </div>
        </form>
    </div>
</div>

@endsection
