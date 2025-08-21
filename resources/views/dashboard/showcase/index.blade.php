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
    
                <a href="{{ route('dashboard.showcase.create') }}" class="block lg:hidden">
                    <button class="py-3 px-5 cursor-pointer rounded-md bg-main-gradient text-light gap-2 flex items-center">
                        <svg class="size-5 md:size-6 fill-light" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9165 12.0837H6.49984C6.1929 12.0837 5.93579 11.9797 5.72851 11.7717C5.52123 11.5637 5.41723 11.3066 5.41651 11.0003C5.41579 10.6941 5.51979 10.437 5.72851 10.229C5.93723 10.021 6.19434 9.917 6.49984 9.917H11.9165V4.50033C11.9165 4.19338 12.0205 3.93627 12.2285 3.729C12.4365 3.52172 12.6936 3.41772 12.9998 3.417C13.3061 3.41627 13.5635 3.52027 13.7723 3.729C13.981 3.93772 14.0846 4.19483 14.0832 4.50033V9.917H19.4998C19.8068 9.917 20.0643 10.021 20.2723 10.229C20.4803 10.437 20.5839 10.6941 20.5832 11.0003C20.5825 11.3066 20.4785 11.564 20.2712 11.7727C20.0639 11.9815 19.8068 12.0851 19.4998 12.0837H14.0832V17.5003C14.0832 17.8073 13.9792 18.0647 13.7712 18.2727C13.5632 18.4807 13.3061 18.5844 12.9998 18.5837C12.6936 18.5829 12.4365 18.4789 12.2285 18.2717C12.0205 18.0644 11.9165 17.8073 11.9165 17.5003V12.0837Z"/>
                        </svg>
                        <p class="text-sm md:text-base whitespace-nowrap">Add Artwork</p>
                    </button>
                </a>
            </div>
            
            <form method="GET" action="{{ route('dashboard.showcase.index') }}" class="flex items-center gap-4 rounded-lg pl-5 pr-2 bg-light border-[1px] border-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="fill-black size-5 md:size-6">
                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                </svg>
                <input type="text" name="search" value="{{ request('search') }}" class="text-black w-full border-none outline-none text-sm md:text-base py-3" placeholder="Search Artwork">
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
        <a href="{{ route('dashboard.showcase.create') }}" class="hidden lg:block">
            <button class="py-3 px-5 cursor-pointer rounded-md bg-main-gradient text-light gap-2 flex items-center">
                <svg class="size-5 md:size-6 fill-light" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9165 12.0837H6.49984C6.1929 12.0837 5.93579 11.9797 5.72851 11.7717C5.52123 11.5637 5.41723 11.3066 5.41651 11.0003C5.41579 10.6941 5.51979 10.437 5.72851 10.229C5.93723 10.021 6.19434 9.917 6.49984 9.917H11.9165V4.50033C11.9165 4.19338 12.0205 3.93627 12.2285 3.729C12.4365 3.52172 12.6936 3.41772 12.9998 3.417C13.3061 3.41627 13.5635 3.52027 13.7723 3.729C13.981 3.93772 14.0846 4.19483 14.0832 4.50033V9.917H19.4998C19.8068 9.917 20.0643 10.021 20.2723 10.229C20.4803 10.437 20.5839 10.6941 20.5832 11.0003C20.5825 11.3066 20.4785 11.564 20.2712 11.7727C20.0639 11.9815 19.8068 12.0851 19.4998 12.0837H14.0832V17.5003C14.0832 17.8073 13.9792 18.0647 13.7712 18.2727C13.5632 18.4807 13.3061 18.5844 12.9998 18.5837C12.6936 18.5829 12.4365 18.4789 12.2285 18.2717C12.0205 18.0644 11.9165 17.8073 11.9165 17.5003V12.0837Z"/>
                </svg>
                <p class="text-sm md:text-base whitespace-nowrap">Add Artwork</p>
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
                                @case('title') Judul A-Z @break
                                @case('title_desc') Judul Z-A @break
                                @case('year') Tahun @break
                                @case('oldest') Terlama @break
                                @default Terbaru
                            @endswitch
                        </span>
                    @endif
                </div>
                <a href="{{ route('dashboard.showcase.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Reset Filter</a>
            </div>
        </div>
    @endif

    <div class="mt-4">
        <div class="overflow-x-auto bg-light shadow-xl rounded-lg">
            <table class="w-full table-auto text-sm">
                <thead class="bg-one text-light">
                    <tr>
                        <th class="px-4 py-2 text-left w-[50px]">No</th>
                        <th class="px-4 py-2 text-left">Judul</th>
                        <th class="px-4 py-2 text-left">Sampul</th>
                        <th class="px-4 py-2 text-left">Kelompok</th>
                        <th class="px-4 py-2 text-left">Juara</th>
                        <th class="px-4 py-2 text-left">Link Video</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700">
                    @forelse ($showcases as $index => $showcase)
                        <tr class="border-b border-b-gray-300 even:bg-gray-50">
                            <td class="px-4 py-2">{{ $showcases->firstItem() + $index }}</td>
                            <td class="px-4 py-2 font-medium">{{ $showcase->title }}</td>
                            <td class="px-4 py-2">
                                <img src="{{ Storage::url($showcase->cover) }}" class="object-cover h-28 rounded-lg min-w-49 aspect-video" alt="Sampul {{ $showcase->title }}">
                            </td>
                            <td class="px-4 py-2 font-medium">{{ $showcase->team->name }} - {{ $showcase->team->year }}</td>
                            <td class="px-4 py-2 font-medium">
                                @if ($showcase->champion == 1)
                                    {{-- #1 --}}
                                    <svg class="size-6 min-w-6 min-h-6" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.2723 1.06044C17.0023 1.30044 14.9023 5.46794 14.9023 5.46794L13.3398 11.7704L19.4198 11.2129C19.4198 11.2129 24.4773 1.80794 24.5798 1.59044C24.7623 1.19544 24.8598 1.03294 24.1623 1.03294C23.4648 1.03044 17.5248 0.835444 17.2723 1.06044Z" fill="#176CC7"/>
                                        <path d="M20.42 10.8227C20.1175 10.6602 11.2075 10.5202 10.9975 10.8227C10.8075 11.0977 10.835 12.3552 10.9275 12.5177C11.02 12.6802 14.015 14.0727 14.015 14.0727L14.0125 14.5802C14.0125 14.5802 14.1775 14.9777 15.8475 14.9777C17.5175 14.9777 17.69 14.6402 17.69 14.6402L17.705 14.1277C17.705 14.1277 20.3275 12.8177 20.465 12.7027C20.605 12.5852 20.7225 10.9852 20.42 10.8227ZM17.675 12.9052C17.675 12.9052 17.6675 12.5552 17.495 12.4677C17.3225 12.3802 14.545 12.3952 14.31 12.4077C14.075 12.4202 14.075 12.8402 14.075 12.8402L12.175 11.9152V11.7302L19.25 11.7802L19.2625 11.9902L17.675 12.9052Z" fill="#FCC417"/>
                                        <path d="M14.8148 12.793C14.5798 12.793 14.4448 13.038 14.4448 13.4605C14.4448 13.8555 14.5798 14.188 14.8773 14.163C15.1223 14.143 15.2073 13.768 15.1848 13.4355C15.1623 13.0405 15.1123 12.793 14.8148 12.793Z" fill="#FDFFFF"/>
                                        <path d="M7.24512 22.6805C7.24512 28.6705 12.6601 31.338 16.2601 31.2105C20.2301 31.068 24.9851 27.973 24.6976 22.258C24.4251 16.843 19.8701 14.2755 15.9251 14.303C11.3401 14.3355 7.24512 17.448 7.24512 22.6805Z" fill="#FCC417"/>
                                        <path d="M16.1326 30.1675C16.0701 30.1675 16.0051 30.1675 15.9426 30.165C14.0676 30.1025 12.2151 29.3125 10.8601 28C9.41009 26.595 8.61509 24.695 8.62509 22.6525C8.64759 17.665 13.0076 15.3525 15.9651 15.3525H15.9901C19.9976 15.37 23.2876 18.485 23.3801 22.7075C23.4201 24.5875 22.6501 26.56 21.1401 28.045C19.7301 29.4275 17.8601 30.1675 16.1326 30.1675ZM15.9601 16.1825C13.3076 16.1825 9.38509 18.3525 9.37509 22.6525C9.36759 25.8675 11.8576 29.1725 16.0051 29.3125C17.5851 29.3625 19.2126 28.7575 20.5276 27.465C21.8926 26.1225 22.6601 24.3925 22.6326 22.7175C22.5726 19.085 19.6026 16.195 15.9976 16.18C15.9876 16.18 15.9676 16.1825 15.9601 16.1825Z" fill="#FA912C"/>
                                        <path d="M14.4552 15.1529C14.2827 14.9154 12.3277 14.9604 10.4802 16.7654C8.69767 18.5079 8.50517 20.1504 8.84767 20.2454C9.23517 20.3529 9.70767 18.6129 11.3402 17.1504C12.8402 15.8104 14.8002 15.6254 14.4552 15.1529ZM22.0177 21.6204C21.4152 21.7054 22.0402 23.5104 20.6427 25.5304C19.4302 27.2829 18.0552 27.9179 18.2152 28.3029C18.4302 28.8179 20.6327 27.5354 21.6527 25.4454C22.5777 23.5529 22.4677 21.5554 22.0177 21.6204Z" fill="#FEFFFA"/>
                                        <path d="M13.9625 19.2546C13.8325 19.4471 13.95 21.1346 14.0275 21.2096C14.1775 21.3596 15.3175 20.8221 15.3175 20.8221L15.275 25.3346C15.275 25.3346 14.4375 25.3246 14.35 25.3571C14.1775 25.4221 14.2 27.1621 14.3275 27.2471C14.455 27.3321 17.8725 27.3771 18.0025 27.2046C18.1325 27.0321 18.1 25.5096 18.04 25.4396C17.9325 25.3096 17.115 25.3621 17.115 25.3621C17.115 25.3621 17.185 18.7171 17.1625 18.5046C17.14 18.2921 16.905 18.1596 16.625 18.2246C16.345 18.2896 14.045 19.1296 13.9625 19.2546Z" fill="#FA912C"/>
                                        <path d="M6.37755 0.930104C6.22005 1.0751 12.2425 11.8001 12.2425 11.8001C12.2425 11.8001 13.2525 11.9301 15.5075 11.9501C17.7625 11.9701 18.88 11.8201 18.88 11.8201C18.88 11.8201 14.1975 1.0376 13.9175 0.930104C13.78 0.875104 11.925 0.855104 10.1125 0.835104C8.29755 0.812604 6.52755 0.790104 6.37755 0.930104Z" fill="#2E9DF4"/>
                                    </svg>
                                @elseif ($showcase->champion == 2)
                                    {{-- #2 --}}
                                    <svg class="size-6 min-w-6 min-h-6" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.2723 1.06044C17.0023 1.30044 14.9023 5.46794 14.9023 5.46794L13.3398 11.7704L19.4198 11.2129C19.4198 11.2129 24.4773 1.80794 24.5798 1.59044C24.7623 1.19544 24.8598 1.03294 24.1623 1.03294C23.4648 1.03044 17.5248 0.835444 17.2723 1.06044Z" fill="#176CC7"/>
                                        <path d="M20.4202 10.8227C20.1177 10.6602 11.2077 10.5202 10.9977 10.8227C10.8077 11.0977 10.9152 12.5402 10.9877 12.7127C11.1177 13.0127 13.9952 14.3202 13.9952 14.3202L13.9402 14.9152C13.9402 14.9152 14.1752 14.9752 15.8477 14.9752C17.5202 14.9752 17.8502 14.8902 17.8502 14.8902L17.8552 14.3527C17.8552 14.3527 20.4452 13.0927 20.5752 12.9177C20.6852 12.7727 20.7227 10.9852 20.4202 10.8227ZM17.7677 13.1027C17.7677 13.1027 17.8502 12.7352 17.6777 12.6502C17.5052 12.5627 14.5452 12.6027 14.3102 12.6152C14.0752 12.6277 14.0752 13.0477 14.0752 13.0477L12.1752 11.9152V11.7302L19.2502 11.7802L19.2627 11.9902L17.7677 13.1027Z" fill="#CECDD2"/>
                                        <path d="M14.8148 12.793C14.5798 12.793 14.4448 13.038 14.4448 13.4605C14.4448 13.8555 14.5798 14.188 14.8773 14.163C15.1223 14.143 15.2073 13.768 15.1848 13.4355C15.1623 13.0405 15.1123 12.793 14.8148 12.793Z" fill="#FDFFFF"/>
                                        <path d="M7.24268 22.9724C7.24268 28.9624 12.7552 31.5049 16.3577 31.3974C20.5552 31.2724 24.9852 28.0874 24.6977 22.3724C24.4252 16.9574 19.8327 14.5499 15.8877 14.5774C11.3027 14.6124 7.24268 17.7399 7.24268 22.9724Z" fill="#CECDD2"/>
                                        <path d="M16.1326 30.2828C16.0701 30.2828 16.0051 30.2828 15.9426 30.2803C14.0676 30.2178 12.2151 29.4278 10.8601 28.1153C9.41009 26.7103 8.61509 24.8103 8.62509 22.7678C8.64759 17.7803 13.0076 15.4678 15.9651 15.4678H15.9901C19.9976 15.4853 23.2876 18.6003 23.3801 22.8228C23.4201 24.7028 22.6501 26.6753 21.1401 28.1603C19.7301 29.5428 17.8601 30.2828 16.1326 30.2828ZM15.9601 16.2978C13.3076 16.2978 9.38509 18.4678 9.37509 22.7678C9.36759 25.9828 11.8576 29.2878 16.0051 29.4278C17.5851 29.4778 19.2126 28.8728 20.5276 27.5803C21.8926 26.2378 22.6601 24.5078 22.6326 22.8328C22.5676 19.2003 19.5976 16.3103 15.9926 16.2928C15.9876 16.2928 15.9676 16.2978 15.9601 16.2978Z" fill="#9B9B9D"/>
                                        <path d="M14.5225 15.3678C14.35 15.1303 12.5825 15.1978 10.68 16.8353C8.78996 18.4628 8.50746 20.2628 8.84746 20.3578C9.23496 20.4653 9.70746 18.7253 11.34 17.2628C12.84 15.9253 14.865 15.8403 14.5225 15.3678ZM21.97 21.9303C21.3675 22.0153 21.9925 23.8203 20.595 25.8403C19.3825 27.5928 18.0075 28.2278 18.1675 28.6128C18.3825 29.1278 20.585 27.8453 21.605 25.7553C22.5275 23.8653 22.4175 21.8678 21.97 21.9303Z" fill="#FEFFFA"/>
                                        <path d="M6.37755 0.930104C6.22005 1.0751 12.2425 11.8001 12.2425 11.8001C12.2425 11.8001 13.2525 11.9301 15.5075 11.9501C17.7625 11.9701 18.88 11.8201 18.88 11.8201C18.88 11.8201 14.1975 1.0376 13.9175 0.930104C13.78 0.875104 11.925 0.855104 10.1125 0.835104C8.29755 0.812604 6.52755 0.790104 6.37755 0.930104Z" fill="#2E9DF4"/>
                                        <path d="M14.2125 21.5875C14.4725 21.59 14.705 21.2375 14.92 21.0225C15.3775 20.5625 15.8575 20.1975 16.405 20.6925C17.75 21.915 15.05 23.155 14.025 24.85C13.26 26.115 13.105 27.0875 13.3175 27.3475C13.53 27.6075 18.7025 27.595 18.7725 27.465C18.8425 27.335 18.915 25.6025 18.795 25.52C18.675 25.4375 16.1325 25.485 16.1325 25.485C16.1325 25.485 16.345 24.99 17.2175 24.235C18.175 23.4075 18.9425 22.27 18.7375 20.925C18.3125 18.145 15.5125 18.0425 14.3 19.01C13.1175 19.9525 13.3725 21.5775 14.2125 21.5875Z" fill="#9B9B9D"/>
                                    </svg>
                                @elseif ($showcase->champion == 3)
                                    {{-- #3 --}}
                                    <svg class="size-6 min-w-6 min-h-6" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.2723 1.06044C17.0023 1.30044 14.9023 5.46794 14.9023 5.46794L13.3398 11.7704L19.4198 11.2129C19.4198 11.2129 24.4773 1.80794 24.5798 1.59044C24.7623 1.19544 24.8598 1.03294 24.1623 1.03294C23.4648 1.03044 17.5248 0.835444 17.2723 1.06044Z" fill="#176CC7"/>
                                        <path d="M20.4202 10.8227C20.1177 10.6602 11.2077 10.5202 10.9977 10.8227C10.8077 11.0977 10.9152 12.5402 10.9877 12.7127C11.1177 13.0127 13.9952 14.3202 13.9952 14.3202L13.9402 14.9152C13.9402 14.9152 14.1752 14.9752 15.8477 14.9752C17.5202 14.9752 17.8502 14.8902 17.8502 14.8902L17.8552 14.3527C17.8552 14.3527 20.4452 13.0927 20.5752 12.9177C20.6852 12.7727 20.7227 10.9852 20.4202 10.8227ZM17.7677 13.1027C17.7677 13.1027 17.8502 12.7352 17.6777 12.6502C17.5052 12.5627 14.5452 12.6027 14.3102 12.6152C14.0752 12.6277 14.0752 13.0477 14.0752 13.0477L12.2102 12.0877L12.1752 11.7302L19.2502 11.7802L19.2252 12.1177L17.7677 13.1027Z" fill="#F79429"/>
                                        <path d="M14.8148 12.9727C14.5798 12.9727 14.4448 13.2177 14.4448 13.6402C14.4448 14.0352 14.5798 14.3677 14.8773 14.3427C15.1223 14.3227 15.2073 13.9477 15.1848 13.6152C15.1623 13.2177 15.1123 12.9727 14.8148 12.9727Z" fill="#FDFFFF"/>
                                        <path d="M7.32764 23.0224C7.32764 29.0124 12.7551 31.5049 16.3576 31.3974C20.5551 31.2724 25.0701 28.0874 24.6976 22.3724C24.3476 17.0099 19.8326 14.5499 15.8876 14.5774C11.3026 14.6124 7.32764 17.7899 7.32764 23.0224Z" fill="#F79429"/>
                                        <path d="M16.1673 30.4927C16.1048 30.4927 16.0398 30.4927 15.9773 30.4902C14.1023 30.4277 12.2498 29.6377 10.8948 28.3252C9.44476 26.9202 8.64976 25.0202 8.65976 22.9777C8.68226 17.9902 13.0423 15.6777 15.9998 15.6777H16.0248C20.0323 15.6952 23.3223 18.8102 23.4148 23.0327C23.4548 24.9127 22.8548 26.7827 21.3448 28.2677C19.9348 29.6477 17.8948 30.4927 16.1673 30.4927ZM15.9948 16.5077C13.3423 16.5077 9.41976 18.6777 9.40976 22.9777C9.40226 26.1927 11.8923 29.4977 16.0398 29.6377C17.6198 29.6877 19.4023 29.1027 20.7148 27.8127C22.0798 26.4702 22.6923 24.7202 22.6648 23.0452C22.6048 19.4127 19.6348 16.5227 16.0298 16.5077C16.0223 16.5027 16.0023 16.5077 15.9948 16.5077Z" fill="#D25116"/>
                                        <path d="M14.5225 15.3678C14.35 15.1303 12.5825 15.1978 10.68 16.8353C8.78996 18.4628 8.50746 20.2628 8.84746 20.3578C9.23496 20.4653 9.70746 18.7253 11.34 17.2628C12.84 15.9253 14.865 15.8403 14.5225 15.3678ZM22.12 21.9103C21.5175 21.9953 22.1425 23.8003 20.745 25.8203C19.5325 27.5728 18.1575 28.2078 18.3175 28.5928C18.5325 29.1078 20.735 27.8253 21.755 25.7353C22.6775 23.8428 22.5675 21.8453 22.12 21.9103Z" fill="#FEFFFA"/>
                                        <path d="M6.37755 0.930104C6.22005 1.0751 12.2425 11.8001 12.2425 11.8001C12.2425 11.8001 13.2525 11.9301 15.5075 11.9501C17.7625 11.9701 18.88 11.8201 18.88 11.8201C18.88 11.8201 14.1975 1.0376 13.9175 0.930104C13.78 0.875104 11.925 0.855104 10.1125 0.835104C8.29755 0.812604 6.52755 0.790104 6.37755 0.930104Z" fill="#2E9DF4"/>
                                        <path d="M18.7376 20.9273C18.4476 18.4148 15.5226 18.2048 14.3101 19.1698C13.1301 20.1098 13.2426 21.4198 14.0701 21.5723C14.7226 21.6923 14.8926 21.1748 15.0826 20.9373C15.5126 20.4048 16.1976 20.3548 16.6451 20.7823C17.1526 21.2698 16.8401 22.4348 16.0776 22.4823C15.5101 22.5173 15.2226 22.4873 15.1501 22.5848C15.0476 22.7223 15.0626 23.8048 15.1676 23.9248C15.2876 24.0623 15.7676 23.9773 16.1801 23.9923C16.7476 24.0148 17.3501 24.8548 16.9526 25.4848C16.5401 26.1373 15.4426 25.8448 15.0476 25.4498C14.5251 24.9273 14.0026 25.2273 13.8276 25.4323C13.5526 25.7573 13.2601 26.4973 14.2751 27.2173C15.2876 27.9373 18.3601 28.0748 18.9801 25.8448C19.5201 23.8973 18.2601 23.0973 18.2601 23.0973C18.2601 23.0973 18.9026 22.3598 18.7376 20.9273Z" fill="#D25116"/>
                                    </svg>
                                @else
                                    {{-- not --}}
                                    <svg class="size-6 min-w-6 min-h-6" viewBox="0 0 18 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.0595 7.05898C16.6454 6.47305 16.6454 5.52148 16.0595 4.93555C15.4735 4.34961 14.522 4.34961 13.936 4.93555L9.0001 9.87617L4.05947 4.94023C3.47354 4.3543 2.52197 4.3543 1.93604 4.94023C1.3501 5.52617 1.3501 6.47773 1.93604 7.06367L6.87666 11.9996L1.94072 16.9402C1.35479 17.5262 1.35479 18.4777 1.94072 19.0637C2.52666 19.6496 3.47822 19.6496 4.06416 19.0637L9.0001 14.123L13.9407 19.059C14.5267 19.6449 15.4782 19.6449 16.0642 19.059C16.6501 18.473 16.6501 17.5215 16.0642 16.9355L11.1235 11.9996L16.0595 7.05898Z" fill="#EB5757"/>
                                    </svg>
                                @endif
                            </td>
                            <td class="px-4 py-2 font-medium">
                                <a href="{{ $showcase->youtubeWatchUrl }}" target="_blank" class="flex items-center gap-2">
                                    <span class="text-five">Akses Video</span>
                                    <svg class="size-6 min-w-6 min-h-6 stroke-five" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 4H6C5.46957 4 4.96086 4.21071 4.58579 4.58579C4.21071 4.96086 4 5.46957 4 6V18C4 18.5304 4.21071 19.0391 4.58579 19.4142C4.96086 19.7893 5.46957 20 6 20H18C18.5304 20 19.0391 19.7893 19.4142 19.4142C19.7893 19.0391 20 18.5304 20 18V14M12 12L20 4M20 4V9M20 4H15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </td>
                            <td class="px-4 py-2">
                                <div class="flex gap-3 items-center">
                                    <a href="{{ route('dashboard.showcase.show', $showcase->slug) }}" title="Detail">
                                        <button type="button" class="cursor-pointer hover:scale-110 transition-transform">
                                            <svg class="size-6 min-w-6 min-h-6 fill-blue-500" viewBox="0 0 26 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.9165 19.417H14.0832V12.917H11.9165V19.417ZM12.9998 10.7503C13.3068 10.7503 13.5643 10.6463 13.7723 10.4383C13.9803 10.2303 14.0839 9.97321 14.0832 9.66699C14.0824 9.36077 13.9784 9.10366 13.7712 8.89566C13.5639 8.68766 13.3068 8.58366 12.9998 8.58366C12.6929 8.58366 12.4358 8.68766 12.2285 8.89566C12.0212 9.10366 11.9172 9.36077 11.9165 9.66699C11.9158 9.97321 12.0198 10.2307 12.2285 10.4394C12.4372 10.6481 12.6943 10.7518 12.9998 10.7503ZM12.9998 24.8337C11.5012 24.8337 10.0929 24.5491 8.77484 23.98C7.45678 23.4109 6.31026 22.6392 5.33526 21.6649C4.36026 20.6906 3.58856 19.5441 3.02017 18.2253C2.45178 16.9065 2.16723 15.4982 2.16651 14.0003C2.16578 12.5024 2.45034 11.0941 3.02017 9.77533C3.59001 8.45655 4.3617 7.31002 5.33526 6.33574C6.30881 5.36146 7.45534 4.58977 8.77484 4.02066C10.0943 3.45155 11.5027 3.16699 12.9998 3.16699C14.497 3.16699 15.9053 3.45155 17.2248 4.02066C18.5443 4.58977 19.6909 5.36146 20.6644 6.33574C21.638 7.31002 22.41 8.45655 22.9806 9.77533C23.5511 11.0941 23.8353 12.5024 23.8332 14.0003C23.831 15.4982 23.5465 16.9065 22.9795 18.2253C22.4126 19.5441 21.6409 20.6906 20.6644 21.6649C19.688 22.6392 18.5415 23.4112 17.2248 23.9811C15.9082 24.5509 14.4999 24.8351 12.9998 24.8337ZM12.9998 22.667C15.4193 22.667 17.4686 21.8274 19.1478 20.1482C20.8269 18.4691 21.6665 16.4198 21.6665 14.0003C21.6665 11.5809 20.8269 9.53158 19.1478 7.85241C17.4686 6.17324 15.4193 5.33366 12.9998 5.33366C10.5804 5.33366 8.53109 6.17324 6.85192 7.85241C5.17276 9.53158 4.33317 11.5809 4.33317 14.0003C4.33317 16.4198 5.17276 18.4691 6.85192 20.1482C8.53109 21.8274 10.5804 22.667 12.9998 22.667Z"/>
                                            </svg>
                                        </button>
                                    </a>
                                    <a href="{{ route('dashboard.showcase.edit', $showcase->slug) }}" title="Edit" class="cursor-pointer hover:scale-110 transition-transform">
                                        <svg class="size-6 min-w-6 min-h-6 fill-yellow-500" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.22222 20.7778H5.80555L16.6667 9.91667L15.0833 8.33333L4.22222 19.1944V20.7778ZM2 23V18.2778L16.6667 3.63889C16.8889 3.43519 17.1344 3.27778 17.4033 3.16667C17.6722 3.05556 17.9544 3 18.25 3C18.5455 3 18.8326 3.05556 19.1111 3.16667C19.3896 3.27778 19.6304 3.44444 19.8333 3.66667L21.3611 5.22222C21.5833 5.42593 21.7455 5.66667 21.8478 5.94444C21.95 6.22222 22.0007 6.5 22 6.77778C22 7.07407 21.9493 7.35667 21.8478 7.62556C21.7463 7.89444 21.5841 8.13963 21.3611 8.36111L6.72222 23H2ZM15.8611 9.13889L15.0833 8.33333L16.6667 9.91667L15.8611 9.13889Z"/>
                                        </svg>
                                    </a>
                                    <button title="Hapus" onclick="confirmDelete('{{ $showcase->slug }}', '{{ $showcase->title }}')" class="cursor-pointer hover:scale-110 transition-transform">
                                        <svg class="size-6 min-w-6 min-h-6 fill-red-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.375 22C5.75625 22 5.22675 21.7826 4.7865 21.3478C4.34625 20.913 4.12575 20.3896 4.125 19.7778V5.33333H3V3.11111H8.625V2H15.375V3.11111H21V5.33333H19.875V19.7778C19.875 20.3889 19.6549 20.9122 19.2146 21.3478C18.7744 21.7833 18.2445 22.0007 17.625 22H6.375ZM17.625 5.33333H6.375V19.7778H17.625V5.33333ZM8.625 17.5556H10.875V7.55556H8.625V17.5556ZM13.125 17.5556H15.375V7.55556H13.125V17.5556Z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    @if(request()->hasAny(['search', 'year']))
                                        <p class="text-lg font-medium">Tidak ada karya peserta yang sesuai dengan filter</p>
                                        <p class="text-sm">Coba ubah kriteria pencarian atau filter Anda</p>
                                        <a href="{{ route('dashboard.showcase.index') }}" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">Reset Filter</a>
                                    @else
                                        <p class="text-lg font-medium">Tidak ada data karya peserta</p>
                                        <p class="text-sm">Silakan tambahkan karya peserta baru untuk melihat data di sini</p>
                                        <a href="{{ route('dashboard.showcase.create') }}" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">Tambah Karya Peserta</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if($showcases->hasPages())
                <div class="flex justify-between items-center bg-one text-light px-4 py-3">
                    <p class="text-sm">
                        Showing {{ $showcases->firstItem() }} to {{ $showcases->lastItem() }} of {{ $showcases->total() }} results
                    </p>
                    
                    <div class="flex items-center">
                        @if ($showcases->onFirstPage())
                            <span class="bg-three border-four border rounded-l-lg px-4 py-2 opacity-50 cursor-not-allowed">&lt;</span>
                        @else
                            <a href="{{ $showcases->previousPageUrl() }}" class="bg-three border-four border rounded-l-lg px-4 py-2 hover:bg-four transition-colors">&lt;</a>
                        @endif

                        @foreach ($showcases->getUrlRange(1, $showcases->lastPage()) as $page => $url)
                            @if ($page == $showcases->currentPage())
                                <span class="bg-six border-four border px-4 py-2 font-bold">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="bg-three border-four border px-4 py-2 hover:bg-four transition-colors">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($showcases->hasMorePages())
                            <a href="{{ $showcases->nextPageUrl() }}" class="bg-three border-four border rounded-r-lg px-4 py-2 hover:bg-four transition-colors">&gt;</a>
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
                title: 'Filter Data Karya Peserta',
                size: 'lg',
                icon: `<svg class="w-6 h-6 text-one" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M0.121712 1.71563C0.327962 1.27813 0.765462 1 1.24984 1H14.7498C15.2342 1 15.6717 1.27813 15.878 1.71563C16.0842 2.15313 16.0217 2.66875 15.7155 3.04375L9.99984 10.0281V14C9.99984 14.3781 9.78734 14.725 9.44671 14.8938C9.10609 15.0625 8.70296 15.0281 8.39984 14.8L6.39984 13.3C6.14671 13.1125 5.99984 12.8156 5.99984 12.5V10.0281L0.281087 3.04063C-0.0220383 2.66875 -0.0876633 2.15 0.121712 1.71563Z"/>
                        </svg>`,
                content: `
                    <form id="filterForm" method="GET" action="{{ route('dashboard.showcase.index') }}" class="space-y-6">
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
                                <option value="title" {{ request('sort_by') == 'title' ? 'selected' : '' }}>Judul (A-Z)</option>
                                <option value="title_desc" {{ request('sort_by') == 'title_desc' ? 'selected' : '' }}>Judul (Z-A)</option>
                                <option value="year" {{ request('sort_by') == 'year' ? 'selected' : '' }}>Tahun</option>
                            </select>
                        </div>
                    </form>
                `,
                footer: `
                    <a href="{{ route('dashboard.showcase.index') }}" class="reset-btn px-4 py-2 text-gray-600 hover:shadow-xl shadow-seven/30 hover:bg-gray-100 rounded-lg transition-all duration-200">
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

        function confirmDelete(showcaseSlug, showcaseTitle) {
            modal.confirm({
                title: 'Konfirmasi Hapus',
                message: `Apakah Anda yakin ingin menghapus karya peserta "<strong>${showcaseTitle}</strong>"? Tindakan ini tidak dapat dipulihkan`,
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
                                    <span class="ml-3">Menghapus karya peserta...</span>
                                </div>
                            `,
                            closeOnOutsideClick: false,
                            showCloseButton: false
                        });

                        const response = await fetch(`{{ route('dashboard.showcase.index') }}/${showcaseSlug}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            }
                        });

                        const result = await response.json();
                        
                        
                        if (result.success) {
                            modal.hide();
                            modal.alert({
                                title: 'Berhasil',
                                message: result.message,
                                icon: `<svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>`,
                                onOk: () => window.location.href = "{{ route('dashboard.showcase.index') }}"
                            });
                        } else {
                            modal.hide();
                            modal.alert({
                                title: 'Error',
                                message: result.message || 'Gagal menghapus karya peserta',
                                icon: `<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>`
                            });
                        }
                    } catch (error) {
                        console.error('Error deleting showcase:', error);
                        modal.hide();
                        modal.alert({
                            title: 'Error',
                            message: 'Terjadi kesalahan saat menghapus karya peserta',
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