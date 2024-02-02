@extends('layout.app')
@section('content')

    <div class="section">
        <div class="section-head mb-4">
            <h1 class="text-2xl font-semibold">Create product</h1>
        </div>
        <div class="section-body">
            <form action="/shop/products/{{ $product->id }}" class="flex gap-2 flex-col" method="POST">
                @csrf
                <div class="form-control flex flex-col gap-1">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="bg-slate-300 outline-none px-4 py-2 rounded" autocomplete="off" id="name">
                </div>
                <div class="form-control flex flex-col gap-1">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" value="{{ $product->stock }}" class="bg-slate-300 outline-none px-4 py-2 rounded" autocomplete="off" id="stock">
                </div>
                <div class="form-control flex flex-col gap-1">
                    <label for="price">Price</label>
                    <input type="number" name="price" value="{{ $product->price }}" class="bg-slate-300 outline-none px-4 py-2 rounded" autocomplete="off" id="price">
                </div>
                <div class="form-control flex flex-col gap-1">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="text" name="thumbnail" value="{{ $product->thumbnail }}" class="bg-slate-300 outline-none px-4 py-2 rounded" autocomplete="off" id="thumbnail">
                </div>
                <div class="form-control mt-4">
                    <button class="w-full bg-blue-950 hover:bg-blue-900 transition text-white py-2 rounded ">Edit</button>
                </div>
            </form>
        </div>
    </div>



@endsection
