@extends('layout.app')
@section('content')

<div class="section">
    <div class="section-head">
        <h1 class="text-2xl font-semibold">Transactions</h1>
    </div>
    <div class="section-body mt-4">
        <table class="w-full border border-slate-600">
            <thead>
                <tr class="border border-slate-600">
                    <th class="border border-slate-600 bg-blue-950 text-white p-3">ID</th>
                    <th class="border border-slate-600 bg-blue-950 text-white p-3">Username</th>
                    <th class="border border-slate-600 bg-blue-950 text-white p-3">Credit</th>
                    <th class="border border-slate-600 bg-blue-950 text-white p-3">Debit</th>
                    <th class="border border-slate-600 bg-blue-950 text-white p-3">Timestamp</th>
                    <th class="border border-slate-600 bg-blue-950 text-white p-3">Status</th>
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
                    @if($wallet->debit)
                        <td class="border border-slate-600 p-3">{{ $wallet->debit }}</td>
                    @else
                        <td class="border border-slate-600 p-3">-</td>
                    @endif
                    @if($wallet->created_at)
                        <td class="border border-slate-600 p-3">{{ $wallet->created_at }}</td>
                    @else
                        <td class="border border-slate-600 p-3">-</td>
                    @endif
                    <td class="border border-slate-600 p-3 text-center">
                        <span class="p-2 rounded @if($wallet->status == 'success') bg-green-400 @else bg-slate-600 text-white @endif">
                            {{ $wallet->status }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
