@extends('layouts.main')

@section('content')
    <section class="py-24 min-h-screen">
        <div class="container mx-auto flex items-center justify-center gap-10">
            <img src="{{ asset('assets/images/maskot/3.png') }}" alt="" class="max-w-[30%]">
            <div class="">
                <h2 class="text-center text-xl text-seven font-semibold">Quiz</h2>
                <h1 class="text-center text-5xl text-black dark:text-light font-bold mt-1">Pre-Test</h1>
                <p class="text-black dark:text-light my-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem, tempora Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid similique amet ducimus quos! Quidem libero sit aliquid esse vel quas.</p>
                <a href="" class="block w-max mx-auto">
                    <button class="py-3 px-10 rounded-full bg-main-gradient cursor-pointer text-light">
                        Start
                    </button>
                </a>
            </div>
        </div>
    </section>

    <section class="py-24 min-h-screen grayscale-100 cursor-not-allowed">
        <div class="container mx-auto flex items-center justify-center gap-10">
            <div class="">
                <h2 class="text-center text-xl text-seven font-semibold">Quiz</h2>
                <h1 class="text-center text-5xl text-black dark:text-light font-bold mt-1">Post-Test</h1>
                <p class="text-black dark:text-light my-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem, tempora Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid similique amet ducimus quos! Quidem libero sit aliquid esse vel quas.</p>
                <a href="" class="block w-max mx-auto">
                    <button class="py-3 px-10 rounded-full bg-main-gradient cursor-not-allowed text-light">
                        Start
                    </button>
                </a>
            </div>
            <img src="{{ asset('assets/images/maskot/5.png') }}" alt="" class="max-w-[30%]">
        </div>
    </section>
@endsection