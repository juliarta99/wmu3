@extends('layouts.dashboard.main')

@section('content')
    <div class="flex items-center gap-3">
        <button id="back-btn" class="cursor-pointer">
            <svg class="size-6 md:size-8 fill-black" viewBox="0 0 22 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.65961 15L16.9955 23.3946C17.3873 23.7892 17.5833 24.2915 17.5833 24.9013C17.5833 25.5112 17.3873 26.0135 16.9955 26.4081C16.6036 26.8027 16.1049 27 15.4993 27C14.8937 27 14.395 26.8027 14.0031 26.4081L4.17107 16.5067C3.95733 16.2915 3.80629 16.0583 3.71794 15.8072C3.62959 15.5561 3.58471 15.287 3.58328 15C3.58186 14.713 3.62674 14.4439 3.71794 14.1928C3.80914 13.9417 3.96018 13.7085 4.17107 13.4933L14.0031 3.59193C14.395 3.19731 14.8937 3 15.4993 3C16.1049 3 16.6036 3.19731 16.9955 3.59193C17.3873 3.98655 17.5833 4.48879 17.5833 5.09865C17.5833 5.70852 17.3873 6.21076 16.9955 6.60538L8.65961 15Z"/>
            </svg>
        </button>
        <span class="text-xl md:text-2xl font-bold">Edit <span class="text-five">Shortener</span></span>
    </div>

    <form id="shortener-form" action="{{ route('dashboard.shortener.update', $link->back_half) }}" method="POST" class="flex flex-col gap-4 mt-6">
        @csrf
        @method("PUT")
        <div class="flex flex-col gap-2">
            <div class="flex flex-col gap-1">
                <div class="flex gap-1 items-center">
                    <label for="name" class="font-semibold text-sm md:text-base">Nama</label>
                    <span class="text-red-500">*</span>
                </div>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    class="border border-gray-300 px-4 py-2 text-sm md:text-base rounded-lg @error('name') border-red-500 @enderror" 
                    placeholder="Masukkan nama link"
                    value="{{ old('name', $link->name) }}"
                >
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col gap-1">
                <div class="flex gap-1 items-center">
                    <label for="back_half" class="font-semibold text-sm md:text-base">Akhiran Link</label>
                    <span class="text-red-500">*</span>
                </div>
                <input 
                    type="text" 
                    id="back_half" 
                    name="back_half" 
                    class="border disabled:bg-gray-200 disabled:text-gray-500 border-gray-300 px-4 py-2 text-sm md:text-base rounded-lg @error('back_half') border-red-500 @enderror" 
                    placeholder="Masukkan akhiran link"
                    @disabled(in_array(strtolower($link->back_half), ['register', 'pre-test', 'post-test']))
                    value="{{ old('back_half', $link->back_half) }}"
                >
                @if (in_array(strtolower($link->back_half), ['register', 'pre-test', 'post-test']))
                    <input type="hidden" name="back_half" value="{{ $link->back_half }}">
                @endif
                @error('back_half')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col gap-1">
                <div class="flex gap-1 items-center">
                    <label for="link" class="font-semibold text-sm md:text-base">Link Tujuan</label>
                    <span class="text-red-500">*</span>
                </div>
                <input 
                    type="text" 
                    id="link" 
                    name="link" 
                    class="border border-gray-300 px-4 py-2 text-sm md:text-base rounded-lg @error('link') border-red-500 @enderror" 
                    placeholder="Masukkan link tujuan"
                    value="{{ old('link', $link->link) }}"
                >
                @error('link')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex md:justify-between flex-col md:flex-row gap-2 md:gap-4 items-center">
                <div class="flex flex-col gap-1 w-full">
                    <div class="flex gap-1 items-center">
                        <label for="open_at" class="font-semibold text-sm md:text-base">Waktu Mulai</label>
                        <span class="text-red-500">*</span>
                    </div>
                    <input 
                        type="datetime-local" 
                        id="open_at" 
                        name="open_at" 
                        class="border border-gray-300 px-4 py-2 text-sm md:text-base rounded-lg @error('open_at') border-red-500 @enderror" 
                        value="{{ old('open_at', $link->open_at) }}"
                    >
                    @error('open_at')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 w-full">
                    <div class="flex gap-1 items-center">
                        <label for="end_at" class="font-semibold text-sm md:text-base">Waktu Berakhir</label>
                        <span class="text-red-500">*</span>
                    </div>
                    <input 
                        type="datetime-local" 
                        id="end_at" 
                        name="end_at" 
                        class="border border-gray-300 px-4 py-2 text-sm md:text-base rounded-lg @error('end_at') border-red-500 @enderror" 
                        value="{{ old('end_at', $link->end_at) }}"
                    >
                    @error('end_at')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-2 md:gap-4 items-center">
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
                    <span id="submit-text">Perbarui</span>
                    <span id="submit-loading" class="hidden">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Memperbarui...
                    </span>
                </button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        const modal = new ReusableModal();

        document.addEventListener('DOMContentLoaded', () => {
            window.formHandler = new FormHandler({
                formId: "shortener-form",
                redirectUrl: "{{ route('dashboard.shortener.index') }}",
                successMessage: "Link Shortener berhasil diperbarui!",
                validators: (ctx) => {
                    let isValid = true;

                    const name = document.getElementById('name');
                    if (!name.value.trim()) {
                        ctx.showFieldError(name, 'Nama shortener wajib diisi.');
                        isValid = false;
                    }
                    
                    const back_half = document.getElementById('back_half');
                    if (!back_half.value.trim()) {
                        ctx.showFieldError(back_half, 'Akhiran link shortener wajib diisi.');
                        isValid = false;
                    }

                    const link = document.getElementById('link');
                    if (!link.value.trim()) {
                        ctx.showFieldError(link, 'Link tujuan wajib diisi.');
                        isValid = false;
                    }

                    const open_at = document.getElementById('open_at');
                    if (!open_at.value.trim()) {
                        ctx.showFieldError(open_at, 'Waktu mulai wajib diisi.');
                        isValid = false;
                    }

                    const end_at = document.getElementById('end_at');
                    if (!end_at.value.trim()) {
                        ctx.showFieldError(end_at, 'Waktu berakhir wajib diisi.');
                        isValid = false;
                    }

                    return isValid;
                }
            });
        });
    </script>
@endsection