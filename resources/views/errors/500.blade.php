@extends('errors.layouts.main')

@section('title')
    500 Server Error -
@endsection

@section('content')
    <h1 class="text-6xl sm:text-7xl md:text-9xl font-bold text-black dark:text-light">500</h1>
    <p class="text-xl sm:text-2xl md:text-3xl font-light text-gray-800 dark:text-gray-200 mt-2">
        Wah, server lagi error nih
    </p>
    <p class="text-gray-800 dark:text-gray-200 mt-1">
        Tenang, ini bukan salahmu. Tim kami sedang memperbaikinya.
    </p>
    <a href="{{ url('/') }}" class="mt-3 inline-block px-6 py-3 text-light bg-main-gradient rounded-lg">
        Kembali ke Beranda
    </a>
@endsection