@extends('errors.layouts.main')

@section('title')
    429 Too Many Requests -
@endsection

@section('content')
    <h1 class="text-6xl sm:text-7xl md:text-9xl font-bold text-black dark:text-light">429</h1>
    <p class="text-xl sm:text-2xl md:text-3xl font-light text-gray-800 dark:text-gray-200 mt-2">
        Terlalu banyak permintaan
    </p>
    <p class="text-gray-800 dark:text-gray-200 mt-1">
        Santai dulu, coba lagi beberapa saat nanti ya.
    </p>
    <a href="{{ url()->previous() }}" class="mt-3 inline-block px-6 py-3 text-light bg-main-gradient rounded-lg">
        Coba Lagi
    </a>
@endsection