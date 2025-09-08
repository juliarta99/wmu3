@extends('layouts.dashboard.main')

@section('content')
    <div class="flex items-center gap-3">
        <a href="{{ route('dashboard.index') }}">
            <button class="cursor-pointer">
                <svg class="size-6 md:size-8 fill-black" viewBox="0 0 22 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.65961 15L16.9955 23.3946C17.3873 23.7892 17.5833 24.2915 17.5833 24.9013C17.5833 25.5112 17.3873 26.0135 16.9955 26.4081C16.6036 26.8027 16.1049 27 15.4993 27C14.8937 27 14.395 26.8027 14.0031 26.4081L4.17107 16.5067C3.95733 16.2915 3.80629 16.0583 3.71794 15.8072C3.62959 15.5561 3.58471 15.287 3.58328 15C3.58186 14.713 3.62674 14.4439 3.71794 14.1928C3.80914 13.9417 3.96018 13.7085 4.17107 13.4933L14.0031 3.59193C14.395 3.19731 14.8937 3 15.4993 3C16.1049 3 16.6036 3.19731 16.9955 3.59193C17.3873 3.98655 17.5833 4.48879 17.5833 5.09865C17.5833 5.70852 17.3873 6.21076 16.9955 6.60538L8.65961 15Z"/>
                </svg>
            </button>
        </a>
        <span class="text-xl md:text-2xl font-bold">Profile</span>
    </div>
    <p class="text-sm text-gray-500 mt-1">
        Hubungi Tim Web, jika terdapat kendala atau ingin mengetahui informasi lebih lanjut
    </p>
    <div class="flex flex-col gap-1 mt-5 mb-2">
        <div class="flex gap-1 items-center">
            <p class="font-semibold text-sm md:text-base">Username</p>
        </div>
        <input 
            type="text" 
            class="border disabled:bg-gray-200 disabled:text-gray-500 border-gray-300 px-4 py-2 text-sm md:text-base rounded-lg" 
            value="{{ Auth::user()->username }}"
            disabled
        >
    </div>
    <form id="update-password-form" action="{{ route('dashboard.profile.updatePassword') }}" method="POST" class="flex flex-col gap-4 mt-6">
        @csrf
        @method("PUT")
        <div class="flex flex-col gap-2">
            <div>
                <h2 class="text-base md:text-lg font-semibold">Update Password</h2>
                <p class="text-sm text-gray-500 mt-1">
                    Pastikan password baru kuat dan mudah diingat, minimal 8 karakter dengan kombinasi huruf, angka, dan simbol.
                </p>
            </div>
            @php
                $passwordFields = [
                    ['id' => 'current_password', 'label' => 'Password Saat Ini'],
                    ['id' => 'password', 'label' => 'Password Baru'],
                    ['id' => 'password_confirmation', 'label' => 'Konfirmasi Password Baru'],
                ];
            @endphp

            @foreach($passwordFields as $field)
                <div class="flex flex-col gap-1">
                    <div class="flex gap-1 items-center">
                        <label for="{{ $field['id'] }}" class="font-semibold text-sm md:text-base">
                            {{ $field['label'] }}
                        </label>
                        <span class="text-red-500">*</span>
                    </div>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="{{ $field['id'] }}" 
                            name="{{ $field['id'] }}" 
                            class="border border-gray-300 px-4 py-2 pr-12 text-sm md:text-base rounded-lg 
                                @error($field['id']) border-red-500 @enderror w-full"
                            placeholder="Masukkan {{ strtolower($field['label']) }}"
                            value="{{ old($field['id']) }}"
                        >
                        <button
                            type="button"
                            data-toggle="{{ $field['id'] }}"
                            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-gray-700 transition-colors duration-200 h-10"
                            title="Show/Hide Password"
                        >
                            <svg class="eye-open size-5 md:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <svg class="eye-closed size-5 md:size-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                    @error($field['id'])
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            @endforeach
        </div>
        <div class="flex flex-col gap-2 md:flex-row md:gap-4 items-center">
            <button 
                type="button" 
                id="cancel-btn"
                class="w-full p-[2px] rounded-full bg-gradient-to-r from-six to-seven inline-block"
            >
                <div class="hover:bg-transparent transition-all duration-300 cursor-pointer py-3 px-5 rounded-full bg-light text-black hover:text-light w-full h-full text-sm md:text-base font-semibold">
                    Batal
                </div>
            </button>
            <div class="w-full p-[2px] rounded-full bg-gradient-to-r from-six to-seven inline-block">
                <button 
                    class="w-full cursor-pointer bg-main-gradient py-3 px-5 text-light rounded-full font-semibold text-sm md:text-base" 
                    type="submit"
                    id="submit-btn"
                >
                    <span id="submit-text">Simpan</span>
                    <span id="submit-loading" class="hidden">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Menyimpan...
                    </span>
                </button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('[data-toggle]').forEach(button => {
            button.addEventListener('click', function () {
                const inputId = this.getAttribute('data-toggle');
                const input = document.getElementById(inputId);
                const eyeOpen = this.querySelector('.eye-open');
                const eyeClosed = this.querySelector('.eye-closed');

                if (input.type === 'password') {
                    input.type = 'text';
                    eyeOpen.classList.add('hidden');
                    eyeClosed.classList.remove('hidden');
                    this.title = 'Hide Password';
                } else {
                    input.type = 'password';
                    eyeOpen.classList.remove('hidden');
                    eyeClosed.classList.add('hidden');
                    this.title = 'Show Password';
                }
            });
        });

        const modal = new ReusableModal();

        document.addEventListener('DOMContentLoaded', () => {
            window.formHandler = new FormHandler({
                formId: "update-password-form",
                redirectUrl: "{{ route('dashboard.profile.index') }}",
                successMessage: "Password berhasil diperbaharui!",
                validators: (ctx) => {
                    let isValid = true;

                    const current_password = document.getElementById('current_password');
                    if (!current_password.value.trim()) {
                        ctx.showFieldError(current_password, 'Password saat ini wajib diisi.');
                        isValid = false;
                    }
                    const password = document.getElementById('password');
                    if (!password.value.trim()) {
                        ctx.showFieldError(password, 'Password baru wajib diisi.');
                        isValid = false;
                    }
                    const password_confirmation = document.getElementById('password_confirmation');
                    if (!password_confirmation.value.trim()) {
                        ctx.showFieldError(password_confirmation, 'Konfirmasi password baru wajib diisi.');
                        isValid = false;
                    }

                    return isValid;
                }
            });
        });
    </script>
@endsection