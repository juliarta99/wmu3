@extends('layouts.main')

@section('content')
    <section class="pt-24 pb-14 md:pb-24 relative">
        <img src="{{ asset('assets/images/gradient-blur-3.png') }}" class="w-full absolute translate-y-1/2 bottom-0 -z-1" />
        <div class="container px-3 mx-auto">
            <div data-aos-duration="500" data-aos="zoom-in" data-aos-delay="100" class="relative w-full max-w-full md:max-w-2xl aspect-video rounded-xl md:rounded-2xl overflow-hidden mx-auto">
                <iframe id="ytplayer" type="text/html" 
                    src="{{ $showcase->youtubeEmbedUrl }}" 
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;" 
                    frameborder="0">
                </iframe>
            </div>
            <div class="mt-5 md:mt-10 dark:bg-black bg-light shadow-2xl rounded-xl p-6 md:p-8">
                <div class="flex gap-3 items-center">
                    <div class="hexagon bg-main-gradient md:w-8 md:h-9 sm:w-7 sm:h-8 w-6 h-7"></div>
                    <p class="text-black dark:text-light text-base md:text-lg">{{ $showcase->team->name }}</p>
                </div>
                <h1 class="text-lg md:text-xl font-semibold text-black dark:text-light mt-3">{{ $showcase->title }}</h1>
                <p class="text-sm md:text-base my-4 md:my-8 p-5 rounded-lg bg-28-transparent text-black dark:text-light">
                    {!! nl2br(e($showcase->description)) !!}
                </p>
                <h2 class="text-base md:text-lg font-semibold text-black dark:text-light mt-2">Created By</h2>
                <div class="flex items-center flex-wrap gap-x-8 md:gap-x-10 gap-y-2">
                    @forelse ($showcase->team->contributors as $contributor)
                        <div class="flex gap-2 md:gap-3 items-center mt-2 md:mt-3">
                            <div class="hexagon bg-six md:w-6 md:h-7 sm:w-5 sm:h-6 w-4 h-5"></div>
                            <p class="text-black dark:text-light text-sm md:text-base">Made Bagus</p>
                        </div>
                    @empty
                        <p class="text-center">Anggota tim belum ditambahkan</p>
                        <a href="{{ route('dashboard.team.create') }}" class="text-six">Tambah Anggota Tim</a>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection