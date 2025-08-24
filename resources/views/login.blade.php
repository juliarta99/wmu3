<!DOCTYPE html>
<html class="font-poppins scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Login - Workshop Multimedia Udayana' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.ico') }}">

    {{--  SEO Meta Tags --}}
    <meta name="description" content="{{ $description ?? 'Workshop Multimedia Udayana adalah sebuah kegiatan yang menggabungkan pembelajaran teori dan praktik di bidang videografi' }}">
    <meta name="keywords" content="{{ $keywords ?? 'workshop, multimedia, bem udayana, kominfo udayana, workshop multimedia, workshop multimedia udayana, workshop multimedia udayana 2025, kominfo bem udayana, workshop gratis, kamera, multimedia, workshop 2025' }}">
    <meta name="author" content="{{ $author ?? 'Kementerian Komunikasi dan Informasi Badan Eksekutif Mahasiswa Universitas Udayana' }}">
    <link rel="canonical" href="{{ $url ?? url()->current() }}">

    {{--  Open Graph Meta Tags --}}
    <meta property="og:url" content="{{ $url ?? url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? 'Login - Workshop Multimedia Udayana' }}">
    <meta property="og:description" content="{{ $description ?? 'Workshop Multimedia Udayana adalah sebuah kegiatan yang menggabungkan pembelajaran teori dan praktik di bidang videografi' }}">
    <meta property="og:image" content="{{ $image ?? asset('assets/images/meta-tag.png') }}">
    <meta property="og:site_name" content="Workshop Multimedia Udayana">

    {{--  Twitter Meta Tags --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:domain" content="{{ request()->getHost() }}">
    <meta name="twitter:url" content="{{ $url ?? url()->current() }}">
    <meta name="twitter:title" content="{{ $title ?? 'Login - Workshop Multimedia Udayana' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Workshop Multimedia Udayana adalah sebuah kegiatan yang menggabungkan pembelajaran teori dan praktik di bidang videografi' }}">
    <meta name="twitter:image" content="{{ $image ?? asset('assets/images/meta-tag.png') }}">

    {{--  Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @include('layouts.styles.tailwind')
</head>
<body class="bg-light overflow-hidden">
    <img src="{{ asset('assets/images/gradient-blur.png') }}" class="w-full absolute top-0 -z-1" />
    <div class="w-130 h-130 bg-seven/30 md:bg-seven/50 blur-[1000rem] absolute -bottom-1/2 -left-1/2 translate-x-1/2 -z-1"></div>
    <div class="w-130 h-130 bg-seven/30 md:bg-seven/50 blur-[1000rem] hidden lg:block absolute -top-1/2 -right-1/2 -translate-x-1/2 -z-1"></div>
    <section class="relative min-h-screen max-h-screen overflow-auto w-full flex items-center justify-center py-10 z-0">
        <form id="login-form" action="{{ route('login.post') }}" class="flex flex-col w-full gap-4 p-4 md:p-5 max-w-full md:max-w-2xl">
            @csrf
            <div class="flex flex-col items-center gap-2 w-max mx-auto">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" class="max-h-14" alt="">
                </a>
                <a href="{{ route('home') }}">
                    <h1 class="text-gray-700 dark:text-gray-100 font-medium text-base">Workshop Multimedia Udayana</h1>
                </a>
            </div>
            <h1 class="uppercase text-2xl md:text-3xl lg:text-4xl text-center font-bold">LOGIN</h1>
            <div class="flex flex-col gap-1">
                <div class="flex gap-1 items-center">
                    <label for="username" class="font-semibold text-sm md:text-base">Username</label>
                </div>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    class="border border-gray-300 bg-light px-4 py-2 text-sm md:text-base rounded-lg @error('username') border-red-500 @enderror" 
                    placeholder="Masukkan username anda"
                    value="{{ old('username') }}"
                >
                @error('username')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col gap-1">
                <div class="flex gap-1 items-center">
                    <label for="password" class="font-semibold text-sm md:text-base">Password</label>
                </div>
                <div class="relative">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="border border-gray-300 bg-light px-4 py-2 pr-12 text-sm md:text-base rounded-lg @error('password') border-red-500 @enderror w-full"
                        placeholder="Masukkan password anda"
                    >
                    <button
                        type="button"
                        id="toggle-password"
                        class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-gray-700 transition-colors duration-200"
                        title="Show/Hide Password"
                    >
                        <svg id="eye-open" class="size-5 md:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <svg id="eye-closed" class="size-5 md:size-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg> 
                    </button>
                </div>
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col gap-1">
                <div class="flex gap-2 items-center">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        name="remember" 
                        class="@error('remember') border-red-500 @enderror cursor-pointer" 
                        value="{{ old('remember') }}"
                    >
                    <label for="remember" class="text-sm md:text-base cursor-pointer">Remember Me</label>
                </div>
                @error('remember')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full p-[2px] rounded-full bg-gradient-to-r from-six to-seven inline-block">
                <button 
                    class="w-full cursor-pointer bg-main-gradient py-3 px-5 text-light rounded-full font-semibold text-sm md:text-base" 
                    type="submit"
                    id="submit-btn"
                >
                    <span id="submit-text">Login</span>
                    <span id="submit-loading" class="hidden">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Memeriksa data...
                    </span>
                </button>
            </div>
        </form>
    </section>

    <div id="modalContainer"></div>

    <script src="{{ asset('js/modal.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('js/form-handler.js') }}?v={{ time() }}"></script>
    <script>
        const modal = new ReusableModal();

        document.addEventListener('DOMContentLoaded', () => {
            const passwordInput = document.getElementById('password');
            const togglePasswordButton = document.getElementById('toggle-password');
            const eyeOpenIcon = document.getElementById('eye-open');
            const eyeClosedIcon = document.getElementById('eye-closed');

            togglePasswordButton.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeOpenIcon.classList.add('hidden');
                    eyeClosedIcon.classList.remove('hidden');
                    togglePasswordButton.title = 'Hide Password';
                } else {
                    passwordInput.type = 'password';
                    eyeOpenIcon.classList.remove('hidden');
                    eyeClosedIcon.classList.add('hidden');
                    togglePasswordButton.title = 'Show Password';
                }
            });

            window.formHandler = new FormHandler({
                formId: "login-form",
                redirectUrl: "{{ route('dashboard.index') }}",
                successMessage: "Login berhasil!",
                validators: (ctx) => {
                    let isValid = true;

                    const username = document.getElementById('username');
                    if (!username.value.trim()) {
                        ctx.showFieldError(username, 'Username wajib diisi.');
                        isValid = false;
                    }

                    const password = document.getElementById('password');
                    if (!password.value.trim()) {
                        ctx.showFieldError(password, 'Password wajib diisi.');
                        isValid = false;
                    }

                    return isValid;
                }
            });
        });
    </script>
</body>
</html>