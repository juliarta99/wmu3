@extends('layouts.dashboard.main')

@section('content')
    <div class="flex items-center gap-3">
        <button id="back-btn" class="cursor-pointer">
            <svg class="size-6 md:size-8 fill-black" viewBox="0 0 22 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.65961 15L16.9955 23.3946C17.3873 23.7892 17.5833 24.2915 17.5833 24.9013C17.5833 25.5112 17.3873 26.0135 16.9955 26.4081C16.6036 26.8027 16.1049 27 15.4993 27C14.8937 27 14.395 26.8027 14.0031 26.4081L4.17107 16.5067C3.95733 16.2915 3.80629 16.0583 3.71794 15.8072C3.62959 15.5561 3.58471 15.287 3.58328 15C3.58186 14.713 3.62674 14.4439 3.71794 14.1928C3.80914 13.9417 3.96018 13.7085 4.17107 13.4933L14.0031 3.59193C14.395 3.19731 14.8937 3 15.4993 3C16.1049 3 16.6036 3.19731 16.9955 3.59193C17.3873 3.98655 17.5833 4.48879 17.5833 5.09865C17.5833 5.70852 17.3873 6.21076 16.9955 6.60538L8.65961 15Z"/>
            </svg>
        </button>
        <span class="text-xl md:text-2xl font-bold">Add <span class="text-five">Team</span></span>
    </div>

    <form id="team-form" action="{{ route('dashboard.team.store') }}" method="POST" class="flex flex-col gap-4 mt-6">
        @csrf
        <div class="flex flex-col gap-2">
            <h2 class="text-base md:text-lg font-semibold">Detail Team</h2>
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
                    placeholder="Masukkan nama team"
                    value="{{ old('name') }}"
                >
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col gap-1">
                <div class="flex gap-1 items-center">
                    <label for="year" class="font-semibold text-sm md:text-base">Tahun</label>
                    <span class="text-red-500">*</span>
                </div>
                <input 
                    type="number" 
                    name="year" 
                    id="year" 
                    min="2024" 
                    max="{{ now()->year }}" 
                    class="border border-gray-300 px-4 py-2 text-sm md:text-base rounded-lg @error('year') border-red-500 @enderror" 
                    placeholder="Masukkan tahun team"
                    value="{{ old('year', now()->year) }}"
                >
                @error('year')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex flex-col gap-2" id="contributors-section">
            <h2 class="text-base md:text-lg font-semibold">Contributors</h2>
            @error('contributors')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <div id="contributors-container" class="flex flex-col gap-4">
                @if(old('contributors'))
                    @foreach(old('contributors') as $index => $contributor)
                        <div class="contributor-item flex flex-col gap-1" data-contributor="{{ $index + 1 }}">
                            <label for="contributor{{ $index + 1 }}" class="font-semibold text-sm md:text-base">Nama Contributor {{ $index + 1 }}</label>
                            @if($index === 0)
                                <input 
                                    type="text" 
                                    id="contributor{{ $index + 1 }}" 
                                    name="contributors[]" 
                                    class="border border-gray-300 px-4 py-2 text-sm md:text-base rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('contributors.' . $index) border-red-500 @enderror" 
                                    placeholder="Masukkan nama contributor {{ $index + 1 }}"
                                    value="{{ $contributor }}"
                                >
                            @else
                                <div class="flex items-center gap-2 md:gap-3 justify-between">
                                    <input 
                                        type="text" 
                                        id="contributor{{ $index + 1 }}" 
                                        name="contributors[]" 
                                        class="border w-full border-gray-300 px-4 py-2 text-sm md:text-base rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('contributors.' . $index) border-red-500 @enderror" 
                                        placeholder="Masukkan nama contributor {{ $index + 1 }}"
                                        value="{{ $contributor }}"
                                    >
                                    <button 
                                        type="button" 
                                        class="delete-contributor text-red-500 hover:text-red-700 hover:bg-red-50 p-1 rounded transition-all duration-200"
                                        data-contributor="{{ $index + 1 }}"
                                        title="Hapus contributor"
                                    >
                                        <svg class="size-5 md:size-6 fill-red-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.375 22C5.75625 22 5.22675 21.7826 4.7865 21.3478C4.34625 20.913 4.12575 20.3896 4.125 19.7778V5.33333H3V3.11111H8.625V2H15.375V3.11111H21V5.33333H19.875V19.7778C19.875 20.3889 19.6549 20.9122 19.2146 21.3478C18.7744 21.7833 18.2445 22.0007 17.625 22H6.375ZM17.625 5.33333H6.375V19.7778H17.625V5.33333ZM8.625 17.5556H10.875V7.55556H8.625V17.5556ZM13.125 17.5556H15.375V7.55556H13.125V17.5556Z"/>
                                        </svg>
                                    </button>
                                </div>
                            @endif
                            @error('contributors.' . $index)
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    @endforeach
                @else
                    <div class="contributor-item flex flex-col gap-1" data-contributor="1">
                        <label for="contributor1" class="font-semibold text-sm md:text-base">Nama Contributor 1</label>
                        <input 
                            type="text" 
                            id="contributor1" 
                            name="contributors[]" 
                            class="border border-gray-300 px-4 py-2 text-sm md:text-base rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                            placeholder="Masukkan nama contributor 1"
                        >
                    </div>
                @endif
            </div>
            <button 
                type="button"
                id="add-contributor" 
                class="py-2 px-3 rounded-lg border-2 border-gray-300 border-dashed transition-all duration-300 hover:bg-gray-100 hover:border-gray-400 group mt-2"
            >
                <svg class="size-6 md:size-8 fill-gray-300 mx-auto group-hover:fill-gray-500 transition-all duration-300" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9165 12.0837H6.49984C6.1929 12.0837 5.93579 11.9797 5.72851 11.7717C5.52123 11.5637 5.41723 11.3066 5.41651 11.0003C5.41579 10.6941 5.51979 10.437 5.72851 10.229C5.93723 10.021 6.19434 9.917 6.49984 9.917H11.9165V4.50033C11.9165 4.19338 12.0205 3.93627 12.2285 3.729C12.4365 3.52172 12.6936 3.41772 12.9998 3.417C13.3061 3.41627 13.5635 3.52027 13.7723 3.729C13.981 3.93772 14.0846 4.19483 14.0832 4.50033V9.917H19.4998C19.8068 9.917 20.0643 10.021 20.2723 10.229C20.4803 10.437 20.5839 10.6941 20.5832 11.0003C20.5825 11.3066 20.4785 11.564 20.2712 11.7727C20.0639 11.9815 19.8068 12.0851 19.4998 12.0837H14.0832V17.5003C14.0832 17.8073 13.9792 18.0647 13.7712 18.2727C13.5632 18.4807 13.3061 18.5844 12.9998 18.5837C12.6936 18.5829 12.4365 18.4789 12.2285 18.2717C12.0205 18.0644 11.9165 17.8073 11.9165 17.5003V12.0837Z"/>
                </svg>
            </button>
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
    <script src="{{ asset('js/contributor-manager.js') }}?v={{ time() }}"></script>
    <script>
        const modal = new ReusableModal();
        const currentYear = {{ now()->year }};

        document.addEventListener('DOMContentLoaded', () => {
            window.contributorManager = new ContributorManager();
            window.formHandler = new FormHandler({
                formId: "team-form",
                redirectUrl: "{{ route('dashboard.team.index') }}",
                successMessage: "Team berhasil ditambahkan!",
                validators: (ctx) => {
                    let isValid = true;

                    const name = document.getElementById('name');
                    if (!name.value.trim()) {
                        ctx.showFieldError(name, 'Nama team wajib diisi.');
                        isValid = false;
                    }

                    const year = document.getElementById('year');
                    if (!year.value) {
                        ctx.showFieldError(year, 'Tahun wajib diisi.');
                        isValid = false;
                    } else if (year.value < 2024 || year.value > currentYear) {
                        ctx.showFieldError(year, `Tahun harus antara 2024 - ${currentYear}.`);
                        isValid = false;
                    }

                    const contributors = document.querySelectorAll('input[name="contributors[]"]');
                    const hasValidContributor = Array.from(contributors).some(c => c.value.trim());

                    if (!hasValidContributor) {
                        modal.alert({
                            message: 'Minimal harus ada 1 contributor yang diisi.',
                            type: 'error'
                        });
                        isValid = false;
                    }

                    return isValid;
                }
            });
        });
    </script>
@endsection