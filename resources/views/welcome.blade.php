@extends('layouts.main')

@section('content')
    <section>
        <div class="pb-24 pt-48 min-h-screen flex flex-col items-center justify-center gap-5">
            <div class="container mx-auto flex flex-col items-center justify-center gap-10">
                <div class="flex flex-col items-center justify-center gap-3 max-w-3xl">
                    <h1 class="text-4xl font-bold text-black dark:text-light text-center"><span class="bg-main-gradient bg-clip-text text-transparent">WORKSHOP</span>  MULTIMEDIA<br>UDAYANA <span class="bg-main-gradient bg-clip-text text-transparent">#3</span></h1>
                    <p class="text-center text-black dark:text-light">Setiap momen yang kita rekam hari ini adalah investasi untuk dikenang di masa depan. Dengan mendokumentasikannya, kita tidak hanya menyimpan gambar atau video, tetapi juga cerita dan perasaan yang akan tetap hidup di dalamnya</p>
                </div>
                <button class="py-3 px-5 rounded-full bg-main-gradient cursor-pointer text-light">
                    Register Now
                </button>
            </div>
            <div class="mt-10 w-full relative">
                <div class="swiper swiper-3">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <video 
                                autoplay 
                                muted 
                                loop  
                                src="{{ asset('assets/videos/1.mp4') }}" 
                                class="rounded-xl w-full aspect-video object-cover bg-28-transparent">
                            </video>
                        </div>
                        <div class="swiper-slide">
                            <video 
                                autoplay 
                                muted 
                                loop  
                                src="{{ asset('assets/videos/2.mp4') }}" 
                                class="rounded-xl w-full aspect-video object-cover">
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
                    </div>
                </div>
                <img src="{{ asset('assets/images/gradient-blur-2.png') }}" class="w-full absolute -translate-y-1/2 top-[50%] -z-1" />
            </div>
        </div>
    </section>

    <section class="py-24">
        <div class="container mx-auto">
            <h5 class="text-seven text-center scroll-mt-24" id="about">Get to Know Us</h5>
            <h1 class="text-3xl text-black dark:text-light text-center font-bold">About</h1>
        </div>

        <section class="py-30 grid grid-cols-[max-content_1fr] gap-10 relative max-w-6xl mx-auto container">
            <div class="w-130 h-130 bg-seven/30 blur-[1000rem] absolute top-0 left-[-50%] translate-x-1/2 -z-1"></div>
            <img src="{{ asset('assets/images/maskot/3.png') }}" class="w-88 max-w-full" alt="">
            <div class="">
                <h5 class="text-seven">About Us</h5>
                <h2 class="text-2xl text-black dark:text-light font-semibold mt-1">What is Workshop Multimedia Udayana?</h2>
                <p class="text-black dark:text-light mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate est hic saepe quibusdam! Illum iusto ullam accusamus veniam, excepturi nulla tenetur neque veritatis! Maiores, dignissimos cum? Voluptates qui eligendi modi enim ullam. Deserunt iste nobis commodi saepe harum eius fuga debitis recusandae est autem laborum, eaque, qui dolorem, totam laudantium.   </p>
            </div>
        </section>

        <div class="relative">
            <img src="{{ asset('assets/images/gradient-blur-3.png') }}" class="w-full absolute top-0 -z-1" />
            <section class="py-30 max-w-lg mx-auto container">
                <div class="w-130 h-130 bg-seven/20 blur-[1000rem] absolute top-[50%] right-[-10%] translate-x-1/2 -z-1"></div>
                <h5 class="text-seven text-center">About Out Theme</h5>
                <h1 class="text-center text-4xl text-black dark:text-light mt-5 font-bold">“Record Every <span class="text-seven">Moments</span> <br> To Relive In <span class="text-seven">The Future</span> ”</h1>
                <p class="text-black dark:text-light mt-8 text-center">“Setiap momen yang kita abadikan dalam sebuah rekaman, akan terasa kembali hidup euforianya saat kita menontonnya kembali”</p>
            </section>
        </div>

        <div class="relative">
            <img src="{{ asset('assets/images/gradient-blur-3.png') }}" class="w-full absolute bottom-0 -z-1" />
            <section class="py-30 max-w-5xl container mx-auto">
                <h5 class="text-seven text-center">About Out Logo</h5>
                <h1 class="text-center text-4xl text-black dark:text-light mt-5 font-bold">Record Today, Cherish Tomorrow</h1>
                <img src="{{ asset('assets/images/logo.png') }}" class="max-w-100 mx-auto my-12" alt="">
                <div class="grid grid-cols-2 gap-5">
                    <div class="col-span-2 p-5 rounded-lg flex flex-col items-center justify-center gap-3 bg-28-transparent">
                        <h6 class="text-seven font-bold text-center">Warna Biru Toska & Ungu</h6>
                        <p class="text-center text-black dark:text-light">Biru Toska mengartikan teknologi, inovasi, dan kejernihan berpikir. Ungu merepresentasikan kreatifitas, imajinasi, dan ekspresi artistik</p>
                    </div>
                    <div class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent">
                        <h6 class="text-seven font-bold">Bentuk Segi Enam</h6>
                        <p class="text-black dark:text-light">Bermakna stabilitas, harmoni, dan keseimbangan. Disamping itu bentuk tersebut juga menjadi ceriminan dari enam disiplin dalam bidang Multimedia, yaitu: desain grafis, fotografi, videografi, animasi, audio, dan teknologi digital</p>
                    </div>
                    <div class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent">
                        <h6 class="text-seven font-bold text-right">Bentuk Segitiga</h6>
                        <p class="text-black dark:text-light text-right">Bermakna "Tri", simbol Trikona, yang dalam Sansekerta mewakili Kreativitas (cipta), Ekspresi (rasa), Teknologi (karsa). Bentuk ini juga layaknya tombol “Play” yang mengartikan memulai langkah baru</p>
                    </div>
                    <div class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent">
                        <h6 class="text-seven font-bold">Gerakan Dinamis & Simetris</h6>
                        <p class="text-black dark:text-light">Gerakan spiral yang melingkar mengarah ke tengah, menunjukkan sinkronisasi antar aspek multimedia seperti desain grafis, fotografi, videografi, animasi, audio, dan teknologi digital</p>
                    </div>
                    <div class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent">
                        <h6 class="text-seven font-bold text-right">Gerakan Dinamis & Simetris</h6>
                        <p class="text-black dark:text-light text-right">Bentuk Desain Grafis yang mewakili bidang desain dan menyerupai sebuah kamera yang mewakili bidang videografi dan fotografi</p>
                    </div>
                </div>
            </section>
        </div>
        
        <div class="relative">
            <img src="{{ asset('assets/images/gradient-blur-2.png') }}" class="w-full absolute -translate-y-1/2 top-[50%] -z-1" />
            <section class="py-30 max-w-5xl mx-auto container">
                <h5 class="text-seven text-center">About Out Maskot</h5>
                <h1 class="text-center text-4xl text-black dark:text-light mt-5 font-bold">LORY</h1>
                <h5 class="text-center text-black dark:text-light mt-2">“Si Burung Hantu Cerdas dengan Penglihatan yang Tajam”</h5>
                <div class="flex items-center justify-center gap-5 my-10 relative">
                    <div class="w-130 h-130 bg-seven/20 blur-[1000rem] absolute top-[50%] right-[50%] -translate-y-1/2 translate-x-1/2 -z-1"></div>
                    <div class="flex items-center justify-center gap-4 flex-col w-[35%]">
                        <div class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent w-full">
                            <h6 class="text-seven font-bold">Busana Adat Bali</h6>
                            <p class="text-black dark:text-light">Simbol Kearifan Lokal</p>
                        </div>
                        <div class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent w-full">
                            <h6 class="text-seven font-bold">Warna Mata yang Biru</h6>
                            <p class="text-black dark:text-light">Teknologi, inovasi, dan masa depan</p>
                        </div>
                        <div class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent w-full">
                            <h6 class="text-seven font-bold">Warna Emas pada Pakaian</h6>
                            <p class="text-black dark:text-light">Kemewahan, kesuksesan, dan kejayaan. Warna emas juga sering dikaitkan dengan kebijaksanaan, nilai tinggi, serta ambisi dan pencapaian luar biasa</p>
                        </div>
                    </div>
                    <img src="{{ asset("assets/images/maskot/1.png") }}" class="w-[30%]" alt="">
                    <div class="flex items-center justify-center gap-4 flex-col w-[35%]">
                        <div class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent w-full">
                            <h6 class="text-seven text-right font-bold">Kamera</h6>
                            <p class="text-black dark:text-light text-right">Siap mengabadikan setiap momen</p>
                        </div>
                        <div class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent w-full">
                            <h6 class="text-seven text-right font-bold">Warna Coklat pada Bulu</h6>
                            <p class="text-black dark:text-light text-right">Memberikan kesan natural, rustic, dan organik</p>
                        </div>
                        <div class="p-5 rounded-lg flex flex-col gap-3 bg-28-transparent w-full">
                            <h6 class="text-seven text-right font-bold">Warna Ungu pada Pakaian</h6>
                            <p class="text-black dark:text-light text-right">Kemewahan dan Keagungan</p>
                        </div>
                    </div>
                </div>
                <p class="text-black dark:text-light text-center">
                    Lory merupakan representasi dari Burung Hantu, hewan yang dikenal dengan penglihatannya yang sangat tajam, kemampuan berpikir kritis, serta kepekaan terhadap lingkungan sekitar. Karakteristik ini merepresentasikan seseorang yang bergerak di bidang multimedia.
                </p>
            </section>
        </div>
    </section>

    <section class="py-24 relative">
        <img src="{{ asset('assets/images/gradient-blur-2.png') }}" class="w-full absolute -translate-y-1/2 top-[50%] -z-1" />
        <div class="container mx-auto relative">
            <div class="w-130 h-130 bg-seven/30 blur-[1000rem] absolute top-0 right-[-50%] -translate-x-1/2 -z-1"></div>
            <h5 class="text-seven text-center">Masterpiece</h5>
            <h1 class="text-4xl text-black dark:text-light text-center font-bold">Showcase</h1>
            <p class="text-black dark:text-light text-center mt-2">Explore hasil karya dari peserta Workshop Multimedia Udayana</p>
            <div class="my-10 max-w-2xl mx-auto">
                <div class="relative w-full max-w-2xl aspect-video mx-auto rounded-xl overflow-hidden">
                    <iframe id="ytplayer" type="text/html" src="https://www.youtube.com/embed/M7lc1UVf-VE" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;" frameborder="0"></iframe>
                </div>
                <div class="grid grid-cols-3 gap-3 mt-5">
                    <button type="button" class="rounded-xl">
                        <img src="{{ asset('assets/images/img.png') }}" class="rounded-xl w-full aspect-video object-cover" alt="">
                    </button>
                    <button type="button" class="rounded-xl">
                        <img src="{{ asset('assets/images/img.png') }}" class="rounded-xl grayscale-100 w-full aspect-video object-cover" alt="">
                    </button>
                    <button type="button" class="rounded-xl">
                        <img src="{{ asset('assets/images/img.png') }}" class="rounded-xl grayscale-100 w-full aspect-video object-cover" alt="">
                    </button>
                </div>
            </div>
            <a href="{{ route('showcase.index') }}" class="flex items-center justify-center mx-auto w-max">
                <button class="py-3 px-5 rounded-full bg-main-gradient cursor-pointer text-light">
                    View More
                </button>
            </a>
        </div>
    </section>

    <section class="py-24 relative">
        <div class="w-130 h-130 bg-seven/20 blur-[1000rem] absolute top-0 left-[-50%] translate-x-1/2 -z-1"></div>
        <div class="container mx-auto">
            <h5 class="text-seven text-center">Timeline</h5>
            <h1 class="text-4xl text-black dark:text-light text-center font-bold">Important Event Dates</h1>
            <div class="my-10 grid grid-cols-[1fr_max-content_1fr] max-w-5xl mx-auto">
                <div class="w-full p-5 opacity-50">
                    <div class="w-full rounded-xl border-[1px] border-[#FCFDFD] bg-two p-5">
                        <div class="flex gap-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 fill-light">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>
                            <p class="text-sm text-light">Kamis, 12 Desember - Selasa, 15 Desember 2025</p>
                        </div>
                        <h3 class="text-lg font-bold uppercase text-light mt-1">Open Registration</h3>
                        <p class="text-light mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="w-14 relative flex justify-center items-center">
                    <div class="w-1 h-full bg-seven"></div>
                    <div class="opacity-50 absolute bg-transparent border-3 border-seven w-10 h-10 rounded-full"></div>
                    <div class="opacity-50 absolute bg-seven w-6 h-6 rounded-full"></div>
                </div>
                <div class="w-full"></div>
                
                <div class="w-full"></div>
                <div class="w-14 relative flex justify-center items-center">
                    <div class="w-1 h-full bg-seven"></div>
                    <div class="opacity-50 absolute bg-transparent border-3 border-seven w-10 h-10 rounded-full"></div>
                    <div class="opacity-50 absolute bg-seven w-6 h-6 rounded-full"></div>
                </div>
                <div class="w-full p-5 opacity-50">
                    <div class="w-full rounded-xl border-[1px] border-[#FCFDFD] bg-two p-5">
                        <div class="flex gap-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 fill-light">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>
                            <p class="text-sm text-light">Kamis, 12 Desember - Selasa, 15 Desember 2025</p>
                        </div>
                        <h3 class="text-lg font-bold uppercase text-light mt-1">Open Registration</h3>
                        <p class="text-light mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>

                <div class="w-full p-5">
                    <div class="w-full rounded-xl border-[1px] border-[#FCFDFD] bg-second-gradient p-5">
                        <div class="flex gap-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 fill-light">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>
                            <p class="text-sm text-light">Kamis, 12 Desember - Selasa, 15 Desember 2025</p>
                        </div>
                        <h3 class="text-lg font-bold uppercase text-light mt-1">Open Registration</h3>
                        <p class="text-light mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="w-14 relative flex justify-center items-center">
                    <div class="w-1 h-full bg-seven"></div>
                    <div class=" absolute bg-transparent border-3 border-seven w-10 h-10 rounded-full"></div>
                    <div class=" absolute bg-seven w-6 h-6 rounded-full"></div>
                </div>
                <div class="w-full"></div>

                <div class="w-full"></div>
                <div class="w-14 relative flex justify-center items-center">
                    <div class="w-1 h-full bg-seven"></div>
                    <div class="opacity-50 absolute bg-transparent border-3 border-seven w-10 h-10 rounded-full"></div>
                    <div class="opacity-50 absolute bg-seven w-6 h-6 rounded-full"></div>
                </div>
                <div class="w-full p-5 opacity-50">
                    <div class="w-full rounded-xl border-[1px] border-[#FCFDFD] bg-two p-5">
                        <div class="flex gap-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 fill-light">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>
                            <p class="text-sm text-light">Kamis, 12 Desember - Selasa, 15 Desember 2025</p>
                        </div>
                        <h3 class="text-lg font-bold uppercase text-light mt-1">Open Registration</h3>
                        <p class="text-light mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-24 relative">
        <img src="{{ asset('assets/images/gradient-blur-3.png') }}" class="w-full absolute -top-[50%] -z-1" />
        <div class="w-130 h-130 bg-seven/10 blur-[1000rem] absolute top-0 right-[-50%] -translate-x-1/2 -z-1"></div>
        <div class="container mx-auto">
            <h5 class="text-seven text-center">Sponsor</h5>
            <h1 class="text-4xl text-black dark:text-light text-center font-bold">Sponsored By</h1>
        </div>
        <div class="my-10">
            <div class="swiper swiper-3">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/images/sponsors/bca.webp') }}" class="rounded-lg w-full h-50 object-contain" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/images/sponsors/bni.webp') }}" class="rounded-lg w-full h-50 object-contain" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/images/sponsors/bca.webp') }}" class="rounded-lg w-full h-50 object-contain" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/images/sponsors/bni.webp') }}" class="rounded-lg w-full h-50 object-contain" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper swiper-6">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/sponsors/bca.webp') }}" class="rounded-lg w-full h-30 object-contain" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/sponsors/bni.webp') }}" class="rounded-lg w-full h-30 object-contain" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/sponsors/bca.webp') }}" class="rounded-lg w-full h-30 object-contain" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/sponsors/bni.webp') }}" class="rounded-lg w-full h-30 object-contain" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/sponsors/bca.webp') }}" class="rounded-lg w-full h-30 object-contain" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/sponsors/bni.webp') }}" class="rounded-lg w-full h-30 object-contain" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/sponsors/bca.webp') }}" class="rounded-lg w-full h-30 object-contain" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/sponsors/bni.webp') }}" class="rounded-lg w-full h-30 object-contain" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 relative">
        <img src="{{ asset('assets/images/gradient-blur-2.png') }}" class="w-full absolute -translate-y-1/2 top-[50%] -z-1" />
        <div class="w-130 h-130 bg-seven/30 blur-[1000rem] absolute top-0 left-[-50%] translate-x-1/2 -z-1"></div>
        <div class="container mx-auto">
            <h5 class="text-seven text-center scroll-mt-24" id="faq">FAQ</h5>
            <h1 class="text-4xl text-black dark:text-light text-center font-bold">Frequently Asked Questions</h1>
            <div class="mt-10 grid grid-cols-[max-content_1fr] max-w-5xl mx-auto gap-10">
                <img src="{{ asset('assets/images/maskot/2.png') }}" class="w-60 max-w-full mt-auto" alt="">
                <div class="mx-auto mt-10 space-y-4 w-full">
                    <div class="faq-item border border-gray-300 dark:border-light rounded-lg overflow-hidden bg-28-transparent hover:bg-light dark:hover:bg-two transition-all duration-200">
                        <button class="faq-btn cursor-pointer w-full text-left flex justify-between items-center p-4">
                            <span class="text-black dark:text-light font-medium">Apa itu Workshop Multimedia Udayana?</span>
                            <svg class="w-5 h-5 fill-black dark:fill-light transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/>
                            </svg>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out text-black dark:text-light">
                            <div class="px-4">
                                <div class="w-full h-[1px] bg-seven"></div>
                            </div>
                            <div class="p-4">
                                Workshop Multimedia Udayana adalah ....
                            </div>
                        </div>
                    </div>
                    <div class="faq-item border border-gray-300 dark:border-light rounded-lg overflow-hidden bg-28-transparent hover:bg-light dark:hover:bg-two transition-all duration-200">
                        <button class="faq-btn cursor-pointer w-full text-left flex justify-between items-center p-4">
                            <span class="text-black dark:text-light font-medium">Lorem ipsum dolor sit amet consectetur.?</span>
                            <svg class="w-5 h-5 fill-black dark:fill-light transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/>
                            </svg>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out text-black dark:text-light">
                            <div class="px-4">
                                <div class="w-full h-[1px] bg-seven"></div>
                            </div>
                            <div class="p-4">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate quos hic delectus quam iste, illo magni a incidunt! Sapiente, adipisci!
                            </div>
                        </div>
                    </div>
                    <div class="faq-item border border-gray-300 dark:border-light rounded-lg overflow-hidden bg-28-transparent hover:bg-light dark:hover:bg-two transition-all duration-200">
                        <button class="faq-btn cursor-pointer w-full text-left flex justify-between items-center p-4">
                            <span class="text-black dark:text-light font-medium">Lorem ipsum dolor sit amet consectetur.?</span>
                            <svg class="w-5 h-5 fill-black dark:fill-light transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/>
                            </svg>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out text-black dark:text-light">
                            <div class="px-4">
                                <div class="w-full h-[1px] bg-seven"></div>
                            </div>
                            <div class="p-4">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate quos hic delectus quam iste, illo magni a incidunt! Sapiente, adipisci!
                            </div>
                        </div>
                    </div>
                    <div class="faq-item border border-gray-300 dark:border-light rounded-lg overflow-hidden bg-28-transparent hover:bg-light dark:hover:bg-two transition-all duration-200">
                        <button class="faq-btn cursor-pointer w-full text-left flex justify-between items-center p-4">
                            <span class="text-black dark:text-light font-medium">Lorem ipsum dolor sit amet consectetur.?</span>
                            <svg class="w-5 h-5 fill-black dark:fill-light transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/>
                            </svg>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out text-black dark:text-light">
                            <div class="px-4">
                                <div class="w-full h-[1px] bg-seven"></div>
                            </div>
                            <div class="p-4">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate quos hic delectus quam iste, illo magni a incidunt! Sapiente, adipisci!
                            </div>
                        </div>
                    </div>
                    <div class="faq-item border border-gray-300 dark:border-light rounded-lg overflow-hidden bg-28-transparent hover:bg-light dark:hover:bg-two transition-all duration-200">
                        <button class="faq-btn cursor-pointer w-full text-left flex justify-between items-center p-4">
                            <span class="text-black dark:text-light font-medium">Lorem ipsum dolor sit amet consectetur.?</span>
                            <svg class="w-5 h-5 fill-black dark:fill-light transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/>
                            </svg>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out text-black dark:text-light">
                            <div class="px-4">
                                <div class="w-full h-[1px] bg-seven"></div>
                            </div>
                            <div class="p-4">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate quos hic delectus quam iste, illo magni a incidunt! Sapiente, adipisci!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 relative">
        <img src="{{ asset('assets/images/gradient-blur-2.png') }}" class="w-full absolute -translate-y-1/2 top-[50%] -z-1" />
        <div class="container mx-auto">
            <h5 class="text-seven text-center scroll-mt-24" id="cp">CP</h5>
            <h1 class="text-4xl text-black dark:text-light text-center font-bold">Contact Person</h1>
            <p class="text-center mt-2 text-black dark:text-light">Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi narahubung di bawah ini</p>
            <div class="max-w-2xl grid grid-cols-2 gap-10 mx-auto mt-10">
                <div class="rounded-lg border-[1px] border-[#A295AC] p-5 bg-28-transparent flex flex-col gap-5 w-full">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center p-3 rounded-full bg-seven">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-light size-6" fill="currentColor">
                                <path d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 0 0-1.032-.211 50.89 50.89 0 0 0-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 0 0 2.433 3.984L7.28 21.53A.75.75 0 0 1 6 21v-4.03a48.527 48.527 0 0 1-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979Z" />
                                <path d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 0 0 1.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0 0 15.75 7.5Z" />
                            </svg>
                        </div>
                        <h5 class="text-seven font-semibold text-lg">Min WMU</h5>
                    </div>
                    <div class="flex flex-col gap-2">
                        <a class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-seven size-8" viewBox="0 0 448 512">
                                <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                            </svg>
                            <p class="text-black dark:text-light">087482938939</p>
                        </a>
                        <a class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-seven size-8" viewBox="0 0 512 512">
                                <path d="M311 196.8v81.3c0 2.1-1.6 3.7-3.7 3.7h-13c-1.3 0-2.4-.7-3-1.5l-37.3-50.3v48.2c0 2.1-1.6 3.7-3.7 3.7h-13c-2.1 0-3.7-1.6-3.7-3.7V196.9c0-2.1 1.6-3.7 3.7-3.7h12.9c1.1 0 2.4 .6 3 1.6l37.3 50.3V196.9c0-2.1 1.6-3.7 3.7-3.7h13c2.1-.1 3.8 1.6 3.8 3.5zm-93.7-3.7h-13c-2.1 0-3.7 1.6-3.7 3.7v81.3c0 2.1 1.6 3.7 3.7 3.7h13c2.1 0 3.7-1.6 3.7-3.7V196.8c0-1.9-1.6-3.7-3.7-3.7zm-31.4 68.1H150.3V196.8c0-2.1-1.6-3.7-3.7-3.7h-13c-2.1 0-3.7 1.6-3.7 3.7v81.3c0 1 .3 1.8 1 2.5c.7 .6 1.5 1 2.5 1h52.2c2.1 0 3.7-1.6 3.7-3.7v-13c0-1.9-1.6-3.7-3.5-3.7zm193.7-68.1H327.3c-1.9 0-3.7 1.6-3.7 3.7v81.3c0 1.9 1.6 3.7 3.7 3.7h52.2c2.1 0 3.7-1.6 3.7-3.7V265c0-2.1-1.6-3.7-3.7-3.7H344V247.7h35.5c2.1 0 3.7-1.6 3.7-3.7V230.9c0-2.1-1.6-3.7-3.7-3.7H344V213.5h35.5c2.1 0 3.7-1.6 3.7-3.7v-13c-.1-1.9-1.7-3.7-3.7-3.7zM512 93.4V419.4c-.1 51.2-42.1 92.7-93.4 92.6H92.6C41.4 511.9-.1 469.8 0 418.6V92.6C.1 41.4 42.2-.1 93.4 0H419.4c51.2 .1 92.7 42.1 92.6 93.4zM441.6 233.5c0-83.4-83.7-151.3-186.4-151.3s-186.4 67.9-186.4 151.3c0 74.7 66.3 137.4 155.9 149.3c21.8 4.7 19.3 12.7 14.4 42.1c-.8 4.7-3.8 18.4 16.1 10.1s107.3-63.2 146.5-108.2c27-29.7 39.9-59.8 39.9-93.1z"/>
                            </svg>
                            <p class="text-black dark:text-light">linekunih99</p>
                        </a>
                    </div>
                </div>
                <div class="rounded-lg border-[1px] border-[#A295AC] p-5 bg-28-transparent flex flex-col gap-5 w-full">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center p-3 rounded-full bg-seven">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-light size-6" fill="currentColor">
                                <path d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 0 0-1.032-.211 50.89 50.89 0 0 0-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 0 0 2.433 3.984L7.28 21.53A.75.75 0 0 1 6 21v-4.03a48.527 48.527 0 0 1-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979Z" />
                                <path d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 0 0 1.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0 0 15.75 7.5Z" />
                            </svg>
                        </div>
                        <h5 class="text-seven font-semibold text-lg">Min WMU</h5>
                    </div>
                    <div class="flex flex-col gap-2">
                        <a class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-seven size-8" viewBox="0 0 448 512">
                                <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                            </svg>
                            <p class="text-black dark:text-light">087482938939</p>
                        </a>
                        <a class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-seven size-8" viewBox="0 0 512 512">
                                <path d="M311 196.8v81.3c0 2.1-1.6 3.7-3.7 3.7h-13c-1.3 0-2.4-.7-3-1.5l-37.3-50.3v48.2c0 2.1-1.6 3.7-3.7 3.7h-13c-2.1 0-3.7-1.6-3.7-3.7V196.9c0-2.1 1.6-3.7 3.7-3.7h12.9c1.1 0 2.4 .6 3 1.6l37.3 50.3V196.9c0-2.1 1.6-3.7 3.7-3.7h13c2.1-.1 3.8 1.6 3.8 3.5zm-93.7-3.7h-13c-2.1 0-3.7 1.6-3.7 3.7v81.3c0 2.1 1.6 3.7 3.7 3.7h13c2.1 0 3.7-1.6 3.7-3.7V196.8c0-1.9-1.6-3.7-3.7-3.7zm-31.4 68.1H150.3V196.8c0-2.1-1.6-3.7-3.7-3.7h-13c-2.1 0-3.7 1.6-3.7 3.7v81.3c0 1 .3 1.8 1 2.5c.7 .6 1.5 1 2.5 1h52.2c2.1 0 3.7-1.6 3.7-3.7v-13c0-1.9-1.6-3.7-3.5-3.7zm193.7-68.1H327.3c-1.9 0-3.7 1.6-3.7 3.7v81.3c0 1.9 1.6 3.7 3.7 3.7h52.2c2.1 0 3.7-1.6 3.7-3.7V265c0-2.1-1.6-3.7-3.7-3.7H344V247.7h35.5c2.1 0 3.7-1.6 3.7-3.7V230.9c0-2.1-1.6-3.7-3.7-3.7H344V213.5h35.5c2.1 0 3.7-1.6 3.7-3.7v-13c-.1-1.9-1.7-3.7-3.7-3.7zM512 93.4V419.4c-.1 51.2-42.1 92.7-93.4 92.6H92.6C41.4 511.9-.1 469.8 0 418.6V92.6C.1 41.4 42.2-.1 93.4 0H419.4c51.2 .1 92.7 42.1 92.6 93.4zM441.6 233.5c0-83.4-83.7-151.3-186.4-151.3s-186.4 67.9-186.4 151.3c0 74.7 66.3 137.4 155.9 149.3c21.8 4.7 19.3 12.7 14.4 42.1c-.8 4.7-3.8 18.4 16.1 10.1s107.3-63.2 146.5-108.2c27-29.7 39.9-59.8 39.9-93.1z"/>
                            </svg>
                            <p class="text-black dark:text-light">linekunih99</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
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
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 6,
                    spaceBetween: 20,
                }
            },
        })
    </script>
@endsection