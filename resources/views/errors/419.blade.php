@extends('errors.layouts.main')

@section('title')
    419 Page Expired -
@endsection

@section('content')
    <h1 class="text-6xl sm:text-7xl md:text-9xl font-bold text-black dark:text-light">419</h1>
    <p class="text-xl sm:text-2xl md:text-3xl font-light text-gray-800 dark:text-gray-200 mt-2">
        Sesi kamu sudah habis
    </p>
    <p class="text-gray-800 dark:text-gray-200 mt-1">
        Silakan refresh halaman atau login ulang untuk melanjutkan.
    </p>
    <a href="{{ url()->current() }}" class="mt-3 inline-block px-6 py-3 text-light bg-main-gradient rounded-lg">
        Refresh Halaman
    </a>
@endsection