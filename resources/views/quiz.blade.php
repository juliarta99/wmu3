@extends('layouts.main')

@section('content')
    <section class="pt-24 pb-14 md:pb-24 min-h-screen flex items-center justify-center">
        <div class="container mx-auto max-w-6xl flex flex-col md:flex-row items-center justify-center gap-6 md:gap-10 {{ $preTestLink->is_not_started || $preTestLink->is_expired ? 'grayscale-100 cursor-not-allowed' : '' }}">
            <img data-aos-duration="500" data-aos="fade-right" data-aos-delay="300" src="{{ asset('assets/images/maskot/3.png') }}" alt="" class="w-60 max-w-full mx-auto md:w-full md:max-w-[30%]">
            <div class="">
                <h2 data-aos-duration="500" data-aos="zoom-in" data-aos-delay="100" class="text-center text-base sm:text-lg md:text-xl text-seven font-semibold">Quiz</h2>
                <h1 data-aos-duration="500" data-aos="fade-up" data-aos-delay="300" class="text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl text-black dark:text-light font-bold mt-1">Pre-Test</h1>
                <p data-aos-duration="500" data-aos="fade-up" data-aos-delay="400" class="text-black dark:text-light my-5 text-sm md:text-base text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem, tempora Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid similique amet ducimus quos! Quidem libero sit aliquid esse vel quas.</p>
                <a data-aos-duration="500" data-aos="fade-up" data-aos-delay="500" href="{{ url($preTestLink->back_half) }}" target="_blank" class="block w-max mx-auto {{ $preTestLink->is_not_started || $preTestLink->is_expired ? 'pointer-events-none cursor-not-allowed' : '' }}">
                    <button class="text-sm md:text-base py-3 px-10 rounded-full bg-main-gradient cursor-pointer text-light">
                        Start
                    </button>
                </a>
            </div>
        </div>
    </section>

    <section class="py-14 md:py-24 min-h-screen relative flex items-center justify-center">
        <img src="{{ asset('assets/images/gradient-blur-2.png') }}" class="w-full absolute translate-y-1/2 bottom-0 -z-1" />
        <div class="container mx-auto max-w-6xl flex flex-col md:flex-row items-center justify-center gap-6 md:gap-10 {{ $postTestLink->is_not_started || $postTestLink->is_expired ? 'grayscale-100 cursor-not-allowed' : '' }}">
            <div class="order-2 md:order-1">
                <h2 data-aos-duration="500" data-aos="zoom-in" data-aos-delay="100" class="text-center text-base sm:text-lg md:text-xl text-seven font-semibold">Quiz</h2>
                <h1 data-aos-duration="500" data-aos="fade-up" data-aos-delay="300" class="text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl text-black dark:text-light font-bold mt-1">Post-Test</h1>
                <p data-aos-duration="500" data-aos="fade-up" data-aos-delay="400" class="text-black dark:text-light my-5 text-sm md:text-base text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem, tempora Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid similique amet ducimus quos! Quidem libero sit aliquid esse vel quas.</p>
                <a data-aos-duration="500" data-aos="fade-up" data-aos-delay="500" href="{{ $postTestLink->back_half }}" target="_blank" class="block w-max mx-auto {{ $postTestLink->is_not_started || $postTestLink->is_expired ? 'pointer-events-none cursor-not-allowed' : '' }}">
                    <button class="cursor-pointer text-sm md:text-base py-3 px-10 rounded-full bg-main-gradient text-light">
                        Start
                    </button>
                </a>
            </div>
            <img data-aos-duration="500" data-aos="fade-left" data-aos-delay="300" src="{{ asset('assets/images/maskot/5.png') }}" alt="" class="order-1 md:order-2 w-60 max-w-full mx-auto md:w-full md:max-w-[30%]">
        </div>
    </section>
@endsection