@extends('layout.app')
@section('content')
    <div class="section">
        <div class="section-head flex justify-between">
            <h1 class="text-2xl font-semibold">Available Products</h1>
            <p>Balance: <span class="p-2 rounded bg-green-400">${{$balance}}</span></p>
        </div>
        @if(session('error'))
            <div class="alert w-full bg-red-600 text-white my-4 py-2 px-4 rounded">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert w-full bg-green-600 text-white my-2 py-2 px-4 rounded">{{ session('success') }}</div>
        @endif
        <div class="section-body w-full flex justify-center mt-4">
            <div class="grid grid-cols-5 gap-3">
                @foreach($products as $product)
                    <div class="product shadow-lg shadow-slate-400 hover:shadow-xl hover:shadow-slate-400 transition rounded">
                        <div class="product-head">
                            <img class="w-full h-[17rem] object-center object-cover" src="{{ $product->thumbnail }}" alt="">
                        </div>
                        <div class="product-body pt-4 px-4">
                            <h2 class="text-2xl font-semibold @if($product->stock <= 0) mb-1 @endif">{{ $product->name }}</h2>
                            <span class="@if($product->stock <= 0) px-2 py-1 rounded bg-red-600 text-white @endif">Stock:  {{ $product->stock }}</span>
                            <p class="rounded text-red-600 text-2xl font-bold">${{ $product->price }}</p>
                        </div>
                        <div class="product-foot flex justify-end items-center p-2">
                            <form action="/student/products/{{ $product->id }}/cart" method="POST">
                                @csrf
                                <button @if($product->stock == 0) disabled @endif class="bg-red-500 @if($product->stock <= 0) cursor-not-allowed @endif px-4 py-1 rounded text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7 22q-.825 0-1.412-.587T5 20q0-.825.588-1.412T7 18q.825 0 1.413.588T9 20q0 .825-.587 1.413T7 22m10 0q-.825 0-1.412-.587T15 20q0-.825.588-1.412T17 18q.825 0 1.413.588T19 20q0 .825-.587 1.413T17 22M6.15 6l2.4 5h7l2.75-5zM5.2 4h14.75q.575 0 .875.513t.025 1.037l-3.55 6.4q-.275.5-.737.775T15.55 13H8.1L7 15h11q.425 0 .713.288T19 16q0 .425-.288.713T18 17H7q-1.125 0-1.7-.987t-.05-1.963L6.6 11.6L3 4H2q-.425 0-.712-.288T1 3q0-.425.288-.712T2 2h1.625q.275 0 .525.15t.375.425zm3.35 7h7z"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection
