@extends('layouts.main')

@section('content')
    <section class="py-24 min-h-screen flex items-center justify-center">
        <div class="container mx-auto flex items-center justify-center gap-10">
            <img src="{{ asset('assets/images/maskot/4.png') }}" alt="" class="max-w-[30%]">
            <div class="">
                <h2 class="text-center text-xl text-seven font-semibold ">SHOWACASE</h2>
                <h1 class="text-center text-5xl text-black dark:text-light font-bold mt-1">
                    Record <span class="text-seven">Today</span> <br>
                    Cherish <span class="text-seven">Tomorrow</span>
                </h1>
                <p class="mt-3 text-center text-black dark:text-light">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis autem, aut, quas ipsum provident at ipsa a doloremque iusto ut veniam quod repudiandae nesciunt amet? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla nisi doloremque, debitis dolore eius, quia nam ab commodi porro in tempore labore deserunt earum neque?
                </p>
            </div>
        </div>
    </section>
    <section class="py-24 relative">
        <img src="{{ asset('assets/images/gradient-blur-2.png') }}" class="w-full absolute -translate-y-1/2 -z-1" />
        <img src="{{ asset('assets/images/gradient-blur-2.png') }}" class="w-full absolute translate-y-1/2 bottom-0 -z-1" />
        <div class="container mx-auto">
            <div class="flex items-center gap-5 rounded-lg py-3 px-5 shadow-lg bg-light dark:bg-[#282828] border-[1px] border-gray-200 dark:border-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="fill-black dark:fill-light size-6">
                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                </svg>
                <input type="text" name="search" class="text-black dark:text-light w-full border-none outline-none" placeholder="Search showcase">
            </div>
            <div class="grid grid-cols-3 gap-10 mt-10">
                <div class="relative pt-28">
                    <div class="shadow-xl bg-light dark:bg-black p-5 pt-28 rounded-xl">
                        <img src="{{ asset('assets/images/img.png') }}" class="aspect-video w-[90%] mx-auto object-cover rounded-2xl shadow-lg absolute top-0" alt="">
                        <h2 class="text-xl font-semibold text-black dark:text-light">Lorem, ipsum dolor.</h2>
                        <div class="flex gap-3 mt-2 items-center">
                            <div class="hexagon bg-main-gradient w-6 h-7"></div>
                            <p class="text-black dark:text-light">Anonymous</p>
                        </div>
                        <p class="mt-3 text-gray-500">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque hic ipsum perspiciatis. Nulla dolore aliquid architecto libero repellendus voluptatem accusantium...
                        </p>
                        <a href="{{ route('showcase.show') }}">
                            <div class="w-full mt-5 p-[2px] rounded-full bg-gradient-to-r from-six to-seven inline-block">
                                <button class="hover:bg-transparent transition-all duration-300 cursor-pointer py-3 px-5 rounded-full bg-light dark:bg-black text-black hover:text-light dark:text-light w-full h-full">
                                    See Details
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="relative pt-28">
                    <div class="shadow-xl bg-light dark:bg-black p-5 pt-28 rounded-xl">
                        <img src="{{ asset('assets/images/img.png') }}" class="aspect-video w-[90%] mx-auto object-cover rounded-2xl shadow-lg absolute top-0" alt="">
                        <h2 class="text-xl font-semibold text-black dark:text-light">Lorem, ipsum dolor.</h2>
                        <div class="flex gap-3 mt-2 items-center">
                            <div class="hexagon bg-main-gradient w-6 h-7"></div>
                            <p class="text-black dark:text-light">Anonymous</p>
                        </div>
                        <p class="mt-3 text-gray-500">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque hic ipsum perspiciatis. Nulla dolore aliquid architecto libero repellendus voluptatem accusantium...
                        </p>
                        <a href="{{ route('showcase.show') }}">
                            <div class="w-full mt-5 p-[2px] rounded-full bg-gradient-to-r from-six to-seven inline-block">
                                <button class="hover:bg-transparent transition-all duration-300 cursor-pointer py-3 px-5 rounded-full bg-light dark:bg-black text-black hover:text-light dark:text-light w-full h-full">
                                    See Details
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="relative pt-28">
                    <div class="shadow-xl bg-light dark:bg-black p-5 pt-28 rounded-xl">
                        <img src="{{ asset('assets/images/img.png') }}" class="aspect-video w-[90%] mx-auto object-cover rounded-2xl shadow-lg absolute top-0" alt="">
                        <h2 class="text-xl font-semibold text-black dark:text-light">Lorem, ipsum dolor.</h2>
                        <div class="flex gap-3 mt-2 items-center">
                            <div class="hexagon bg-main-gradient w-6 h-7"></div>
                            <p class="text-black dark:text-light">Anonymous</p>
                        </div>
                        <p class="mt-3 text-gray-500">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque hic ipsum perspiciatis. Nulla dolore aliquid architecto libero repellendus voluptatem accusantium...
                        </p>
                        <a href="{{ route('showcase.show') }}">
                            <div class="w-full mt-5 p-[2px] rounded-full bg-gradient-to-r from-six to-seven inline-block">
                                <button class="hover:bg-transparent transition-all duration-300 cursor-pointer py-3 px-5 rounded-full bg-light dark:bg-black text-black hover:text-light dark:text-light w-full h-full">
                                    See Details
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="relative pt-28">
                    <div class="shadow-xl bg-light dark:bg-black p-5 pt-28 rounded-xl">
                        <img src="{{ asset('assets/images/img.png') }}" class="aspect-video w-[90%] mx-auto object-cover rounded-2xl shadow-lg absolute top-0" alt="">
                        <h2 class="text-xl font-semibold text-black dark:text-light">Lorem, ipsum dolor.</h2>
                        <div class="flex gap-3 mt-2 items-center">
                            <div class="hexagon bg-main-gradient w-6 h-7"></div>
                            <p class="text-black dark:text-light">Anonymous</p>
                        </div>
                        <p class="mt-3 text-gray-500">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque hic ipsum perspiciatis. Nulla dolore aliquid architecto libero repellendus voluptatem accusantium...
                        </p>
                        <a href="{{ route('showcase.show') }}">
                            <div class="w-full mt-5 p-[2px] rounded-full bg-gradient-to-r from-six to-seven inline-block">
                                <button class="hover:bg-transparent transition-all duration-300 cursor-pointer py-3 px-5 rounded-full bg-light dark:bg-black text-black hover:text-light dark:text-light w-full h-full">
                                    See Details
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="relative pt-28">
                    <div class="shadow-xl bg-light dark:bg-black p-5 pt-28 rounded-xl">
                        <img src="{{ asset('assets/images/img.png') }}" class="aspect-video w-[90%] mx-auto object-cover rounded-2xl shadow-lg absolute top-0" alt="">
                        <h2 class="text-xl font-semibold text-black dark:text-light">Lorem, ipsum dolor.</h2>
                        <div class="flex gap-3 mt-2 items-center">
                            <div class="hexagon bg-main-gradient w-6 h-7"></div>
                            <p class="text-black dark:text-light">Anonymous</p>
                        </div>
                        <p class="mt-3 text-gray-500">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque hic ipsum perspiciatis. Nulla dolore aliquid architecto libero repellendus voluptatem accusantium...
                        </p>
                        <a href="{{ route('showcase.show') }}">
                            <div class="w-full mt-5 p-[2px] rounded-full bg-gradient-to-r from-six to-seven inline-block">
                                <button class="hover:bg-transparent transition-all duration-300 cursor-pointer py-3 px-5 rounded-full bg-light dark:bg-black text-black hover:text-light dark:text-light w-full h-full">
                                    See Details
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="relative pt-28">
                    <div class="shadow-xl bg-light dark:bg-black p-5 pt-28 rounded-xl">
                        <img src="{{ asset('assets/images/img.png') }}" class="aspect-video w-[90%] mx-auto object-cover rounded-2xl shadow-lg absolute top-0" alt="">
                        <h2 class="text-xl font-semibold text-black dark:text-light">Lorem, ipsum dolor.</h2>
                        <div class="flex gap-3 mt-2 items-center">
                            <div class="hexagon bg-main-gradient w-6 h-7"></div>
                            <p class="text-black dark:text-light">Anonymous</p>
                        </div>
                        <p class="mt-3 text-gray-500">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque hic ipsum perspiciatis. Nulla dolore aliquid architecto libero repellendus voluptatem accusantium...
                        </p>
                        <a href="{{ route('showcase.show') }}">
                            <div class="w-full mt-5 p-[2px] rounded-full bg-gradient-to-r from-six to-seven inline-block">
                                <button class="hover:bg-transparent transition-all duration-300 cursor-pointer py-3 px-5 rounded-full bg-light dark:bg-black text-black hover:text-light dark:text-light w-full h-full">
                                    See Details
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection