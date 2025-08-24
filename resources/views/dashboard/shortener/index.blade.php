@extends('layouts.dashboard.main')

@section('content')
    <div class="flex gap-4 items-center justify-between">
        <div class="flex flex-col lg:flex-row gap-2 lg:gap-4 lg:items-center w-full">
            <div class="flex justify-between gap-2">
                <button id="btn-filter" class="cursor-pointer py-3 px-5 rounded-md bg-main-gradient text-light gap-2 flex items-center">
                    <svg class="size-3 md:size-4 fill-light" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.121712 1.71563C0.327962 1.27813 0.765462 1 1.24984 1H14.7498C15.2342 1 15.6717 1.27813 15.878 1.71563C16.0842 2.15313 16.0217 2.66875 15.7155 3.04375L9.99984 10.0281V14C9.99984 14.3781 9.78734 14.725 9.44671 14.8938C9.10609 15.0625 8.70296 15.0281 8.39984 14.8L6.39984 13.3C6.14671 13.1125 5.99984 12.8156 5.99984 12.5V10.0281L0.281087 3.04063C-0.0220383 2.66875 -0.0876633 2.15 0.121712 1.71563Z"/>
                    </svg>
                    <p class="text-sm md:text-base">Filter</p>
                </button>
    
                <a href="{{ route('dashboard.shortener.create') }}" class="block lg:hidden">
                    <button class="py-3 px-5 cursor-pointer rounded-md bg-main-gradient text-light gap-2 flex items-center">
                        <svg class="size-5 md:size-6 fill-light" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9165 12.0837H6.49984C6.1929 12.0837 5.93579 11.9797 5.72851 11.7717C5.52123 11.5637 5.41723 11.3066 5.41651 11.0003C5.41579 10.6941 5.51979 10.437 5.72851 10.229C5.93723 10.021 6.19434 9.917 6.49984 9.917H11.9165V4.50033C11.9165 4.19338 12.0205 3.93627 12.2285 3.729C12.4365 3.52172 12.6936 3.41772 12.9998 3.417C13.3061 3.41627 13.5635 3.52027 13.7723 3.729C13.981 3.93772 14.0846 4.19483 14.0832 4.50033V9.917H19.4998C19.8068 9.917 20.0643 10.021 20.2723 10.229C20.4803 10.437 20.5839 10.6941 20.5832 11.0003C20.5825 11.3066 20.4785 11.564 20.2712 11.7727C20.0639 11.9815 19.8068 12.0851 19.4998 12.0837H14.0832V17.5003C14.0832 17.8073 13.9792 18.0647 13.7712 18.2727C13.5632 18.4807 13.3061 18.5844 12.9998 18.5837C12.6936 18.5829 12.4365 18.4789 12.2285 18.2717C12.0205 18.0644 11.9165 17.8073 11.9165 17.5003V12.0837Z"/>
                        </svg>
                        <p class="text-sm md:text-base whitespace-nowrap">Add Link</p>
                    </button>
                </a>
            </div>
            
            <form method="GET" action="{{ route('dashboard.shortener.index') }}" class="flex items-center gap-4 rounded-lg pl-5 pr-2 bg-light border-[1px] border-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="fill-black size-5 md:size-6">
                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                </svg>
                <input type="text" name="search" value="{{ request('search') }}" class="text-black w-full border-none outline-none text-sm md:text-base py-3" placeholder="Search Link Shortener">
                <button 
                    type="button" 
                    id="btn-search" 
                    class="hidden opacity-0 scale-95 bg-main-gradient text-light text-sm md:text-base py-2 px-3 rounded-md cursor-pointer transition-all duration-300 ease-in-out"
                >
                    Cari
                </button>
                <input type="hidden" name="count_visitors" value="{{ request('count_visitors') }}">
                <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
            </form>
        </div>
        <a href="{{ route('dashboard.shortener.create') }}" class="hidden lg:block">
            <button class="py-3 px-5 cursor-pointer rounded-md bg-main-gradient text-light gap-2 flex items-center">
                <svg class="size-5 md:size-6 fill-light" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9165 12.0837H6.49984C6.1929 12.0837 5.93579 11.9797 5.72851 11.7717C5.52123 11.5637 5.41723 11.3066 5.41651 11.0003C5.41579 10.6941 5.51979 10.437 5.72851 10.229C5.93723 10.021 6.19434 9.917 6.49984 9.917H11.9165V4.50033C11.9165 4.19338 12.0205 3.93627 12.2285 3.729C12.4365 3.52172 12.6936 3.41772 12.9998 3.417C13.3061 3.41627 13.5635 3.52027 13.7723 3.729C13.981 3.93772 14.0846 4.19483 14.0832 4.50033V9.917H19.4998C19.8068 9.917 20.0643 10.021 20.2723 10.229C20.4803 10.437 20.5839 10.6941 20.5832 11.0003C20.5825 11.3066 20.4785 11.564 20.2712 11.7727C20.0639 11.9815 19.8068 12.0851 19.4998 12.0837H14.0832V17.5003C14.0832 17.8073 13.9792 18.0647 13.7712 18.2727C13.5632 18.4807 13.3061 18.5844 12.9998 18.5837C12.6936 18.5829 12.4365 18.4789 12.2285 18.2717C12.0205 18.0644 11.9165 17.8073 11.9165 17.5003V12.0837Z"/>
                </svg>
                <p class="text-sm md:text-base whitespace-nowrap">Add Link</p>
            </button>
        </a>
    </div>

    <!-- Filter Info -->
    @if(request()->hasAny(['search', 'count_visitors', 'sort_by']))
        <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
            <div class="flex flex-col md:flex-row gap-4 items-start md:items-center justify-between">
                <div class="flex flex-col md:flex-row items-start md:items-center gap-2">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        <span class="text-blue-700 font-medium">Filter Aktif:</span>
                    </div>
                    <div class="flex items-center gap-2">
                        @if(request('search'))
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs sm:text-sm">Pencarian: "{{ request('search') }}"</span>
                        @endif
                        @if(request('count_visitors'))
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs sm:text-sm">
                                Pengunjung:
                                @switch(request('count_visitors'))
                                    @case('most') Paling Banyak @break
                                    @case('least') Paling Sedikit @break
                                @endswitch
                            </span>
                        @endif
                        @if(request('sort_by'))
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs sm:text-sm">
                                Urutan: 
                                @switch(request('sort_by'))
                                    @case('name') Nama A-Z @break
                                    @case('name_desc') Nama Z-A @break
                                    @case('oldest') Terlama @break
                                    @default Terbaru
                                @endswitch
                            </span>
                        @endif
                    </div>
                </div>
                <a href="{{ route('dashboard.shortener.index') }}" class="hover:text-yellow-100 text-light transition duration-200 bg-main-gradient py-2 px-4 rounded-md text-sm font-medium text-center">Reset Filter</a>
            </div>
        </div>
    @endif

    <div class="mt-4">
        <div class="overflow-x-auto bg-light shadow-xl rounded-lg">
            <table class="w-full table-auto text-sm">
                <thead class="bg-one text-light">
                    <tr>
                        <th class="px-4 py-2 text-left w-[50px]">No</th>
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">Akhiran Link</th>
                        <th class="px-4 py-2 text-left">Waktu Mulai</th>
                        <th class="px-4 py-2 text-left">Waktu Berakhir</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700">
                    @forelse ($shorteners as $index => $link)
                        <tr class="border-b border-b-gray-300 even:bg-gray-50">
                            <td class="px-4 py-2">{{ $shorteners->firstItem() + $index }}</td>
                            <td class="px-4 py-2 font-medium">{{ $link->name }}</td>
                            <td class="px-4 py-2">{{ $link->back_half }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($link->open_at)->format('d/m/Y, H:i') }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($link->end_at)->format('d/m/Y, H:i') }}</td>
                            <td class="px-4 py-2">
                                <div class="flex gap-3 items-center">
                                    <button title="Detail" onclick="showLinkDetail('{{ $link->back_half }}')" class="cursor-pointer hover:scale-110 transition-transform">
                                        <svg class="size-6 min-w-6 min-h-6 fill-blue-500" viewBox="0 0 26 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.9165 19.417H14.0832V12.917H11.9165V19.417ZM12.9998 10.7503C13.3068 10.7503 13.5643 10.6463 13.7723 10.4383C13.9803 10.2303 14.0839 9.97321 14.0832 9.66699C14.0824 9.36077 13.9784 9.10366 13.7712 8.89566C13.5639 8.68766 13.3068 8.58366 12.9998 8.58366C12.6929 8.58366 12.4358 8.68766 12.2285 8.89566C12.0212 9.10366 11.9172 9.36077 11.9165 9.66699C11.9158 9.97321 12.0198 10.2307 12.2285 10.4394C12.4372 10.6481 12.6943 10.7518 12.9998 10.7503ZM12.9998 24.8337C11.5012 24.8337 10.0929 24.5491 8.77484 23.98C7.45678 23.4109 6.31026 22.6392 5.33526 21.6649C4.36026 20.6906 3.58856 19.5441 3.02017 18.2253C2.45178 16.9065 2.16723 15.4982 2.16651 14.0003C2.16578 12.5024 2.45034 11.0941 3.02017 9.77533C3.59001 8.45655 4.3617 7.31002 5.33526 6.33574C6.30881 5.36146 7.45534 4.58977 8.77484 4.02066C10.0943 3.45155 11.5027 3.16699 12.9998 3.16699C14.497 3.16699 15.9053 3.45155 17.2248 4.02066C18.5443 4.58977 19.6909 5.36146 20.6644 6.33574C21.638 7.31002 22.41 8.45655 22.9806 9.77533C23.5511 11.0941 23.8353 12.5024 23.8332 14.0003C23.831 15.4982 23.5465 16.9065 22.9795 18.2253C22.4126 19.5441 21.6409 20.6906 20.6644 21.6649C19.688 22.6392 18.5415 23.4112 17.2248 23.9811C15.9082 24.5509 14.4999 24.8351 12.9998 24.8337ZM12.9998 22.667C15.4193 22.667 17.4686 21.8274 19.1478 20.1482C20.8269 18.4691 21.6665 16.4198 21.6665 14.0003C21.6665 11.5809 20.8269 9.53158 19.1478 7.85241C17.4686 6.17324 15.4193 5.33366 12.9998 5.33366C10.5804 5.33366 8.53109 6.17324 6.85192 7.85241C5.17276 9.53158 4.33317 11.5809 4.33317 14.0003C4.33317 16.4198 5.17276 18.4691 6.85192 20.1482C8.53109 21.8274 10.5804 22.667 12.9998 22.667Z"/>
                                        </svg>
                                    </button>
                                    <a href="{{ route('dashboard.shortener.edit', $link->back_half) }}" title="Edit" class="cursor-pointer hover:scale-110 transition-transform">
                                        <svg class="size-6 min-w-6 min-h-6 fill-yellow-500" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.22222 20.7778H5.80555L16.6667 9.91667L15.0833 8.33333L4.22222 19.1944V20.7778ZM2 23V18.2778L16.6667 3.63889C16.8889 3.43519 17.1344 3.27778 17.4033 3.16667C17.6722 3.05556 17.9544 3 18.25 3C18.5455 3 18.8326 3.05556 19.1111 3.16667C19.3896 3.27778 19.6304 3.44444 19.8333 3.66667L21.3611 5.22222C21.5833 5.42593 21.7455 5.66667 21.8478 5.94444C21.95 6.22222 22.0007 6.5 22 6.77778C22 7.07407 21.9493 7.35667 21.8478 7.62556C21.7463 7.89444 21.5841 8.13963 21.3611 8.36111L6.72222 23H2ZM15.8611 9.13889L15.0833 8.33333L16.6667 9.91667L15.8611 9.13889Z"/>
                                        </svg>
                                    </a>
                                    @if ($link->back_half && !in_array(strtolower($link->back_half), ['register', 'pre-test', 'post-test']))
                                        <button title="Hapus" onclick="confirmDelete('{{ $link->back_half }}', '{{ $link->name }}')" class="cursor-pointer hover:scale-110 transition-transform">
                                            <svg class="size-6 min-w-6 min-h-6 fill-red-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.375 22C5.75625 22 5.22675 21.7826 4.7865 21.3478C4.34625 20.913 4.12575 20.3896 4.125 19.7778V5.33333H3V3.11111H8.625V2H15.375V3.11111H21V5.33333H19.875V19.7778C19.875 20.3889 19.6549 20.9122 19.2146 21.3478C18.7744 21.7833 18.2445 22.0007 17.625 22H6.375ZM17.625 5.33333H6.375V19.7778H17.625V5.33333ZM8.625 17.5556H10.875V7.55556H8.625V17.5556ZM13.125 17.5556H15.375V7.55556H13.125V17.5556Z"/>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    @if(request()->hasAny(['search', 'count_visitors']))
                                        <p class="text-lg font-medium">Tidak ada link yang sesuai dengan filter</p>
                                        <p class="text-sm">Coba ubah kriteria pencarian atau filter Anda</p>
                                        <a href="{{ route('dashboard.shortener.index') }}" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">Reset Filter</a>
                                    @else
                                        <p class="text-lg font-medium">Tidak ada data link</p>
                                        <p class="text-sm">Silakan tambahkan link baru untuk melihat data di sini</p>
                                        <a href="{{ route('dashboard.shortener.create') }}" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">Tambah Link Pertama</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if($shorteners->hasPages())
                <div class="flex justify-between items-center bg-one text-light px-4 py-3">
                    <p class="text-sm">
                        Showing {{ $shorteners->firstItem() }} to {{ $shorteners->lastItem() }} of {{ $shorteners->total() }} results
                    </p>
                    
                    <div class="flex items-center">
                        @if ($shorteners->onFirstPage())
                            <span class="bg-three border-four border rounded-l-lg px-4 py-2 opacity-50 cursor-not-allowed">&lt;</span>
                        @else
                            <a href="{{ $shorteners->previousPageUrl() }}" class="bg-three border-four border rounded-l-lg px-4 py-2 hover:bg-four transition-colors">&lt;</a>
                        @endif

                        @foreach ($shorteners->getUrlRange(1, $shorteners->lastPage()) as $page => $url)
                            @if ($page == $shorteners->currentPage())
                                <span class="bg-six border-four border px-4 py-2 font-bold">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="bg-three border-four border px-4 py-2 hover:bg-four transition-colors">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($shorteners->hasMorePages())
                            <a href="{{ $shorteners->nextPageUrl() }}" class="bg-three border-four border rounded-r-lg px-4 py-2 hover:bg-four transition-colors">&gt;</a>
                        @else
                            <span class="bg-three border-four border rounded-r-lg px-4 py-2 opacity-50 cursor-not-allowed">&gt;</span>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>

    <form id="delete-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/search.js') }}?v={{ time() }}"></script>
    <script>
        const modal = new ReusableModal();

        document.getElementById('btn-filter').addEventListener('click', () => {
            modal.show({
                id: 'filterModal',
                title: 'Filter Data Link',
                size: 'lg',
                icon: `<svg class="w-6 h-6 text-one" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M0.121712 1.71563C0.327962 1.27813 0.765462 1 1.24984 1H14.7498C15.2342 1 15.6717 1.27813 15.878 1.71563C16.0842 2.15313 16.0217 2.66875 15.7155 3.04375L9.99984 10.0281V14C9.99984 14.3781 9.78734 14.725 9.44671 14.8938C9.10609 15.0625 8.70296 15.0281 8.39984 14.8L6.39984 13.3C6.14671 13.1125 5.99984 12.8156 5.99984 12.5V10.0281L0.281087 3.04063C-0.0220383 2.66875 -0.0876633 2.15 0.121712 1.71563Z"/>
                        </svg>`,
                content: `
                    <form id="filterForm" method="GET" action="{{ route('dashboard.shortener.index') }}" class="space-y-6">
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Urutkan Berdasarkan</label>
                            <select name="sort_by" id="sortBy" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                <option value="latest" {{ request('sort_by') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                                <option value="oldest" {{ request('sort_by') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                                <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Nama (A-Z)</option>
                                <option value="name_desc" {{ request('sort_by') == 'name_desc' ? 'selected' : '' }}>Nama (Z-A)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Total Pengunjung</label>
                            <select name="count_visitors" id="countVisitors" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                <option value="" {{ request('count_visitors') == '' ? 'selected' : '' }}>Pilih</option>
                                <option value="most" {{ request('count_visitors') == 'most' ? 'selected' : '' }}>Paling Banyak</option>
                                <option value="least" {{ request('count_visitors') == 'least' ? 'selected' : '' }}>Paling Sedikit</option>
                            </select>
                        </div>
                    </form>
                `,
                footer: `
                    <a href="{{ route('dashboard.shortener.index') }}" class="reset-btn px-4 py-2 text-gray-600 hover:shadow-xl shadow-seven/30 hover:bg-gray-100 rounded-lg transition-all duration-200">
                        Reset
                    </a>
                    <button type="submit" form="filterForm" class="apply-btn px-6 py-2 bg-main-gradient hover:shadow-xl shadow-seven/30 cursor-pointer text-white rounded-lg transition-all duration-200">
                        Terapkan Filter
                    </button>
                `,
                events: [
                    {
                        selector: '.apply-btn',
                        type: 'click',
                        handler: () => {
                            document.getElementById('filterForm').submit();
                        }
                    }
                ]
            });
        });

        async function showLinkDetail(shortenerBackHalf) {
            try {
                const response = await fetch(`{{ route('dashboard.shortener.index') }}/${shortenerBackHalf}`, {
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                        "Accept": "application/json"
                    }
                });
                const result = await response.json();
                
                modal.hide();

                if (result.success) {
                    setTimeout(() => {
                        modal.alert({
                            title: 'Berhasil',
                            message: result.message,
                            icon: `<svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>`,
                            onOk: () => window.location.href = "{{ route('dashboard.shortener.index') }}"
                        });
                    }, 500);
                } else {
                    setTimeout(() => {
                        modal.alert({
                            title: 'Error',
                            message: result.message || 'Gagal menghapus link',
                            icon: `<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>`
                        });
                    }, 500);
                }
            } catch (error) {
                console.error('Error fetching link detail:', error);
                modal.alert({
                    title: 'Error',
                    message: 'Terjadi kesalahan saat mengambil detail link',
                    icon: `<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>`
                });
            }
        }

        function confirmDelete(shortenerBackHalf, shortenerName) {
            modal.confirm({
                title: 'Konfirmasi Hapus',
                message: `Apakah Anda yakin ingin menghapus link "<strong>${shortenerName}</strong>"? Tindakan ini tidak dapat dipulihkan`,
                icon: `<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>`,
                confirmText: 'Ya, Hapus',
                cancelText: 'Batal',
                onConfirm: async () => {
                    try {
                        modal.show({
                            id: 'loadingModal',
                            title: 'Memproses...',
                            content: `
                                <div class="flex items-center justify-center py-8">
                                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-500"></div>
                                    <span class="ml-3">Menghapus link...</span>
                                </div>
                            `,
                            closeOnOutsideClick: false,
                            showCloseButton: false
                        });

                        const response = await fetch(`{{ route('dashboard.shortener.index') }}/${shortenerBackHalf}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            }
                        });

                        const result = await response.json();
                        
                        modal.hide();

                        if (result.success) {
                            modal.alert({
                                title: 'Berhasil',
                                message: result.message,
                                icon: `<svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>`,
                                onOk: () => window.location.href = "{{ route('dashboard.shortener.index') }}"
                            });
                        } else {
                            modal.alert({
                                title: 'Error',
                                message: result.message || 'Gagal menghapus link',
                                icon: `<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>`
                            });
                        }
                    } catch (error) {
                        console.error('Error deleting link:', error);
                        modal.hide();
                        modal.alert({
                            title: 'Error',
                            message: 'Terjadi kesalahan saat menghapus link',
                            icon: `<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>`
                        });
                    }
                }
            });
        }
    </script>
@endsection