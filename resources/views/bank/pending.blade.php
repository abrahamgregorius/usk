@extends('layout.app')
@section('content')

<div class="section">
    <div class="section-head">
        <h1 class="text-2xl font-semibold">Pending Transactions</h1>
    </div>
    <div class="section-body mt-4">
        <table class="w-full border border-slate-600">
            <thead>
                <tr class="border border-slate-600">
                    <th class="border border-slate-600 bg-blue-950 text-white p-3">ID</th>
                    <th class="border border-slate-600 bg-blue-950 text-white p-3">Username</th>
                    <th class="border border-slate-600 bg-blue-950 text-white p-3">Credit</th>
                    <th class="border border-slate-600 bg-blue-950 text-white p-3">Timestamp</th>
                    <th class="border border-slate-600 bg-blue-950 text-white p-3">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach($wallets as $wallet)
                <tr class="border border-slate-600">
                    <td class="border border-slate-600 p-3">{{ $wallet->id }}</td>
                    <td class="border border-slate-600 p-3">{{ $wallet->user->username }}</td>
                    @if($wallet->credit)
                        <td class="border border-slate-600 p-3">{{ $wallet->credit }}</td>
                        @else
                        <td class="border border-slate-600 p-3">-</td>
                        @endif
                    <td class="border border-slate-600 p-3">{{ $wallet->created_at }}</td>
                    <td class="border border-slate-600 p-3 text-center">
                        <form action="/bank/transactions/pending/{{ $wallet->id }}" method="POST">
                            @csrf
                            <button class="px-4 py-2 bg-green-400 rounded">Accept</button>
                        </form>
                        <form action="/bank/transactions/pending/{{ $wallet->id }}/reject" method="POST">
                            @csrf
                            <button class="px-4 py-2 bg-green-400 rounded">Reject</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
