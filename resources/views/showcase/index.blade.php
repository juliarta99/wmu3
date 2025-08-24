@extends('layouts.main')

@section('content')
    <section class="py-24 min-h-screen flex items-center justify-center">
        <div class="container px-3 mx-auto md:flex items-center justify-center gap-10">
            <img data-aos-duration="500" data-aos="fade-right" data-aos-delay="300" src="{{ asset('assets/images/maskot/4.png') }}" alt="" class="w-60 max-w-full mx-auto md:w-full md:max-w-[25%]">
            <div class="">
                <h2 data-aos-duration="500" data-aos="zoom-in" data-aos-delay="100" class="text-center text-base sm:text-lg md:text-xl text-seven font-semibold">SHOWACASE</h2>
                <h1 data-aos-duration="500" data-aos="fade-up" data-aos-delay="300" class="text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl text-black dark:text-light font-bold mt-1">
                    Record <span class="text-seven">Today</span> <br>
                    Cherish <span class="text-seven">Tomorrow</span>
                </h1>
                <p data-aos-duration="500" data-aos="fade-up" data-aos-delay="500" class="mt-3 text-sm md:text-base text-center text-black dark:text-light">
                    Setiap hasil mencerminkan ketekunan, imajinasi, dan dedikasi yang dibawa dalam setiap langkah penciptaannya. Karya berbicara tanpa perlu kata-kata, mengungkapkan makna yang lebih dalam dari sekadar visual
                </p>
            </div>
        </div>
    </section>
    <section class="py-14 relative">
        <img src="{{ asset('assets/images/gradient-blur-2.png') }}" class="w-full absolute -translate-y-1/2 -z-1" />
        <img src="{{ asset('assets/images/gradient-blur-2.png') }}" class="w-full absolute translate-y-1/2 bottom-0 -z-1" />
        <div id="showcases" class="container px-3 mx-auto scroll-mt-24">
            <form data-aos-duration="500" data-aos="fade-up" data-aos-delay="100" method="GET" action="{{ route('showcase.index') }}#showcases" class="flex items-center gap-5 rounded-lg pl-5 pr-2 shadow-lg bg-light dark:bg-[#282828] border-[1px] border-gray-200 dark:border-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="fill-black dark:fill-light size-5 md:size-6">
                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                </svg>
                <input type="text" name="search" value="{{ request('search') }}" class="text-black dark:text-light w-full border-none text-sm md:text-base outline-none py-3" placeholder="Search showcase">
                <button 
                    type="button" 
                    id="btn-search" 
                    class="hidden opacity-0 scale-95 bg-main-gradient text-light text-sm md:text-base py-2 px-3 rounded-md cursor-pointer transition-all duration-300 ease-in-out"
                >
                    Cari
                </button>
            </form>
            @if(request()->hasAny(['search']))
                <div data-aos-duration="500" data-aos="zoom-in" data-aos-delay="300" class="mt-4 p-4 bg-blue-50 dark:bg-one border border-blue-200 dark:border-two rounded-lg">
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
                                    <span class="bg-blue-100 dark:bg-three text-blue-800 dark:text-blue-600 px-2 py-1 rounded text-sm">Pencarian: "{{ request('search') }}"</span>
                                @endif
                            </div>
                        </div>
                        <a href="{{ route('showcase.index') }}#showcases" class="hover:text-yellow-100 text-light transition duration-200 bg-main-gradient py-2 px-4 rounded-md text-sm font-medium text-center">Reset Filter</a>
                    </div>
                </div>
            @endif
            @if ($showcases->count() == 0)
                <div class="text-black dark:text-light mt-5">
                    <svg data-aos-duration="500" data-aos="fade-up" data-aos-delay="300" class="w-16 h-16 text-gray-800 dark:text-gray-50 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <p data-aos-duration="500" data-aos="fade-up" data-aos-delay="400" class="text-center text-lg font-medium">Tidak ada data karya peserta</p>
                    @if(request('search'))
                        <p data-aos-duration="500" data-aos="fade-up" data-aos-delay="500" class="text-center text-sm">Tidak ditemukan karya peserta dengan kata kunci <span class="text-seven">"{{ request('search') }}"</span></p>
                    @endif
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 mt-10">
                    @foreach ($showcases as $showcase)
                        <div data-aos-duration="500" data-aos="fade-up" data-aos-delay="300" class="relative" style="padding-top: calc(50% * 9/16);">
                            <div class="shadow-xl h-full bg-light dark:bg-black p-5 rounded-xl" style="padding-top: calc(50% * 9/16);">
                                <img src="{{ Storage::url($showcase->cover) }}" class="aspect-video w-[90%] mx-auto object-cover rounded-2xl shadow-lg absolute top-0 left-1/2 -translate-x-1/2" alt="">
                                <div class="flex justify-between flex-col h-full">
                                    <div class="">
                                        <h2 class="text-base md:text-lg lg:text-xl font-semibold text-black dark:text-light">{{ $showcase->title }}</h2>
                                        <div class="flex gap-3 mt-2 items-center">
                                            <div class="hexagon bg-main-gradient md:w-6 md:h-7 sm:w-5 sm:h-6 w-4 h-5"></div>
                                            <p class="text-black dark:text-light text-sm md:text-base">{{ $showcase->team->name }}</p>
                                        </div>
                                        <p class="mt-3 text-gray-500 text-sm md:text-base">
                                            {{ Str::limit($showcase->description, 150) }}
                                        </p>
                                    </div>
                                    <a href="{{ route('showcase.show', $showcase->slug) }}" class="mt-auto">
                                        <div class="w-full mt-5 p-[2px] rounded-full bg-gradient-to-r from-six to-seven inline-block">
                                            <button class="hover:bg-transparent transition-all duration-300 cursor-pointer py-3 px-5 rounded-full bg-light dark:bg-black text-black hover:text-light dark:text-light w-full h-full text-sm md:text-base">
                                                See Details
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @if($showcases->hasPages())
                <div data-aos-duration="500" data-aos="fade-up" data-aos-delay="300" class="mt-6 flex flex-col sm:flex-row gap-3 justify-between items-center text-black dark:text-light px-4 py-3">
                    <p class="text-sm text-seven">
                        Showing {{ $showcases->firstItem() }} to {{ $showcases->lastItem() }} of {{ $showcases->total() }} results
                    </p>
                    
                    <div class="flex items-center">
                        @if ($showcases->onFirstPage())
                            <span class="dark:bg-three dark:border-four bg-gray-200 border-gray-300 border rounded-l-lg px-4 py-2 opacity-50 cursor-not-allowed">&lt;</span>
                        @else
                            <a href="{{ $showcases->previousPageUrl() }}#showcases" class="dark:bg-three dark:border-four bg-gray-200 border-gray-300 border rounded-l-lg px-4 py-2 hover:bg-gray-300 hover:dark:bg-four transition-colors">&lt;</a>
                        @endif

                        @foreach ($showcases->getUrlRange(1, $showcases->lastPage()) as $page => $url)
                            @if ($page == $showcases->currentPage())
                                <span class="dark:bg-six dark:border-four bg-seven text-light border-gray-300 border px-4 py-2 font-bold">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}#showcases" class="dark:bg-three dark:border-four bg-gray-200 border-gray-300 border px-4 py-2 hover:dark:bg-four hover:bg-gray-300 transition-colors">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($showcases->hasMorePages())
                            <a href="{{ $showcases->nextPageUrl() }}#showcases" class="dark:bg-three dark:border-four bg-gray-200 border-gray-300 border rounded-r-lg px-4 py-2 hover:bg-gray-300 hover:dark:bg-four transition-colors">&gt;</a>
                        @else
                            <span class="dark:bg-three dark:border-four bg-gray-200 border-gray-300 border rounded-r-lg px-4 py-2 opacity-50 cursor-not-allowed">&gt;</span>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/search.js') }}?v={{ time() }}"></script>
@endsection