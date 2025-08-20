@extends('layouts.dashboard.main')

@section('content')
    <div class="flex gap-4 items-center justify-between">
        <div class="flex gap-4 items-center">
            <button id="btn-filter" class="cursor-pointer py-3 px-5 rounded-md bg-main-gradient text-light gap-2 flex items-center">
                <svg class="size-4 fill-light" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.121712 1.71563C0.327962 1.27813 0.765462 1 1.24984 1H14.7498C15.2342 1 15.6717 1.27813 15.878 1.71563C16.0842 2.15313 16.0217 2.66875 15.7155 3.04375L9.99984 10.0281V14C9.99984 14.3781 9.78734 14.725 9.44671 14.8938C9.10609 15.0625 8.70296 15.0281 8.39984 14.8L6.39984 13.3C6.14671 13.1125 5.99984 12.8156 5.99984 12.5V10.0281L0.281087 3.04063C-0.0220383 2.66875 -0.0876633 2.15 0.121712 1.71563Z"/>
                </svg>
                <p>Filter</p>
            </button>
            
            <form method="GET" action="{{ route('dashboard.team.index') }}" class="flex items-center gap-4 rounded-lg pl-5 pr-2 bg-light border-[1px] border-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="fill-black size-6">
                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                </svg>
                <input type="text" name="search" value="{{ request('search') }}" class="text-black w-full border-none outline-none text-sm md:text-base py-3" placeholder="Search Team">
                <button 
                    type="button" 
                    id="btn-search" 
                    class="hidden opacity-0 scale-95 bg-main-gradient text-light text-sm md:text-base py-2 px-3 rounded-md cursor-pointer transition-all duration-300 ease-in-out"
                >
                    Cari
                </button>
                <input type="hidden" name="year" value="{{ request('year') }}">
                <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
            </form>
        </div>
        <a href="{{ route('dashboard.team.create') }}">
            <button class="py-3 px-5 cursor-pointer rounded-md bg-main-gradient text-light gap-2 flex items-center">
                <svg class="size-6 fill-light" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9165 12.0837H6.49984C6.1929 12.0837 5.93579 11.9797 5.72851 11.7717C5.52123 11.5637 5.41723 11.3066 5.41651 11.0003C5.41579 10.6941 5.51979 10.437 5.72851 10.229C5.93723 10.021 6.19434 9.917 6.49984 9.917H11.9165V4.50033C11.9165 4.19338 12.0205 3.93627 12.2285 3.729C12.4365 3.52172 12.6936 3.41772 12.9998 3.417C13.3061 3.41627 13.5635 3.52027 13.7723 3.729C13.981 3.93772 14.0846 4.19483 14.0832 4.50033V9.917H19.4998C19.8068 9.917 20.0643 10.021 20.2723 10.229C20.4803 10.437 20.5839 10.6941 20.5832 11.0003C20.5825 11.3066 20.4785 11.564 20.2712 11.7727C20.0639 11.9815 19.8068 12.0851 19.4998 12.0837H14.0832V17.5003C14.0832 17.8073 13.9792 18.0647 13.7712 18.2727C13.5632 18.4807 13.3061 18.5844 12.9998 18.5837C12.6936 18.5829 12.4365 18.4789 12.2285 18.2717C12.0205 18.0644 11.9165 17.8073 11.9165 17.5003V12.0837Z"/>
                </svg>
                <p>Add Team</p>
            </button>
        </a>
    </div>

    <!-- Filter Info -->
    @if(request()->hasAny(['search', 'year', 'sort_by']))
        <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    <span class="text-blue-700 font-medium">Filter Aktif:</span>
                    @if(request('search'))
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">Pencarian: "{{ request('search') }}"</span>
                    @endif
                    @if(request('year'))
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">Tahun: {{ request('year') }}</span>
                    @endif
                    @if(request('sort_by'))
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">
                            Urutan: 
                            @switch(request('sort_by'))
                                @case('name') Nama A-Z @break
                                @case('name_desc') Nama Z-A @break
                                @case('year') Tahun @break
                                @case('oldest') Terlama @break
                                @default Terbaru
                            @endswitch
                        </span>
                    @endif
                </div>
                <a href="{{ route('dashboard.team.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Reset Filter</a>
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
                        <th class="px-4 py-2 text-left">Tahun</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700">
                    @forelse ($teams as $index => $team)
                        <tr class="border-b border-b-gray-300 even:bg-gray-50">
                            <td class="px-4 py-2">{{ $teams->firstItem() + $index }}</td>
                            <td class="px-4 py-2 font-medium">{{ $team->name }}</td>
                            <td class="px-4 py-2">{{ $team->year }}</td>
                            <td class="px-4 py-2">
                                <div class="flex gap-3 items-center">
                                    <button title="Detail" onclick="showTeamDetail({{ $team->id }})" class="cursor-pointer hover:scale-110 transition-transform">
                                        <svg class="size-6 fill-blue-500" viewBox="0 0 26 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.9165 19.417H14.0832V12.917H11.9165V19.417ZM12.9998 10.7503C13.3068 10.7503 13.5643 10.6463 13.7723 10.4383C13.9803 10.2303 14.0839 9.97321 14.0832 9.66699C14.0824 9.36077 13.9784 9.10366 13.7712 8.89566C13.5639 8.68766 13.3068 8.58366 12.9998 8.58366C12.6929 8.58366 12.4358 8.68766 12.2285 8.89566C12.0212 9.10366 11.9172 9.36077 11.9165 9.66699C11.9158 9.97321 12.0198 10.2307 12.2285 10.4394C12.4372 10.6481 12.6943 10.7518 12.9998 10.7503ZM12.9998 24.8337C11.5012 24.8337 10.0929 24.5491 8.77484 23.98C7.45678 23.4109 6.31026 22.6392 5.33526 21.6649C4.36026 20.6906 3.58856 19.5441 3.02017 18.2253C2.45178 16.9065 2.16723 15.4982 2.16651 14.0003C2.16578 12.5024 2.45034 11.0941 3.02017 9.77533C3.59001 8.45655 4.3617 7.31002 5.33526 6.33574C6.30881 5.36146 7.45534 4.58977 8.77484 4.02066C10.0943 3.45155 11.5027 3.16699 12.9998 3.16699C14.497 3.16699 15.9053 3.45155 17.2248 4.02066C18.5443 4.58977 19.6909 5.36146 20.6644 6.33574C21.638 7.31002 22.41 8.45655 22.9806 9.77533C23.5511 11.0941 23.8353 12.5024 23.8332 14.0003C23.831 15.4982 23.5465 16.9065 22.9795 18.2253C22.4126 19.5441 21.6409 20.6906 20.6644 21.6649C19.688 22.6392 18.5415 23.4112 17.2248 23.9811C15.9082 24.5509 14.4999 24.8351 12.9998 24.8337ZM12.9998 22.667C15.4193 22.667 17.4686 21.8274 19.1478 20.1482C20.8269 18.4691 21.6665 16.4198 21.6665 14.0003C21.6665 11.5809 20.8269 9.53158 19.1478 7.85241C17.4686 6.17324 15.4193 5.33366 12.9998 5.33366C10.5804 5.33366 8.53109 6.17324 6.85192 7.85241C5.17276 9.53158 4.33317 11.5809 4.33317 14.0003C4.33317 16.4198 5.17276 18.4691 6.85192 20.1482C8.53109 21.8274 10.5804 22.667 12.9998 22.667Z"/>
                                        </svg>
                                    </button>
                                    <a href="{{ route('dashboard.team.edit', $team->id) }}" title="Edit" class="cursor-pointer hover:scale-110 transition-transform">
                                        <svg class="size-6 fill-yellow-500" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.22222 20.7778H5.80555L16.6667 9.91667L15.0833 8.33333L4.22222 19.1944V20.7778ZM2 23V18.2778L16.6667 3.63889C16.8889 3.43519 17.1344 3.27778 17.4033 3.16667C17.6722 3.05556 17.9544 3 18.25 3C18.5455 3 18.8326 3.05556 19.1111 3.16667C19.3896 3.27778 19.6304 3.44444 19.8333 3.66667L21.3611 5.22222C21.5833 5.42593 21.7455 5.66667 21.8478 5.94444C21.95 6.22222 22.0007 6.5 22 6.77778C22 7.07407 21.9493 7.35667 21.8478 7.62556C21.7463 7.89444 21.5841 8.13963 21.3611 8.36111L6.72222 23H2ZM15.8611 9.13889L15.0833 8.33333L16.6667 9.91667L15.8611 9.13889Z"/>
                                        </svg>
                                    </a>
                                    <button title="Hapus" onclick="confirmDelete({{ $team->id }}, '{{ $team->name }}')" class="cursor-pointer hover:scale-110 transition-transform">
                                        <svg class="size-6 fill-red-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.375 22C5.75625 22 5.22675 21.7826 4.7865 21.3478C4.34625 20.913 4.12575 20.3896 4.125 19.7778V5.33333H3V3.11111H8.625V2H15.375V3.11111H21V5.33333H19.875V19.7778C19.875 20.3889 19.6549 20.9122 19.2146 21.3478C18.7744 21.7833 18.2445 22.0007 17.625 22H6.375ZM17.625 5.33333H6.375V19.7778H17.625V5.33333ZM8.625 17.5556H10.875V7.55556H8.625V17.5556ZM13.125 17.5556H15.375V7.55556H13.125V17.5556Z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    @if(request()->hasAny(['search', 'year']))
                                        <p class="text-lg font-medium">Tidak ada tim yang sesuai dengan filter</p>
                                        <p class="text-sm">Coba ubah kriteria pencarian atau filter Anda</p>
                                        <a href="{{ route('dashboard.team.index') }}" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">Reset Filter</a>
                                    @else
                                        <p class="text-lg font-medium">Tidak ada data tim</p>
                                        <p class="text-sm">Silakan tambahkan tim baru untuk melihat data di sini</p>
                                        <a href="{{ route('dashboard.team.create') }}" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">Tambah Tim Pertama</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if($teams->hasPages())
                <div class="flex justify-between items-center bg-one text-light px-4 py-3">
                    <p class="text-sm">
                        Showing {{ $teams->firstItem() }} to {{ $teams->lastItem() }} of {{ $teams->total() }} results
                    </p>
                    
                    <div class="flex items-center">
                        @if ($teams->onFirstPage())
                            <span class="bg-three border-four border rounded-l-lg px-4 py-2 opacity-50 cursor-not-allowed">&lt;</span>
                        @else
                            <a href="{{ $teams->previousPageUrl() }}" class="bg-three border-four border rounded-l-lg px-4 py-2 hover:bg-four transition-colors">&lt;</a>
                        @endif

                        @foreach ($teams->getUrlRange(1, $teams->lastPage()) as $page => $url)
                            @if ($page == $teams->currentPage())
                                <span class="bg-six border-four border px-4 py-2 font-bold">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="bg-three border-four border px-4 py-2 hover:bg-four transition-colors">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($teams->hasMorePages())
                            <a href="{{ $teams->nextPageUrl() }}" class="bg-three border-four border rounded-r-lg px-4 py-2 hover:bg-four transition-colors">&gt;</a>
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
    <script src="{{ asset('js/search.js') }}"></script>
    <script>
        const modal = new ReusableModal();

        document.getElementById('btn-filter').addEventListener('click', () => {
            modal.show({
                id: 'filterModal',
                title: 'Filter Data Tim',
                size: 'lg',
                icon: `<svg class="w-6 h-6 text-one" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M0.121712 1.71563C0.327962 1.27813 0.765462 1 1.24984 1H14.7498C15.2342 1 15.6717 1.27813 15.878 1.71563C16.0842 2.15313 16.0217 2.66875 15.7155 3.04375L9.99984 10.0281V14C9.99984 14.3781 9.78734 14.725 9.44671 14.8938C9.10609 15.0625 8.70296 15.0281 8.39984 14.8L6.39984 13.3C6.14671 13.1125 5.99984 12.8156 5.99984 12.5V10.0281L0.281087 3.04063C-0.0220383 2.66875 -0.0876633 2.15 0.121712 1.71563Z"/>
                        </svg>`,
                content: `
                    <form id="filterForm" method="GET" action="{{ route('dashboard.team.index') }}" class="space-y-6">
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tahun</label>
                            <select name="year" id="year" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                <option value="">Semua Tahun</option>
                                @for ($year = date('Y'); $year >= 2024; $year--)
                                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Urutkan Berdasarkan</label>
                            <select name="sort_by" id="sortBy" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                <option value="latest" {{ request('sort_by') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                                <option value="oldest" {{ request('sort_by') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                                <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Nama (A-Z)</option>
                                <option value="name_desc" {{ request('sort_by') == 'name_desc' ? 'selected' : '' }}>Nama (Z-A)</option>
                                <option value="year" {{ request('sort_by') == 'year' ? 'selected' : '' }}>Tahun</option>
                            </select>
                        </div>
                    </form>
                `,
                footer: `
                    <a href="{{ route('dashboard.team.index') }}" class="reset-btn px-4 py-2 text-gray-600 hover:shadow-xl shadow-seven/30 hover:bg-gray-100 rounded-lg transition-all duration-200">
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

        async function showTeamDetail(teamId) {
            try {
                const response = await fetch(`{{ route('dashboard.team.index') }}/${teamId}`, {
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                        "Accept": "application/json"
                    }
                });
                const result = await response.json();
                
                if (result.success) {
                    const team = result.data;
                    modal.show({
                        id: 'teamDetailModal',
                        title: `Detail Tim: ${team.name}`,
                        size: 'lg',
                        icon: `<svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>`,
                        content: `
                            <div class="space-y-4">
                                <div class="flex flex-col gap-3">
                                    <div class="flex gap-2 items-center">
                                        <svg class="size-6 fill-black" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 11C13.3261 11 14.5979 11.5268 15.5355 12.4645C16.4732 13.4021 17 14.6739 17 16V22H15V16C15 15.2348 14.7077 14.4985 14.1827 13.9417C13.6578 13.385 12.9399 13.0499 12.176 13.005L12 13C11.2348 13 10.4985 13.2923 9.94174 13.8173C9.38499 14.3422 9.04989 15.0601 9.005 15.824L9 16V22H7V16C7 14.6739 7.52678 13.4021 8.46447 12.4645C9.40215 11.5268 10.6739 11 12 11ZM5.5 14C5.78 14.0007 6.05 14.032 6.31 14.094C6.13965 14.6032 6.03841 15.1329 6.009 15.669L6 16V16.086C5.88503 16.0449 5.76548 16.0181 5.644 16.006L5.5 16C5.12727 16 4.7679 16.1388 4.49189 16.3892C4.21589 16.6397 4.04303 16.984 4.007 17.355L4 17.5V22H2V17.5C2 16.5717 2.36875 15.6815 3.02513 15.0251C3.6815 14.3687 4.57174 14 5.5 14ZM18.5 14C19.4283 14 20.3185 14.3687 20.9749 15.0251C21.6313 15.6815 22 16.5717 22 17.5V22H20V17.5C20 17.1273 19.8612 16.7679 19.6108 16.4919C19.3603 16.2159 19.016 16.043 18.645 16.007L18.5 16C18.324 16.0007 18.1573 16.029 18 16.085V16C18 15.334 17.892 14.694 17.692 14.096C17.95 14.033 18.222 14 18.5 14ZM5.5 8C6.16304 8 6.79893 8.26339 7.26777 8.73223C7.73661 9.20107 8 9.83696 8 10.5C8 11.163 7.73661 11.7989 7.26777 12.2678C6.79893 12.7366 6.16304 13 5.5 13C4.83696 13 4.20107 12.7366 3.73223 12.2678C3.26339 11.7989 3 11.163 3 10.5C3 9.83696 3.26339 9.20107 3.73223 8.73223C4.20107 8.26339 4.83696 8 5.5 8ZM18.5 8C19.163 8 19.7989 8.26339 20.2678 8.73223C20.7366 9.20107 21 9.83696 21 10.5C21 11.163 20.7366 11.7989 20.2678 12.2678C19.7989 12.7366 19.163 13 18.5 13C17.837 13 17.2011 12.7366 16.7322 12.2678C16.2634 11.7989 16 11.163 16 10.5C16 9.83696 16.2634 9.20107 16.7322 8.73223C17.2011 8.26339 17.837 8 18.5 8ZM5.5 10C5.36739 10 5.24021 10.0527 5.14645 10.1464C5.05268 10.2402 5 10.3674 5 10.5C5 10.6326 5.05268 10.7598 5.14645 10.8536C5.24021 10.9473 5.36739 11 5.5 11C5.63261 11 5.75979 10.9473 5.85355 10.8536C5.94732 10.7598 6 10.6326 6 10.5C6 10.3674 5.94732 10.2402 5.85355 10.1464C5.75979 10.0527 5.63261 10 5.5 10ZM18.5 10C18.3674 10 18.2402 10.0527 18.1464 10.1464C18.0527 10.2402 18 10.3674 18 10.5C18 10.6326 18.0527 10.7598 18.1464 10.8536C18.2402 10.9473 18.3674 11 18.5 11C18.6326 11 18.7598 10.9473 18.8536 10.8536C18.9473 10.7598 19 10.6326 19 10.5C19 10.3674 18.9473 10.2402 18.8536 10.1464C18.7598 10.0527 18.6326 10 18.5 10ZM12 2C13.0609 2 14.0783 2.42143 14.8284 3.17157C15.5786 3.92172 16 4.93913 16 6C16 7.06087 15.5786 8.07828 14.8284 8.82843C14.0783 9.57857 13.0609 10 12 10C10.9391 10 9.92172 9.57857 9.17157 8.82843C8.42143 8.07828 8 7.06087 8 6C8 4.93913 8.42143 3.92172 9.17157 3.17157C9.92172 2.42143 10.9391 2 12 2ZM12 4C11.4696 4 10.9609 4.21071 10.5858 4.58579C10.2107 4.96086 10 5.46957 10 6C10 6.53043 10.2107 7.03914 10.5858 7.41421C10.9609 7.78929 11.4696 8 12 8C12.5304 8 13.0391 7.78929 13.4142 7.41421C13.7893 7.03914 14 6.53043 14 6C14 5.46957 13.7893 4.96086 13.4142 4.58579C13.0391 4.21071 12.5304 4 12 4Z"/>
                                        </svg>
                                        <span class='font-medium'>${team.name}</span>
                                    </div>
                                    <div class="flex gap-2 items-center">
                                        <svg class="size-6 fill-black" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 20C14.1217 20 16.1566 19.1571 17.6569 17.6569C19.1571 16.1566 20 14.1217 20 12C20 9.87827 19.1571 7.84344 17.6569 6.34315C16.1566 4.84285 14.1217 4 12 4C9.87827 4 7.84344 4.84285 6.34315 6.34315C4.84285 7.84344 4 9.87827 4 12C4 14.1217 4.84285 16.1566 6.34315 17.6569C7.84344 19.1571 9.87827 20 12 20ZM12 2C13.3132 2 14.6136 2.25866 15.8268 2.7612C17.0401 3.26375 18.1425 4.00035 19.0711 4.92893C19.9997 5.85752 20.7362 6.95991 21.2388 8.17317C21.7413 9.38642 22 10.6868 22 12C22 14.6522 20.9464 17.1957 19.0711 19.0711C17.1957 20.9464 14.6522 22 12 22C6.47 22 2 17.5 2 12C2 9.34784 3.05357 6.8043 4.92893 4.92893C6.8043 3.05357 9.34784 2 12 2ZM12.5 7V12.25L17 14.92L16.25 16.15L11 13V7H12.5Z"/>
                                        </svg>
                                        <span class='font-medium'>${team.year}</span>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <h1 class="font-medium">Anggota Kelompok</h1>
                                        <div class="flex items-center flex-wrap gap-3">
                                            ${
                                                team.contributors && team.contributors.length > 0 ? 
                                                team.contributors.map(c => `
                                                    <div class="flex gap-2 items-center mt-2">
                                                        <div class="hexagon bg-six w-4 h-5"></div>
                                                        <p class="text-black text-sm">${c.name}</p>
                                                    </div>
                                                    `).join('')
                                                : `<p class="text-gray-500 italic">Tidak ada anggota</p>`
                                            }
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `,
                        footer: `
                            ${
                                team.showcase 
                                ? `<a href="{{ route('dashboard.team.index') }}/${teamId}" 
                                    class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors duration-200">
                                        Lihat Karya Tim
                                </a>`
                                : `<p class="text-gray-500 italic">Karya belum ditambahkan</p>`
                            }
                        `
                    });
                } else {
                    modal.alert({
                        title: 'Error',
                        message: result.message || 'Gagal mengambil detail tim',
                        icon: `<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>`
                    });
                }
            } catch (error) {
                console.error('Error fetching team detail:', error);
                modal.alert({
                    title: 'Error',
                    message: 'Terjadi kesalahan saat mengambil detail tim',
                    icon: `<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>`
                });
            }
        }

        function confirmDelete(teamId, teamName) {
            modal.confirm({
                title: 'Konfirmasi Hapus',
                message: `Apakah Anda yakin ingin menghapus tim "<strong>${teamName}</strong>"? Tindakan ini tidak dapat dipulihkan`,
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
                                    <span class="ml-3">Menghapus tim...</span>
                                </div>
                            `,
                            closeOnOutsideClick: false,
                            showCloseButton: false
                        });

                        const response = await fetch(`{{ route('dashboard.team.index') }}/${teamId}`, {
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
                                onOk: () => window.location.href = "{{ route('dashboard.team.index') }}"
                            });
                        } else {
                            modal.alert({
                                title: 'Error',
                                message: result.message || 'Gagal menghapus tim',
                                icon: `<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>`
                            });
                        }
                    } catch (error) {
                        console.error('Error deleting team:', error);
                        modal.hide();
                        modal.alert({
                            title: 'Error',
                            message: 'Terjadi kesalahan saat menghapus tim',
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