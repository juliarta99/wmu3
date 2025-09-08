@extends('errors.layouts.main')

@section('title')
    Shortlink Kadaluarsa -
@endsection

@section('content')
    <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-black dark:text-light">Kadaluarsa</h1>
    <p class="text-xl sm:text-2xl md:text-3xl font-light text-gray-800 dark:text-gray-200 mt-2">
        Maaf, link ini sudah tidak berlaku lagi
    </p>
    <p class="text-gray-800 dark:text-gray-200 mt-1">
        Waktu akses sudah lewat, silakan hubungi penyelenggara jika perlu informasi lebih lanjut
    </p>
    <a href="{{ url('/') }}" class="mt-3 inline-block px-6 py-3 text-light bg-main-gradient rounded-lg">
        Kembali ke Beranda
    </a>
@endsection