@extends('layouts.main')

@section('content')
    <section>
        <div class="pb-24 pt-48 min-h-screen flex flex-col items-center justify-center gap-5">
            <div class="container relative z-1 px-3 mx-auto flex flex-col items-center justify-center gap-10">
                <div class="flex flex-col items-center justify-center gap-3 max-w-3xl">
                    <h1 data-aos-duration="500" data-aos="zoom-in" class="text-2xl sm:text-3xl lg:text-4xl font-bold text-black dark:text-light text-center"><span class="bg-main-gradient bg-clip-text text-transparent">WORKSHOP</span>  MULTIMEDIA<br>UDAYANA <span class="bg-main-gradient bg-clip-text text-transparent">#3</span></h1>
                    <p data-aos-duration="500" data-aos="zoom-in" data-aos-delay="400" class="text-sm md:text-base text-center text-black dark:text-light">Setiap momen yang kita rekam hari ini adalah investasi untuk dikenang di masa depan. Dengan mendokumentasikannya, kita tidak hanya menyimpan gambar atau video, tetapi juga cerita dan perasaan yang akan tetap hidup di dalamnya</p>
                </div>
                <a href="/{{ $routeTarget }}" target="_blank" data-aos-duration="500" data-aos="fade-up" data-aos-delay="600">
                    <button class="hover:shadow-2xl hover:-translate-y-1 shadow-seven/30 transition-all duration-200 py-3 text-sm md:text-base px-5 rounded-full bg-main-gradient cursor-pointer text-light">
                        @if ($routeTarget == 'register')
                            Register Now
                        @elseif ($routeTarget == 'quiz')
                            Quiz Now
                        @else
                            See Showcase
                        @endif
                    </button>
                </a>
            </div>
            <div data-aos-duration="500" data-aos="fade-up" data-aos-delay="1000" class="mt-10 w-full relative">
                <div class="swiper swiper-3">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <video 
                                autoplay 
                                muted 
                                loop  
                                src="{{ asset('assets/videos/1.mp4') }}" 
                                class="rounded-xl w-full aspect-video object-cover">
                            </video>
                        </div>
                        <div class="swiper-slide">
                            <video 
                                autoplay 
                                muted 
                                loop  
                                src="{{ asset('assets/videos/2.mp4') }}" 
                                class="rounded-xl w-full aspect-video object-cover bg-28-transparent">
                            </video>
                        </div>
                        <div class="swiper-slide">
                            <video 
                                autoplay 
                                muted 
                                loop  
                                src="{{ asset('assets/videos/3.mp4') }}" 
                                class="rounded-xl w-full aspect-video object-cover">
                            </video>
                        </div>
                        <div class="swiper-slide">
                            <video 
                                autoplay 
                                muted 
                                loop  
                                src="{{ asset('assets/videos/4.mp4') }}" 
                                class="rounded-xl w-full aspect-video object-cover">
                            </video>
                        </div>
                        <div class="swiper-slide">
                            <video 
                                autoplay 
                                muted 
                                loop  
                                src="{{ asset('assets/videos/5.mp4') }}" 
                                class="rounded-xl w-full aspect-video object-cover">
                            </video>
                        </div>
                        <div class="swiper-slide">
                            <video 
                                autoplay 
                                muted 
                                loop  
                                src="{{ asset('assets/videos/6.mp4') }}" 
                                class="rounded-xl w-full aspect-video object-cover">
                            </video>
                        </div>
                        <div class="swiper-slide">
                            <video 
                                autoplay 
                                muted 
                                loop  
                                src="{{ asset('assets/videos/7.mp4') }}" 
                                class="rounded-xl w-full aspect-video object-cover">
                            </video>
                        </div>
                    </div>
                </div>
                <img src="{{ asset('assets/images/gradient-blur-2.png') }}" class="w-full absolute -translate-y-1/2 top-[50%] -z-1" />
            </div>
        </div>
    </section>

    <section class="py-10 md:py-24 scroll-mt-24" id="about">
        <div class="container px-3 mx-auto">
            <h5 data-aos-duration="500" data-aos="zoom-in" class="text-seven text-center text-sm md:text-base">Get to Know Us</h5>
            <h1 data-aos-duration="500" data-aos="zoom-in" data-aos-delay="300" class="text-xl sm:text-2xl md:text-3xl text-black dark:text-light text-center font-bold">About</h1>
        </div>

        <section class="py-14 md:py-30 grid grid-cols-1 md:grid-cols-[max-content_1fr] gap-6 md:gap-10 relative max-w-6xl mx-auto container px-3">
            <div class="w-130 h-130 aspect-square max-w-full bg-seven/30 blur-[1000rem] absolute top-0 left-1/2 md:left-[-50%] -translate-x-1/2 md:translate-x-1/2 -z-1"></div>
            <img data-aos-duration="500" data-aos="fade-right" data-aos-delay="100" src="{{ asset('assets/images/maskot/3.png') }}" class="w-88 max-w-full mx-auto" alt="">
            <div class="text-center md:text-start">
                <h5 data-aos-duration="500" data-aos="fade-left" data-aos-delay="100" class="text-sm md:text-base text-seven">About Us</h5>
                <h2 data-aos-duration="500" data-aos="fade-left" data-aos-delay="500" class="text-lg sm:text-xl md:text-2xl text-black dark:text-light font-semibold mt-1">What is Workshop Multimedia Udayana?</h2>
                <p data-aos-duration="500" data-aos="fade-left" data-aos-delay="700" class="text-black dark:text-light mt-3 text-sm md:text-base">Workshop Multimedia Udayana Vol. 3 adalah sebuah kegiatan yang menggabungkan pembelajaran teori dan praktik di bidang videografi. Peserta akan berkolaborasi dalam tim untuk menghasilkan sebuah karya. Kegiatan ini bertujuan untuk mengasah keterampilan praktis peserta melalui pengalaman langsung, sekaligus memberikan ruang untuk apresiasi dan pengembangan kreatif</p>
            </div>
        </section>

        <div class="relative">
            <img src="{{ asset('assets/images/gradient-blur-3.png') }}" class="w-full absolute top-0 -z-1" />
            <section class="py-14 md:py-30 max-w-lg mx-auto container px-3">
                <div class="w-130 h-130 aspect-square max-w-full bg-seven/20 blur-[1000rem] absolute top-[50%] right-[-10%] translate-x-1/2 -z-1"></div>
                <div class="relative group">
                    <h5 data-aos-duration="500" data-aos="zoom-in" data-aos-delay="100" class="text-seven text-center text-sm md:text-base">About Our Theme</h5>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-14 md:size-20 stroke-seven absolute -translate-x-1/2 top-1/2 -translate-y-1/2 left-1/2 scale-0 transition-all duration-750 group-hover:scale-100 group-hover:-rotate-45 group-hover:-translate-y-[20%] group-hover:-translate-x-full group-hover:md:left-0 group-hover:md:-top-5 group-hover:left-[15%] group-hover:-top-[5%] group-hover:opacity-100 opacity-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-14 md:size-20 dark:stroke-light stroke-gray-800 absolute translate-x-1/2 top-1/2 -translate-y-1/2 right-1/2 scale-0 transition-all duration-750 group-hover:scale-100 group-hover:rotate-15 group-hover:-translate-y-[20%] group-hover:translate-x-full group-hover:md:right-0 group-hover:right-[20%] group-hover:-top-[10%] group-hover:md:top-0 group-hover:opacity-100 opacity-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                    <h1 data-aos-duration="500" data-aos="fade-up" data-aos-delay="300" class="text-center text-2xl sm:textx-3xl md:text-4xl text-black dark:text-light mt-5 font-bold">“Record Every <span class="text-seven">Moments</span> <br> To Relive In <span class="text-seven">The Future</span> ”</h1>
                    <p data-aos-duration="500" data-aos="fade-up" data-aos-delay="500" class="text-sm md:text-base text-black dark:text-light mt-8 text-center">“Setiap momen yang kita abadikan dalam sebuah rekaman, akan terasa kembali hidup euforianya saat kita menontonnya kembali”</p>
                </div>
            </section>
        </div>

        <div class="relative">
            <img src="{{ asset('assets/images/gradient-blur-3.png') }}" class="w-full absolute bottom-0 -z-1" />
            <section class="py-14 md:py-30 max-w-5xl container px-3 mx-auto">
                <h5 data-aos-duration="500" data-aos="zoom-in" data-aos-delay="100" class="text-seven text-center text-sm md:text-base">About Our Logo</h5>
                <h1 data-aos-duration="500" data-aos="fade-up" data-aos-delay="300" class="text-center text-2xl sm:textx-3xl md:text-4xl text-black dark:text-light mt-5 font-bold">Record Today, Cherish Tomorrow</h1>
                <div id="parent-logo-element" data-aos-duration="700" data-aos="zoom-in" data-aos-delay="500">
                    <img id="logo-element" src="{{ asset('assets/images/logo-big.png') }}" class="max-w-full w-60 mx-auto my-5 md:my-12" alt="">
                </div>
                <div class="hidden md:grid grid-cols-2 gap-5">
                    <div data-aos-duration="500" data-aos="fade-up" data-aos-delay="500" class="col-span-2 p-5 rounded-lg flex flex-col items-center justify-center gap-3 bg-28-transparent hover:dark:bg-one hover:bg-light transition-all duration-300">
                        <h6 class="text-seven font-bold text-sm md:text-base text-center">Warna Biru Toska & Ungu</h6>
                        <p class="text-center text-black dark:text-light text-sm md:text-base">Biru Toska mengartikan teknologi, inovasi, dan kejernihan berpikir. Ungu merepresentasikan kreatifitas, imajinasi, dan ekspresi artistik</p>
                    </div>
                    <div data-aos-duration="500" data-aos="fade-up" data-aos-delay="500" class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light">
                        <h6 class="text-seven font-bold text-sm md:text-base">Bentuk Segi Enam</h6>
                        <p class="text-black dark:text-light text-sm md:text-base">Bermakna stabilitas, harmoni, dan keseimbangan. Disamping itu bentuk tersebut juga menjadi ceriminan dari enam disiplin dalam bidang Multimedia, yaitu: desain grafis, fotografi, videografi, animasi, audio, dan teknologi digital</p>
                    </div>
                    <div data-aos-duration="500" data-aos="fade-up" data-aos-delay="500" class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light">
                        <h6 class="text-seven font-bold text-sm md:text-base text-right">Bentuk Segitiga</h6>
                        <p class="text-black dark:text-light text-sm md:text-base text-right">Bermakna "Tri", simbol Trikona, yang dalam Sansekerta mewakili Kreativitas (cipta), Ekspresi (rasa), Teknologi (karsa). Bentuk ini juga layaknya tombol “Play” yang mengartikan memulai langkah baru</p>
                    </div>
                    <div data-aos-duration="500" data-aos="fade-up" data-aos-delay="500" class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light">
                        <h6 class="text-seven font-bold text-sm md:text-base">Gerakan Dinamis & Simetris</h6>
                        <p class="text-black dark:text-light text-sm md:text-base">Gerakan spiral yang melingkar mengarah ke tengah, menunjukkan sinkronisasi antar aspek multimedia seperti desain grafis, fotografi, videografi, animasi, audio, dan teknologi digital</p>
                    </div>
                    <div data-aos-duration="500" data-aos="fade-up" data-aos-delay="500" class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light">
                        <h6 class="text-seven font-bold text-sm md:text-base text-right">Gerakan Dinamis & Simetris</h6>
                        <p class="text-black dark:text-light text-sm md:text-base text-right">Bentuk Desain Grafis yang mewakili bidang desain dan menyerupai sebuah kamera yang mewakili bidang videografi dan fotografi</p>
                    </div>
                </div>
                <div class="block md:hidden" data-aos-duration="500" data-aos="fade-up" data-aos-delay="500">
                    <div class="swiper" id="swiper-logo">
                        <div class="swiper-wrapper items-center">
                            <div class="swiper-slide px-16">
                                <div class="p-5 slide-content rounded-lg flex flex-col items-center justify-center gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light">
                                    <h6 class="text-seven font-bold text-sm md:text-base text-center">Warna Biru Toska & Ungu</h6>
                                    <p class="text-center text-black dark:text-light text-sm md:text-base">Biru Toska mengartikan teknologi, inovasi, dan kejernihan berpikir. Ungu merepresentasikan kreatifitas, imajinasi, dan ekspresi artistik</p>
                                </div>
                            </div>
                            <div class="swiper-slide px-16">
                                <div class="p-5 slide-content rounded-lg flex flex-col items-center justify-center gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light">
                                    <h6 class="text-seven font-bold text-sm md:text-base text-center">Bentuk Segi Enam</h6>
                                    <p class="text-black text-center dark:text-light text-sm md:text-base">Bermakna stabilitas, harmoni, dan keseimbangan. Disamping itu bentuk tersebut juga menjadi ceriminan dari enam disiplin dalam bidang Multimedia, yaitu: desain grafis, fotografi, videografi, animasi, audio, dan teknologi digital</p>
                                </div>
                            </div>
                            <div class="swiper-slide px-16">
                                <div class="p-5 slide-content rounded-lg flex flex-col items-center justify-center gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light">
                                    <h6 class="text-seven font-bold text-sm md:text-base text-center">Bentuk Segitiga</h6>
                                    <p class="text-black dark:text-light text-sm md:text-base text-center">Bermakna "Tri", simbol Trikona, yang dalam Sansekerta mewakili Kreativitas (cipta), Ekspresi (rasa), Teknologi (karsa). Bentuk ini juga layaknya tombol “Play” yang mengartikan memulai langkah baru</p>
                                </div>
                            </div>
                            <div class="swiper-slide px-16">
                                <div class="p-5 slide-content rounded-lg flex flex-col items-center justify-center gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light">
                                    <h6 class="text-seven font-bold text-sm md:text-base text-center">Gerakan Dinamis & Simetris</h6>
                                    <p class="text-black dark:text-light text-sm md:text-base text-center">Gerakan spiral yang melingkar mengarah ke tengah, menunjukkan sinkronisasi antar aspek multimedia seperti desain grafis, fotografi, videografi, animasi, audio, dan teknologi digital</p>
                                </div>
                            </div>
                            <div class="swiper-slide px-16">
                                <div class="p-5 slide-content rounded-lg flex flex-col items-center justify-center gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light">
                                    <h6 class="text-seven font-bold text-sm md:text-base text-center">Gerakan Dinamis & Simetris</h6>
                                    <p class="text-black dark:text-light text-sm md:text-base text-center">Bentuk Desain Grafis yang mewakili bidang desain dan menyerupai sebuah kamera yang mewakili bidang videografi dan fotografi</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 !w-10 !h-10 aspect-square rounded-full bg-main-gradient !text-light/80 after:!text-sm swiper-button-next"></div>
                        <div class="p-3 !w-10 !h-10 aspect-square rounded-full bg-main-gradient !text-light/80 after:!text-sm swiper-button-prev"></div>
                    </div>
                </div>
            </section>
        </div>
        
        <div class="relative">
            <img src="{{ asset('assets/images/gradient-blur-2.png') }}" class="w-full absolute -translate-y-1/2 top-[50%] -z-1" />
            <section class="py-14 md:py-30 max-w-5xl mx-auto container px-3">
                <h5 data-aos-duration="500" data-aos="zoom-in" data-aos-delay="100" class="text-seven text-center text-sm md:text-base">About Our Maskot</h5>
                <h1 data-aos-duration="500" data-aos="fade-up" data-aos-delay="300" class="text-center text-2xl sm:textx-3xl md:text-4xl text-black dark:text-light mt-5 font-bold">LORY</h1>
                <h5 data-aos-duration="500" data-aos="fade-up" data-aos-delay="500" class="text-center text-sm md:text-base text-black dark:text-light mt-2">“Si Burung Hantu Cerdas dengan Penglihatan yang Tajam”</h5>
                <div data-aos-duration="500" data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ asset("assets/images/maskot/1.png") }}" class="block md:hidden max-w-full w-60 mt-8 md:my-10 mx-auto transition-all duration-300 hover:scale-105 hover:-translate-y-3 hover:drop-shadow-2xl drop-shadow-seven" alt="">
                </div>
                <div class="hidden md:flex items-center justify-center gap-5 my-10 relative">
                    <div class="w-130 h-130 aspect-square max-w-full bg-seven/20 blur-[1000rem] absolute top-[50%] right-[50%] -translate-y-1/2 translate-x-1/2 -z-1"></div>
                    <div class="flex items-center justify-center gap-4 flex-col w-[35%]">
                        <div data-aos-duration="500" data-aos="zoom-in-left" data-aos-delay="500" class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light w-full">
                            <h6 class="text-seven font-bold text-sm md:text-base">Busana Adat Bali</h6>
                            <p class="text-black dark:text-light text-sm md:text-base">Simbol Kearifan Lokal</p>
                        </div>
                        <div data-aos-duration="500" data-aos="zoom-in-left" data-aos-delay="750" class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light w-full">
                            <h6 class="text-seven font-bold text-sm md:text-base">Warna Mata yang Biru</h6>
                            <p class="text-black dark:text-light text-sm md:text-base">Teknologi, inovasi, dan masa depan</p>
                        </div>
                        <div data-aos-duration="500" data-aos="zoom-in-left" data-aos-delay="1000" class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light w-full">
                            <h6 class="text-seven font-bold text-sm md:text-base">Warna Emas pada Pakaian</h6>
                            <p class="text-black dark:text-light text-sm md:text-base">Kemewahan, kesuksesan, dan kejayaan. Warna emas juga sering dikaitkan dengan kebijaksanaan, nilai tinggi, serta ambisi dan pencapaian luar biasa</p>
                        </div>
                    </div>
                    <div data-aos-duration="500" data-aos="zoom-in" data-aos-delay="100" class="w-[30%] max-w-full">
                        <img src="{{ asset('assets/images/maskot/1.png') }}" alt="" class="w-full transition-all duration-300 hover:scale-110 hover:-translate-y-8 hover:drop-shadow-2xl drop-shadow-seven" />
                    </div>
                    <div class="flex items-center justify-center gap-4 flex-col w-[35%]">
                        <div data-aos-duration="500" data-aos="zoom-in-right" data-aos-delay="500" class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light w-full">
                            <h6 class="text-seven text-right font-bold text-sm md:text-base">Kamera</h6>
                            <p class="text-black dark:text-light text-sm md:text-base text-right">Siap mengabadikan setiap momen</p>
                        </div>
                        <div data-aos-duration="500" data-aos="zoom-in-right" data-aos-delay="750" class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light w-full">
                            <h6 class="text-seven text-right font-bold text-sm md:text-base">Warna Coklat pada Bulu</h6>
                            <p class="text-black dark:text-light text-sm md:text-base text-right">Memberikan kesan natural, rustic, dan organik</p>
                        </div>
                        <div data-aos-duration="500" data-aos="zoom-in-right" data-aos-delay="1000" class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light w-full">
                            <h6 class="text-seven text-right font-bold text-sm md:text-base">Warna Ungu pada Pakaian</h6>
                            <p class="text-black dark:text-light text-sm md:text-base text-right">Kemewahan dan Keagungan</p>
                        </div>
                    </div>
                </div>
                <div class="block md:hidden" data-aos-duration="500" data-aos="fade-up" data-aos-delay="500">
                    <div class="swiper" id="swiper-maskot">
                        <div class="swiper-wrapper items-center">
                            <div class="swiper-slide px-16">
                                <div class="p-5 slide-content rounded-lg flex flex-col gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light w-full">
                                    <h6 class="text-seven font-bold text-sm md:text-base text-center">Busana Adat Bali</h6>
                                    <p class="text-black dark:text-light text-sm md:text-base text-center">Simbol Kearifan Lokal</p>
                                </div>
                            </div>
                            <div class="swiper-slide px-16">
                                <div class="p-5 rounded-lg slide-content flex flex-col gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light w-full">
                                    <h6 class="text-seven font-bold text-sm md:text-base text-center">Warna Mata yang Biru</h6>
                                    <p class="text-black dark:text-light text-sm md:text-base text-center">Teknologi, inovasi, dan masa depan</p>
                                </div>
                            </div>
                            <div class="swiper-slide px-16">
                                <div class="p-5 rounded-lg slide-content flex flex-col gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light w-full">
                                    <h6 class="text-seven font-bold text-sm md:text-base text-center">Warna Emas pada Pakaian</h6>
                                    <p class="text-black dark:text-light text-sm md:text-base text-center">Kemewahan, kesuksesan, dan kejayaan. Warna emas juga sering dikaitkan dengan kebijaksanaan, nilai tinggi, serta ambisi dan pencapaian luar biasa</p>
                                </div>
                            </div>
                            <div class="swiper-slide px-16">
                                <div class="p-5 rounded-lg slide-content flex flex-col gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light w-full">
                                    <h6 class="text-seven text-center font-bold text-sm md:text-base">Kamera</h6>
                                    <p class="text-black dark:text-light text-sm md:text-base text-center">Siap mengabadikan setiap momen</p>
                                </div>
                            </div>
                            <div class="swiper-slide px-16">
                                <div class="p-5 rounded-lg slide-content flex flex-col gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light w-full">
                                    <h6 class="text-seven text-center font-bold text-sm md:text-base">Warna Coklat pada Bulu</h6>
                                    <p class="text-black dark:text-light text-sm md:text-base text-center">Memberikan kesan natural, rustic, dan organik</p>
                                </div>
                            </div>
                            <div class="swiper-slide px-16">
                                <div class="p-5 rounded-lg slide-content flex flex-col gap-3 bg-28-transparent transition-all duration-300 hover:dark:bg-one hover:bg-light w-full">
                                    <h6 class="text-seven text-center font-bold text-sm md:text-base">Warna Ungu pada Pakaian</h6>
                                    <p class="text-black dark:text-light text-sm md:text-base text-center">Kemewahan dan Keagungan</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 !w-10 !h-10 aspect-square rounded-full bg-main-gradient !text-light/80 after:!text-sm swiper-button-next"></div>
                        <div class="p-3 !w-10 !h-10 aspect-square rounded-full bg-main-gradient !text-light/80 after:!text-sm swiper-button-prev"></div>
                    </div>
                </div>
                <p data-aos-duration="500" data-aos="fade-up" data-aos-delay="500" class="text-black dark:text-light text-center text-sm md:text-base">
                    Lory merupakan representasi dari Burung Hantu, hewan yang dikenal dengan penglihatannya yang sangat tajam, kemampuan berpikir kritis, serta kepekaan terhadap lingkungan sekitar. Karakteristik ini merepresentasikan seseorang yang bergerak di bidang multimedia.
                </p>
            </section>
        </div>
    </section>

    @if ($hasShowcase)
        <section class="py-10 md:py-24 relative">
            <img src="{{ asset('assets/images/gradient-blur-2.png') }}" class="w-full absolute -translate-y-1/2 top-[50%] -z-1" />
            <div class="container px-3 mx-auto relative">
                <div class="w-130 h-130 aspect-square max-w-full bg-seven/30 blur-[1000rem] absolute top-0 right-[-50%] -translate-x-1/2 -z-1"></div>
                <h5  data-aos-duration="500" data-aos="zoom-in" data-aos-delay="100" class="text-seven text-center text-sm md:text-base">Masterpiece</h5>
                <h1 data-aos-duration="500" data-aos="fade-up" data-aos-delay="300" class="text-2xl sm:textx-3xl md:text-4xl text-black dark:text-light text-center font-bold">Showcase</h1>
                <p data-aos-duration="500" data-aos="fade-up" data-aos-delay="500" class="text-black text-sm md:text-base dark:text-light text-center mt-2">Explore hasil karya dari peserta Workshop Multimedia Udayana</p>
                <div class="my-10 max-w-2xl mx-auto">
                    <div data-aos-duration="500" data-aos="fade-up" class="relative w-full max-w-full md:max-w-2xl aspect-video mx-auto rounded-lg md:rounded-xl overflow-hidden">
                        <iframe id="ytplayer" type="text/html" 
                            src="{{ $showcases[0]->youtubeEmbedUrl }}" 
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;" 
                            frameborder="0"
                            allowfullscreen
                        >
                        </iframe>
                    </div>

                    <div class="grid grid-cols-3 gap-3 mt-5" id="showcase-thumbnails">
                        @foreach($showcases as $index => $showcase)
                            <button data-aos-duration="500" data-aos="zoom-in" data-aos-delay="{{ $index == 0 ? 100 : ($index == 1 ? 250 : 500) }}" type="button" 
                                class="relative group rounded-lg overflow-hidden md:rounded-xl cursor-pointer transition-all duration-200  {{ $index != 0 ? 'grayscale' : '' }}" 
                                data-url="{{ $showcase->youtubeEmbedUrl }}">
                                <img src="{{ Storage::url($showcase->cover) }}" 
                                    class="rounded-lg md:rounded-xl w-full aspect-video object-cover" 
                                    alt="{{ $showcase->title }}">
                                <div class="absolute top-0 left-0 h-full w-full flex items-center justify-center text-light transition-all duration-300 group-hover:bg-gradient-to-b group-hover:from-transparent group-hover:to-black group-hover:translate-y-0 translate-y-full">
                                    Click to Show
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>
                <a data-aos-duration="500" data-aos="fade-up" data-aos-delay="500" href="{{ route('showcase.index') }}" class="flex items-center justify-center mx-auto w-max hover:shadow-2xl hover:-translate-y-1 shadow-seven/30 transition-all duration-200">
                    <button class="text-sm md:text-base py-3 px-5 rounded-full bg-main-gradient cursor-pointer text-light">
                        View More
                    </button>
                </a>
            </div>
        </section>
    @endif

    <section class="py-10 md:py-24 relative">
        <div class="w-130 h-130 aspect-square max-w-full bg-seven/20 blur-[1000rem] absolute top-0 left-[-50%] translate-x-1/2 -z-1"></div>
        <div class="container px-3 mx-auto">
            <h5 data-aos-duration="500" data-aos="zoom-in" data-aos-delay="100" class="text-seven text-center text-sm md:text-base">Timeline</h5>
            <h1 data-aos-duration="500" data-aos="fade-up" data-aos-delay="300" class="text-2xl sm:textx-3xl md:text-4xl text-black dark:text-light text-center font-bold">Important Event Dates</h1>
            <div class="my-10 grid md:grid-cols-[1fr_max-content_1fr] relative max-w-5xl mx-auto">
                <div class="absolute py-5 h-full top-0 left-1/2 -translate-x-1/2 -z-1">
                    <div class="w-1 h-full bg-seven"></div>
                </div>
                @foreach($timelines as $index => $timeline)
                    @php
                        $start = \Carbon\Carbon::parse($timeline['start']);
                        $end = \Carbon\Carbon::parse($timeline['end']);
                        $today = \Carbon\Carbon::today();
                        $isTodayBetween = $today->between($start, $end);
                    @endphp
                    @if ($index % 2 == 0)
                        <div data-aos-duration="500" data-aos="fade-up" data-aos-delay="300" class="w-full p-5 ">
                            <div class="w-full rounded-xl border-[1px] border-[#FCFDFD]/50 {{ $isTodayBetween ? 'bg-second-gradient' : 'bg-[#9489AB] dark:bg-two' }} p-5">
                                <div class="flex gap-3 items-center {{ $isTodayBetween ? '' : 'opacity-50'}}">
                                    <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6838 0.785156C13.963 0.785156 14.2307 0.904735 14.4281 1.11759C14.6255 1.33044 14.7364 1.61913 14.7364 1.92015V3.05514H16.8416C17.3999 3.05514 17.9354 3.29429 18.3302 3.72C18.725 4.1457 18.9468 4.72308 18.9468 5.32511V18.945C18.9468 19.547 18.725 20.1244 18.3302 20.5501C17.9354 20.9758 17.3999 21.215 16.8416 21.215H2.1052C1.54687 21.215 1.0114 20.9758 0.616599 20.5501C0.221797 20.1244 0 19.547 0 18.945V5.32511C0 4.72308 0.221797 4.1457 0.616599 3.72C1.0114 3.29429 1.54687 3.05514 2.1052 3.05514H4.2104V1.92015C4.2104 1.61913 4.3213 1.33044 4.5187 1.11759C4.7161 0.904735 4.98383 0.785156 5.263 0.785156C5.54217 0.785156 5.8099 0.904735 6.0073 1.11759C6.2047 1.33044 6.3156 1.61913 6.3156 1.92015V3.05514H12.6312V1.92015C12.6312 1.61913 12.7421 1.33044 12.9395 1.11759C13.1369 0.904735 13.4046 0.785156 13.6838 0.785156ZM5.27353 15.54H5.263C4.99472 15.5403 4.73667 15.6511 4.54158 15.8497C4.3465 16.0483 4.2291 16.3197 4.21338 16.6085C4.19766 16.8973 4.28479 17.1816 4.45699 17.4035C4.62918 17.6253 4.87344 17.7679 5.13985 17.8021L5.27353 17.81C5.55269 17.81 5.82043 17.6904 6.01783 17.4776C6.21523 17.2647 6.32613 16.976 6.32613 16.675C6.32613 16.374 6.21523 16.0853 6.01783 15.8724C5.82043 15.6596 5.55269 15.54 5.27353 15.54ZM9.48393 15.54H9.4734C9.20512 15.5403 8.94707 15.6511 8.75198 15.8497C8.5569 16.0483 8.4395 16.3197 8.42378 16.6085C8.40806 16.8973 8.49519 17.1816 8.66739 17.4035C8.83958 17.6253 9.08384 17.7679 9.35025 17.8021L9.48393 17.81C9.7631 17.81 10.0308 17.6904 10.2282 17.4776C10.4256 17.2647 10.5365 16.976 10.5365 16.675C10.5365 16.374 10.4256 16.0853 10.2282 15.8724C10.0308 15.6596 9.7631 15.54 9.48393 15.54ZM13.6943 15.54H13.6838C13.4155 15.5403 13.1575 15.6511 12.9624 15.8497C12.7673 16.0483 12.6499 16.3197 12.6342 16.6085C12.6185 16.8973 12.7056 17.1816 12.8778 17.4035C13.05 17.6253 13.2942 17.7679 13.5606 17.8021L13.6943 17.81C13.9735 17.81 14.2412 17.6904 14.4386 17.4776C14.636 17.2647 14.7469 16.976 14.7469 16.675C14.7469 16.374 14.636 16.0853 14.4386 15.8724C14.2412 15.6596 13.9735 15.54 13.6943 15.54ZM5.27353 11.0001H5.263C4.99472 11.0004 4.73667 11.1112 4.54158 11.3097C4.3465 11.5083 4.2291 11.7797 4.21338 12.0685C4.19766 12.3573 4.28479 12.6417 4.45699 12.8635C4.62918 13.0854 4.87344 13.2279 5.13985 13.2621L5.27353 13.27C5.55269 13.27 5.82043 13.1505 6.01783 12.9376C6.21523 12.7248 6.32613 12.4361 6.32613 12.135C6.32613 11.834 6.21523 11.5453 6.01783 11.3325C5.82043 11.1196 5.55269 11.0001 5.27353 11.0001ZM9.48393 11.0001H9.4734C9.20512 11.0004 8.94707 11.1112 8.75198 11.3097C8.5569 11.5083 8.4395 11.7797 8.42378 12.0685C8.40806 12.3573 8.49519 12.6417 8.66739 12.8635C8.83958 13.0854 9.08384 13.2279 9.35025 13.2621L9.48393 13.27C9.7631 13.27 10.0308 13.1505 10.2282 12.9376C10.4256 12.7248 10.5365 12.4361 10.5365 12.135C10.5365 11.834 10.4256 11.5453 10.2282 11.3325C10.0308 11.1196 9.7631 11.0001 9.48393 11.0001ZM13.6943 11.0001H13.6838C13.4155 11.0004 13.1575 11.1112 12.9624 11.3097C12.7673 11.5083 12.6499 11.7797 12.6342 12.0685C12.6185 12.3573 12.7056 12.6417 12.8778 12.8635C13.05 13.0854 13.2942 13.2279 13.5606 13.2621L13.6943 13.27C13.9735 13.27 14.2412 13.1505 14.4386 12.9376C14.636 12.7248 14.7469 12.4361 14.7469 12.135C14.7469 11.834 14.636 11.5453 14.4386 11.3325C14.2412 11.1196 13.9735 11.0001 13.6943 11.0001ZM16.8416 5.32511H2.1052V7.59509H16.8416V5.32511Z" fill="#FCFDFD"/>
                                    </svg>
                                    <p class="text-xs sm:text-sm text-light">
                                        @if ($start->toDateString() === $end->toDateString())
                                            {{ $start->locale('id')->translatedFormat('l, d F Y') }}
                                        @else
                                            {{ $start->locale('id')->translatedFormat('l, d F') }} - {{ $end->locale('id')->translatedFormat('l, d F Y') }}
                                        @endif
                                    </p>
                                </div>
                                <h3 class="{{ $isTodayBetween ? '' : 'opacity-50'}} text-md md:text-lg font-bold uppercase text-light mt-1">{{ $timeline['title'] }}</h3>
                                <p class="{{ $isTodayBetween ? '' : 'opacity-50'}} text-light mt-2 text-sm md:text-base">{{ $timeline['description'] }}</p>
                            </div>
                        </div>
                        <div class="w-14 relative hidden md:flex justify-center items-center">
                            <div class="w-1 h-full bg-seven"></div>
                            <div class="{{ $isTodayBetween ? 'animate-ping' : '' }} absolute bg-light dark:bg-one border-3 border-seven w-10 h-10 rounded-full"></div>
                            <div class=" absolute bg-seven w-6 h-6 rounded-full"></div>
                        </div>
                        <div class="w-full"></div>
                    @else
                        <div class="w-full"></div>
                        <div class="w-14 relative hidden md:flex justify-center items-center">
                            <div class="w-1 h-full bg-seven"></div>
                            <div class="{{ $isTodayBetween ? 'animate-ping' : '' }} absolute bg-light dark:bg-one border-3 border-seven w-10 h-10 rounded-full"></div>
                            <div class=" absolute bg-seven w-6 h-6 rounded-full"></div>
                        </div>
                        <div data-aos-duration="500" data-aos="fade-up" data-aos-delay="300" class="w-full p-5 ">
                            <div class="w-full rounded-xl border-[1px] border-[#FCFDFD]/50 {{ $isTodayBetween ? 'bg-second-gradient' : 'bg-[#9489AB] dark:bg-two' }} p-5">
                                <div class="flex gap-3 items-center {{ $isTodayBetween ? '' : 'opacity-50' }}">
                                    <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6838 0.785156C13.963 0.785156 14.2307 0.904735 14.4281 1.11759C14.6255 1.33044 14.7364 1.61913 14.7364 1.92015V3.05514H16.8416C17.3999 3.05514 17.9354 3.29429 18.3302 3.72C18.725 4.1457 18.9468 4.72308 18.9468 5.32511V18.945C18.9468 19.547 18.725 20.1244 18.3302 20.5501C17.9354 20.9758 17.3999 21.215 16.8416 21.215H2.1052C1.54687 21.215 1.0114 20.9758 0.616599 20.5501C0.221797 20.1244 0 19.547 0 18.945V5.32511C0 4.72308 0.221797 4.1457 0.616599 3.72C1.0114 3.29429 1.54687 3.05514 2.1052 3.05514H4.2104V1.92015C4.2104 1.61913 4.3213 1.33044 4.5187 1.11759C4.7161 0.904735 4.98383 0.785156 5.263 0.785156C5.54217 0.785156 5.8099 0.904735 6.0073 1.11759C6.2047 1.33044 6.3156 1.61913 6.3156 1.92015V3.05514H12.6312V1.92015C12.6312 1.61913 12.7421 1.33044 12.9395 1.11759C13.1369 0.904735 13.4046 0.785156 13.6838 0.785156ZM5.27353 15.54H5.263C4.99472 15.5403 4.73667 15.6511 4.54158 15.8497C4.3465 16.0483 4.2291 16.3197 4.21338 16.6085C4.19766 16.8973 4.28479 17.1816 4.45699 17.4035C4.62918 17.6253 4.87344 17.7679 5.13985 17.8021L5.27353 17.81C5.55269 17.81 5.82043 17.6904 6.01783 17.4776C6.21523 17.2647 6.32613 16.976 6.32613 16.675C6.32613 16.374 6.21523 16.0853 6.01783 15.8724C5.82043 15.6596 5.55269 15.54 5.27353 15.54ZM9.48393 15.54H9.4734C9.20512 15.5403 8.94707 15.6511 8.75198 15.8497C8.5569 16.0483 8.4395 16.3197 8.42378 16.6085C8.40806 16.8973 8.49519 17.1816 8.66739 17.4035C8.83958 17.6253 9.08384 17.7679 9.35025 17.8021L9.48393 17.81C9.7631 17.81 10.0308 17.6904 10.2282 17.4776C10.4256 17.2647 10.5365 16.976 10.5365 16.675C10.5365 16.374 10.4256 16.0853 10.2282 15.8724C10.0308 15.6596 9.7631 15.54 9.48393 15.54ZM13.6943 15.54H13.6838C13.4155 15.5403 13.1575 15.6511 12.9624 15.8497C12.7673 16.0483 12.6499 16.3197 12.6342 16.6085C12.6185 16.8973 12.7056 17.1816 12.8778 17.4035C13.05 17.6253 13.2942 17.7679 13.5606 17.8021L13.6943 17.81C13.9735 17.81 14.2412 17.6904 14.4386 17.4776C14.636 17.2647 14.7469 16.976 14.7469 16.675C14.7469 16.374 14.636 16.0853 14.4386 15.8724C14.2412 15.6596 13.9735 15.54 13.6943 15.54ZM5.27353 11.0001H5.263C4.99472 11.0004 4.73667 11.1112 4.54158 11.3097C4.3465 11.5083 4.2291 11.7797 4.21338 12.0685C4.19766 12.3573 4.28479 12.6417 4.45699 12.8635C4.62918 13.0854 4.87344 13.2279 5.13985 13.2621L5.27353 13.27C5.55269 13.27 5.82043 13.1505 6.01783 12.9376C6.21523 12.7248 6.32613 12.4361 6.32613 12.135C6.32613 11.834 6.21523 11.5453 6.01783 11.3325C5.82043 11.1196 5.55269 11.0001 5.27353 11.0001ZM9.48393 11.0001H9.4734C9.20512 11.0004 8.94707 11.1112 8.75198 11.3097C8.5569 11.5083 8.4395 11.7797 8.42378 12.0685C8.40806 12.3573 8.49519 12.6417 8.66739 12.8635C8.83958 13.0854 9.08384 13.2279 9.35025 13.2621L9.48393 13.27C9.7631 13.27 10.0308 13.1505 10.2282 12.9376C10.4256 12.7248 10.5365 12.4361 10.5365 12.135C10.5365 11.834 10.4256 11.5453 10.2282 11.3325C10.0308 11.1196 9.7631 11.0001 9.48393 11.0001ZM13.6943 11.0001H13.6838C13.4155 11.0004 13.1575 11.1112 12.9624 11.3097C12.7673 11.5083 12.6499 11.7797 12.6342 12.0685C12.6185 12.3573 12.7056 12.6417 12.8778 12.8635C13.05 13.0854 13.2942 13.2279 13.5606 13.2621L13.6943 13.27C13.9735 13.27 14.2412 13.1505 14.4386 12.9376C14.636 12.7248 14.7469 12.4361 14.7469 12.135C14.7469 11.834 14.636 11.5453 14.4386 11.3325C14.2412 11.1196 13.9735 11.0001 13.6943 11.0001ZM16.8416 5.32511H2.1052V7.59509H16.8416V5.32511Z" fill="#FCFDFD"/>
                                    </svg>
                                    <p class="text-xs sm:text-sm text-light">
                                        @if ($start->toDateString() === $end->toDateString())
                                            {{ $start->locale('id')->translatedFormat('l, d F Y') }}
                                        @else
                                            {{ $start->locale('id')->translatedFormat('l, d F') }} - {{ $end->locale('id')->translatedFormat('l, d F Y') }}
                                        @endif
                                    </p>
                                </div>
                                <h3 class="{{ $isTodayBetween ? '' : 'opacity-50' }} text-md md:text-lg font-bold uppercase text-light mt-1">{{ $timeline['title'] }}</h3>
                                <p class="{{ $isTodayBetween ? '' : 'opacity-50' }} text-light mt-2 text-sm md:text-base">{{ $timeline['description'] }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-10 md:py-24 relative">
        <img src="{{ asset('assets/images/gradient-blur-3.png') }}" class="w-full absolute -top-[50%] -z-1" />
        <div class="w-130 h-130 aspect-square max-w-full bg-seven/10 blur-[1000rem] absolute top-0 right-[-50%] -translate-x-1/2 -z-1"></div>
        <div class="container px-3 mx-auto">
            <h5 data-aos-duration="500" data-aos="zoom-in" data-aos-delay="100" class="text-seven text-center text-sm md:text-base">Sponsor</h5>
            <h1 data-aos-duration="500" data-aos="fade-up" data-aos-delay="300" class="text-2xl sm:textx-3xl md:text-4xl text-black dark:text-light text-center font-bold">Sponsored By</h1>
        </div>
        <div class="my-10">
            <div class="swiper" id="swiper-sponsor" data-aos-duration="1500" data-aos="fade-up" data-aos-delay="500">
                <div class="swiper-wrapper">
                    @foreach ($mainSponsors as $sponsor)
                        <div class="swiper-slide">
                            <img src="{{ $sponsor['logo'] }}" class="rounded-lg w-full h-50 object-contain" alt="{{ $sponsor['name'] }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="swiper swiper-6" data-aos-duration="1000" data-aos="fade-up" data-aos-delay="500">
            <div class="swiper-wrapper">
                @foreach ($supportSponsors as $sponsor)
                    <div class="swiper-slide">
                        <img src="{{ $sponsor['logo'] }}" class="rounded-lg w-full h-30 object-contain" alt="{{ $sponsor['name'] }}">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-10 md:py-24 relative">
        <img src="{{ asset('assets/images/gradient-blur-2.png') }}" class="w-full absolute -translate-y-1/2 top-[50%] -z-1" />
        <div class="w-130 h-130 aspect-square max-w-full bg-seven/30 blur-[1000rem] absolute top-0 left-[-50%] translate-x-1/2 -z-1"></div>
        <div class="container px-3 mx-auto">
            <h5 data-aos-duration="500" data-aos="zoom-in" data-aos-delay="100" class="text-seven text-center text-sm md:text-base scroll-mt-24" id="faq">FAQ</h5>
            <h1 data-aos-duration="500" data-aos="fade-up" data-aos-delay="300" class="text-2xl sm:textx-3xl md:text-4xl text-black dark:text-light text-center font-bold">Frequently Asked Questions</h1>
            <div class="mt-5 md:mt-10 grid md:grid-cols-[max-content_1fr] max-w-5xl mx-auto gap-10">
                <img data-aos-duration="500" data-aos="fade-right" src="{{ asset('assets/images/maskot/2.png') }}" class="w-60 md:block hidden max-w-full mt-auto" alt="">
                <div class="mx-auto mt-10 space-y-4 w-full">
                    @foreach ($faqs as $faq)
                        <div data-aos-duration="500" data-aos="fade-up" data-aos-delay="300" class="faq-item border border-gray-300 dark:border-light rounded-lg overflow-hidden bg-28-transparent hover:bg-light dark:hover:bg-two transition-all duration-200">
                            <button class="faq-btn cursor-pointer w-full text-left flex justify-between items-center p-4">
                                <span class="text-black dark:text-light font-medium text-sm md:text-base">{{ $faq['question'] }}</span>
                                <svg class="w-5 h-5 fill-black dark:fill-light transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                    <path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/>
                                </svg>
                            </button>
                            <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out text-black dark:text-light">
                                <div class="px-4">
                                    <div class="w-full h-[1px] bg-seven"></div>
                                </div>
                                <div class="p-4 text-sm md:text-base">
                                    {{ $faq['answer'] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 md:py-24 relative">
        <img src="{{ asset('assets/images/gradient-blur-2.png') }}" class="w-full absolute -translate-y-1/2 top-[50%] -z-1" />
        <div class="container px-3 mx-auto">
            <h5 data-aos-duration="500" data-aos="zoom-in" data-aos-delay="100" class="text-seven text-center text-sm md:text-base scroll-mt-24" id="cp">CP</h5>
            <h1 data-aos-duration="500" data-aos="fade-up" data-aos-delay="300" class="text-2xl sm:textx-3xl md:text-4xl text-black dark:text-light text-center font-bold">Contact Person</h1>
            <p data-aos-duration="500" data-aos="fade-up" data-aos-delay="500" class="text-center text-sm md:text-base mt-2 text-black dark:text-light">Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi narahubung di bawah ini</p>
            <div class="max-w-2xl grid grid-cols-1 sm:grid-cols-2 gap-5 md:gap-10 mx-auto mt-10">
                @foreach ($contactPersons as $index => $cp)
                    <div data-aos-duration="500" data-aos="fade-up" data-aos-delay="{{ $index == 0 ? 500 : 750 }}" class="rounded-lg border-[1px] border-[#A295AC] p-5 bg-28-transparent flex flex-col gap-5 w-full">
                        <div class="flex items-center gap-3">
                            <div class="flex items-center justify-center p-3 rounded-full bg-seven">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-light size-5 md:size-6" fill="currentColor">
                                    <path d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 0 0-1.032-.211 50.89 50.89 0 0 0-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 0 0 2.433 3.984L7.28 21.53A.75.75 0 0 1 6 21v-4.03a48.527 48.527 0 0 1-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979Z" />
                                    <path d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 0 0 1.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0 0 15.75 7.5Z" />
                                </svg>
                            </div>
                            <h5 class="text-seven font-semibold text-base md:text-lg">{{ $cp['name'] }}</h5>
                        </div>
                        <div class="flex flex-col gap-2">
                            <a href="{{ $cp['wa_link'] }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-seven size-5 md:size-8" viewBox="0 0 448 512">
                                    <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                                </svg>
                                <p class="text-sm md:text-base text-black dark:text-light">{{ $cp['wa'] }}</p>
                            </a>
                            @php
                                $line = "https://line.me/R/ti/p/@".$cp['line']
                            @endphp
                            <a href={{ $line }} target="_blank" rel="noopener noreferrer" class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-seven size-5 md:size-8" viewBox="0 0 512 512">
                                    <path d="M311 196.8v81.3c0 2.1-1.6 3.7-3.7 3.7h-13c-1.3 0-2.4-.7-3-1.5l-37.3-50.3v48.2c0 2.1-1.6 3.7-3.7 3.7h-13c-2.1 0-3.7-1.6-3.7-3.7V196.9c0-2.1 1.6-3.7 3.7-3.7h12.9c1.1 0 2.4 .6 3 1.6l37.3 50.3V196.9c0-2.1 1.6-3.7 3.7-3.7h13c2.1-.1 3.8 1.6 3.8 3.5zm-93.7-3.7h-13c-2.1 0-3.7 1.6-3.7 3.7v81.3c0 2.1 1.6 3.7 3.7 3.7h13c2.1 0 3.7-1.6 3.7-3.7V196.8c0-1.9-1.6-3.7-3.7-3.7zm-31.4 68.1H150.3V196.8c0-2.1-1.6-3.7-3.7-3.7h-13c-2.1 0-3.7 1.6-3.7 3.7v81.3c0 1 .3 1.8 1 2.5c.7 .6 1.5 1 2.5 1h52.2c2.1 0 3.7-1.6 3.7-3.7v-13c0-1.9-1.6-3.7-3.5-3.7zm193.7-68.1H327.3c-1.9 0-3.7 1.6-3.7 3.7v81.3c0 1.9 1.6 3.7 3.7 3.7h52.2c2.1 0 3.7-1.6 3.7-3.7V265c0-2.1-1.6-3.7-3.7-3.7H344V247.7h35.5c2.1 0 3.7-1.6 3.7-3.7V230.9c0-2.1-1.6-3.7-3.7-3.7H344V213.5h35.5c2.1 0 3.7-1.6 3.7-3.7v-13c-.1-1.9-1.7-3.7-3.7-3.7zM512 93.4V419.4c-.1 51.2-42.1 92.7-93.4 92.6H92.6C41.4 511.9-.1 469.8 0 418.6V92.6C.1 41.4 42.2-.1 93.4 0H419.4c51.2 .1 92.7 42.1 92.6 93.4zM441.6 233.5c0-83.4-83.7-151.3-186.4-151.3s-186.4 67.9-186.4 151.3c0 74.7 66.3 137.4 155.9 149.3c21.8 4.7 19.3 12.7 14.4 42.1c-.8 4.7-3.8 18.4 16.1 10.1s107.3-63.2 146.5-108.2c27-29.7 39.9-59.8 39.9-93.1z"/>
                                </svg>
                                <p class="text-sm md:text-base text-black dark:text-light">{{ $cp['line'] }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const parentLogo = document.getElementById('parent-logo-element');
            const logoElement = document.getElementById('logo-element');
            
            let alreadyAnimated = false;
            const observer = new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    if (mutation.attributeName === "class" && !alreadyAnimated) {
                        if (parentLogo.classList.contains("aos-animate")) {
                            alreadyAnimated = true;
                            logoElement.classList.add("animate-rotate-scale");

                            logoElement.addEventListener("animationend", function() {
                                logoElement.classList.remove("animate-rotate-scale");
                            }, { once: true });
                        }
                    }
                });
            });

            observer.observe(parentLogo, { attributes: true });

            let isAnimating = false;
            logoElement.addEventListener('mouseenter', function() {
                if (!isAnimating) {
                    startRotation(logoElement);
                }
            });

            function startRotation(element) {
                isAnimating = true;
                element.classList.add('animate-rotate-scale');
                
                setTimeout(() => {
                    element.classList.remove('animate-rotate-scale');
                    isAnimating = false;
                }, 6000);
            }

            logoElement.addEventListener('animationend', function() {
                logoElement.classList.remove('animate-rotate-scale');
                isAnimating = false;
            });
        });

        document.querySelectorAll('.faq-btn').forEach((btn) => {
            btn.addEventListener('click', () => {
                const item = btn.parentElement;
                const content = item.querySelector('.faq-content');
                const icon = btn.querySelector('svg');

                document.querySelectorAll('.faq-content').forEach((el) => {
                    if (el !== content) {
                        el.style.maxHeight = null;
                        el.previousElementSibling.querySelector('svg').classList.remove('rotate-180');
                    }
                });

                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    icon.classList.remove('rotate-180');
                } else {
                    content.style.maxHeight = content.scrollHeight + 'px';
                    icon.classList.add('rotate-180');
                }
            });
        });

        const thumbnails = document.querySelectorAll('#showcase-thumbnails button');
        const player = document.getElementById('ytplayer');

        thumbnails.forEach(btn => {
            btn.addEventListener('click', () => {
                player.src = btn.dataset.url;

                thumbnails.forEach(b => b.classList.add('grayscale'));
                btn.classList.remove('grayscale');
            });
        });
    </script>
    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

        const swiper = new Swiper('.swiper-3', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 10,
            speed:6000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                }
            },
        })

        const swiperSponsor = new Swiper('#swiper-sponsor', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 10,
            speed:6000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 60,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 60,
                }
            },
        })

        const swiper2 = new Swiper('.swiper-6', {
            loop: true,
            slidesPerView: 3,
            spaceBetween: 10,
            speed:6000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
                768: {
                    slidesPerView: 6,
                    spaceBetween: 40,
                }
            },
        })

        const swiperLogo = new Swiper('#swiper-logo', {
            direction: 'horizontal',
            loop: true,
            centeredSlides: true,
            slidesPerView: 1,
            spaceBetween: 30,
            
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            
            effect: 'coverflow',
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            
            breakpoints: {
                768: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                }
            },
            
            keyboard: {
                enabled: true,
                onlyInViewport: true,
            },
            
            speed: 600,
            
            on: {
                slideChange: function () {
                },
                
                slideChangeTransitionStart: function () {
                    const activeSlide = this.slides[this.activeIndex];
                    const content = activeSlide.querySelector('.slide-content');
                    if (content) {
                        content.style.transform = 'scale(0.95)';
                        content.style.opacity = '0.7';
                    }
                },
                
                slideChangeTransitionEnd: function () {
                    const activeSlide = this.slides[this.activeIndex];
                    const content = activeSlide.querySelector('.slide-content');
                    if (content) {
                        content.style.transform = 'scale(1)';
                        content.style.opacity = '1';
                        content.style.transition = 'all 0.3s ease';
                    }
                }
            }
        });
        
        const swiperLogoContainer = document.getElementById('swiper-logo')
        swiperLogoContainer.addEventListener('mouseenter', () => {
            swiperLogo.autoplay.stop();
        });
        
        swiperLogoContainer.addEventListener('mouseleave', () => {
            swiperLogo.autoplay.start();
        });

        const swiperMaskot = new Swiper('#swiper-maskot', {
            direction: 'horizontal',
            loop: true,
            centeredSlides: true,
            slidesPerView: 1,
            spaceBetween: 30,
            
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            
            effect: 'coverflow',
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            
            breakpoints: {
                768: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                }
            },
            
            keyboard: {
                enabled: true,
                onlyInViewport: true,
            },
            
            speed: 600,
            
            on: {
                slideChange: function () {
                },
                
                slideChangeTransitionStart: function () {
                    const activeSlide = this.slides[this.activeIndex];
                    const content = activeSlide.querySelector('.slide-content');
                    if (content) {
                        content.style.transform = 'scale(0.95)';
                        content.style.opacity = '0.7';
                    }
                },
                
                slideChangeTransitionEnd: function () {
                    const activeSlide = this.slides[this.activeIndex];
                    const content = activeSlide.querySelector('.slide-content');
                    if (content) {
                        content.style.transform = 'scale(1)';
                        content.style.opacity = '1';
                        content.style.transition = 'all 0.3s ease';
                    }
                }
            }
        });
        
        const swiperMaskotContainer = document.getElementById('swiper-maskot')
        swiperMaskotContainer.addEventListener('mouseenter', () => {
            swiperMaskot.autoplay.stop();
        });
        
        swiperMaskotContainer.addEventListener('mouseleave', () => {
            swiperMaskot.autoplay.start();
        });
    </script>
@endsection