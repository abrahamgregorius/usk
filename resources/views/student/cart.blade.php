@extends('layout.app')
@section('content')

<div class="section">
    <div class="section-head flex justify-between">
        <h1 class="text-2xl font-semibold">Cart</h1>
        <p>Balance: <span class="p-2 rounded bg-green-400">${{$balance}}</span></p>
    </div>
    <div class="section-body-wrapper w-full mt-4">
        @if(session('error'))
            <div class="alert w-full bg-red-600 text-white my-2 py-2 px-4 rounded">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert w-full bg-green-600 text-white my-2 py-2 px-4 rounded">{{ session('success') }}</div>
        @endif

        <div class="section-body-left flex flex-col">
            @foreach($cart as $item)
                <div class="card p-4 w-full shadow-lg shadow-slate-500 rounded justify-between flex items-center">
                    <div class="card-left flex flex-row">
                        <div class="card-head">
                            <img class="h-[7rem]" src="{{ $item->product->thumbnail }}" alt="">
                        </div>
                        <div class="card-body flex flex-col m-2 p-4">
                            <h3 class="text-xl font-semibold">{{ $item->product->name }}</h3>
                            <p class="">${{ $item->product->price }}</p>
                        </div>
                    </div>
                    <div class="card-right">
                        <form action="/student/cart/{{ $item->id }}/delete" method="POST">
                            @csrf
                            <button class="bg-red-500 rounded p-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6q-.425 0-.712-.288T4 5q0-.425.288-.712T5 4h4q0-.425.288-.712T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5q0 .425-.288.713T19 6v13q0 .825-.587 1.413T17 21zm5-7.1l1.9 1.9q.275.275.7.275t.7-.275q.275-.275.275-.7t-.275-.7l-1.9-1.9l1.9-1.9q.275-.275.275-.7t-.275-.7q-.275-.275-.7-.275t-.7.275L12 11.1l-1.9-1.9q-.275-.275-.7-.275t-.7.275q-.275.275-.275.7t.275.7l1.9 1.9l-1.9 1.9q-.275.275-.275.7t.275.7q.275.275.7.275t.7-.275z"/></svg></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="section-body-right gap-2 p-8 shadow-lg shadow-slate-500 rounded flex flex-col justify-center items-center">
            <div class="section-foot-price flex flex-col items-center">
                <p class="text-2xl font-semibold">Total price: ${{ $totalprice }}</p>
                <p class="text-md text-slate-500 font-normal">Check your purchases</p>
            </div>
            <div class="section-foot-btn mt-2 w-full">
                <form action="/student/cart" method="POST">
                    @csrf
                    <button class="w-full bg-blue-900 hover:bg-blue-800 text-white transition p-2 rounded">Pay now</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
