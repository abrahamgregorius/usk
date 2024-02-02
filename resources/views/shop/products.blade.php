@extends('layout.app')
@section('content')

<div class="section">
    <div class="section-head flex justify-between w-full">
        <h1 class="text-2xl font-semibold">Product Management</h1>
        <a href="/shop/products/create">
            <button class="px-4 py-2 bg-blue-800 rounded text-white hover:bg-blue-900 transition">Create new product</button>
        </a>
    </div>
    <div class="section-body flex flex-col mt-4">
        @if(session('error'))
            <div class="alert w-full bg-red-600 text-white mb-4 mt-2 py-2 px-4 rounded">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert w-full bg-green-600 text-white mb-2 mt-2 py-2 px-4 rounded">{{ session('success') }}</div>
        @endif
        <table class="w-full border border-slate-600">
            <thead>
                <tr class="border">
                    <th class="border border-slate-600 bg-blue-950 text-white p-3">ID</th>
                    <th class="border border-slate-600 bg-blue-950 text-white p-3">Thumbnail</th>
                    <th class="border border-slate-600 bg-blue-950 text-white p-3">Name</th>
                    <th class="border border-slate-600 bg-blue-950 text-white p-3">Stock</th>
                    <th class="border border-slate-600 bg-blue-950 text-white p-3">Price</th>
                    <th class="border border-slate-600 bg-blue-950 text-white p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="border border-slate-600">
                    <td class="border border-slate-600 p-3">{{ $product->id }}</td>
                    <td class="p-3 flex justify-center items-center">
                        <img class="h-[3rem] w-[3rem] object-cover object-center" src="{{ $product->thumbnail }}" alt="">
                    </td>
                    <td class="border border-slate-600 p-3 text-center">{{ $product->name }}</td>
                    <td class="border border-slate-600 p-3">{{ $product->stock }}</td>
                    <td class="border border-slate-600 p-3">{{ $product->price }}</td>
                    <td class=" border-slate-600 p-3">
                        <div class="buttons flex gap-3 w-full items-center justify-center">
                            <a href="/shop/products/{{ $product->id }}">
                                <button class="py-2 px-4 rounded bg-yellow-400 hover:bg-yellow-500 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5 19h1.425L16.2 9.225L14.775 7.8L5 17.575zm-1 2q-.425 0-.712-.288T3 20v-2.425q0-.4.15-.763t.425-.637L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.437.65T21 6.4q0 .4-.138.763t-.437.662l-12.6 12.6q-.275.275-.638.425t-.762.15zM19 6.4L17.6 5zm-3.525 2.125l-.7-.725L16.2 9.225z"/></svg>
                                </button>
                            </a>
                            <form action="/shop/products/{{ $product->id }}/delete" method="POST">
                                @csrf
                                <button class="py-2 px-4 rounded bg-red-400 hover:bg-red-500 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6q-.425 0-.712-.288T4 5q0-.425.288-.712T5 4h4q0-.425.288-.712T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5q0 .425-.288.713T19 6v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zm-7 11q.425 0 .713-.288T11 16V9q0-.425-.288-.712T10 8q-.425 0-.712.288T9 9v7q0 .425.288.713T10 17m4 0q.425 0 .713-.288T15 16V9q0-.425-.288-.712T14 8q-.425 0-.712.288T13 9v7q0 .425.288.713T14 17M7 6v13z"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
