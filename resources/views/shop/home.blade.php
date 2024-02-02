@extends('layout.app')
@section('content')
    <div class="app h-[85vh] w-full flex justify-center items-center">
        <h1 class="text-4xl text-semibold">Welcome, {{ auth()->user()->username }}</h1>
    </div>
@endsection
