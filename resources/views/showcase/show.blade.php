@extends('layouts.main')

@section('content')
    <section class="py-24">
        <div class="container mx-auto">
            <img src="{{ asset('assets/images/img.png') }}" class="aspect-video w-full max-w-2xl mx-auto object-cover rounded-2xl shadow-lg" alt="">
            <div class="mt-10 dark:bg-black bg-light shadow-2xl rounded-xl p-8">
                <div class="flex gap-3 items-center">
                    <div class="hexagon bg-main-gradient w-8 h-9"></div>
                    <p class="text-black dark:text-light text-lg">Anonymous</p>
                </div>
                <h1 class="text-xl font-semibold text-black dark:text-light mt-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, tenetur!</h1>
                <div class="my-8 p-5 rounded-lg bg-28-transparent text-black dark:text-light">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi molestiae quia dolorem? Similique accusantium debitis eveniet illo laboriosam totam assumenda sint. Ullam eveniet laborum, earum iste voluptates deserunt quo in? Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore natus molestiae modi dicta dolore alias sequi id dignissimos explicabo soluta.
                </div>
                <h2 class="text-lg font-semibold text-black dark:text-light mt-2">Created By</h2>
                <div class="flex items-center flex-wrap gap-x-10 gap-y-2">
                    <div class="flex gap-3 items-center mt-3">
                        <div class="hexagon bg-six w-6 h-7"></div>
                        <p class="text-black dark:text-light">Made Bagus</p>
                    </div>
                    <div class="flex gap-3 items-center mt-3">
                        <div class="hexagon bg-six w-6 h-7"></div>
                        <p class="text-black dark:text-light">Made Bagus</p>
                    </div>
                    <div class="flex gap-3 items-center mt-3">
                        <div class="hexagon bg-six w-6 h-7"></div>
                        <p class="text-black dark:text-light">Made Bagus</p>
                    </div>
                    <div class="flex gap-3 items-center mt-3">
                        <div class="hexagon bg-six w-6 h-7"></div>
                        <p class="text-black dark:text-light">Made Bagus</p>
                    </div>
                    <div class="flex gap-3 items-center mt-3">
                        <div class="hexagon bg-six w-6 h-7"></div>
                        <p class="text-black dark:text-light">Made Bagus</p>
                    </div>
                    <div class="flex gap-3 items-center mt-3">
                        <div class="hexagon bg-six w-6 h-7"></div>
                        <p class="text-black dark:text-light">Made Bagus</p>
                    </div>
                    <div class="flex gap-3 items-center mt-3">
                        <div class="hexagon bg-six w-6 h-7"></div>
                        <p class="text-black dark:text-light">Made Bagus</p>
                    </div>
                    <div class="flex gap-3 items-center mt-3">
                        <div class="hexagon bg-six w-6 h-7"></div>
                        <p class="text-black dark:text-light">Made Bagus</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection