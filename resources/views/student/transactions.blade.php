@extends('layout.app')
@section('content')

<div class="section">
    <div class="section-head">
        <h1 class="text-2xl font-semibold">Past Transactions</h1>
        <p class="font-normal text-slate-500">Sorted from the latest, click the title to show receipt</p>
    </div>
    @if(session('success'))
        <div class="alert w-full bg-green-600 text-white my-2 py-2 px-4 rounded">{{ session('success') }}</div>
    @endif
    <div class="section-body flex flex-col gap-4 mt-4">
        @foreach($transactions as $key => $item)
            <div class="card shadow shadow-slate-600 p-4">
                <div class="card-head">
                    <a href="/student/invoice/{{ $key }}">
                        <h2 class="font-bold text-2xl">{{ $key }}</h2>
                    </a>
                    <p>{{ date_format($transactions[$key][0]->created_at, 'F d, Y (H:i)') }}</p>
                </div>
                <div class="card-body flex flex-col gap-2 mt-3">
                    @foreach($item as $key => $data)
                        <div class="card-body-inner">
                            <p class="text-xl font-semibold">{{ $data->product->name }}</p>
                            <p>Price: ${{ $data->product->price }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="card-foot w-full flex justify-end">
                </div>
            </div>
        @endforeach
    </div>
</div>



@endsection
