<header id="navbar" class="fixed top-0 w-full z-[99999] transition-all duration-300 bg-transparent">
    <nav class="mx-auto flex justify-between gap-4 container py-3">
        <a href="/" class="flex items-center gap-2">
            <img src="{{ asset('assets/images/logo.png') }}" class="max-h-14" alt="">
            <h1 class="text-black dark:text-light font-medium">Workshop Multimedia <br>Udayana</h1>
        </a>
        <div class="flex gap-8 items-center">
            <a href="/" class="text-black dark:text-light hover:text-seven transition-all duration-200">Home</a>
            <a href="/#about" class="text-black dark:text-light hover:text-seven transition-all duration-200">About</a>
            <a href="{{ route('showcase.index') }}" class="text-black dark:text-light hover:text-seven transition-all duration-200">Showcase</a>
            <a href="/#faq" class="text-black dark:text-light hover:text-seven transition-all duration-200">FAQ</a>
            <a href="/#cp" class="text-black dark:text-light hover:text-seven transition-all duration-200">Contact</a>
        </div>
        <div class="flex gap-8 items-center">
            <button id="theme-toggle" class="cursor-pointer rounded-full">
                <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6 fill-black block dark:hidden transition-transform">
                    <path fill-rule="evenodd"
                    d="M9.528 1.718a.75.75 0 0 1 .162.819A8.97 8.97 0 0 0 9 6a9 9 0 0 0 9 9 8.97 8.97 0 0 0 3.463-.69.75.75 0 0 1 .981.98 10.503 10.503 0 0 1-9.694 6.46c-5.799 0-10.5-4.7-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 0 1 .818.162Z"
                    clip-rule="evenodd" />
                </svg>
                <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="fill-yellow-400 size-6 hidden transition-transform dark:block">
                    <path
                    d="M361.5 1.2c5 2.1 8.6 6.6 9.6 11.9L391 121l107.9 19.8c5.3 1 9.8 4.6 11.9 9.6s1.5 10.7-1.6 15.2L446.9 256l62.3 90.3c3.1 4.5 3.7 10.2 1.6 15.2s-6.6 8.6-11.9 9.6L391 391 371.1 498.9c-1 5.3-4.6 9.8-9.6 11.9s-10.7 1.5-15.2-1.6L256 446.9l-90.3 62.3c-4.5 3.1-10.2 3.7-15.2 1.6s-8.6-6.6-9.6-11.9L121 391 13.1 371.1c-5.3-1-9.8-4.6-11.9-9.6s-1.5-10.7 1.6-15.2L65.1 256 2.8 165.7c-3.1-4.5-3.7-10.2-1.6-15.2s6.6-8.6 11.9-9.6L121 121 140.9 13.1c1-5.3 4.6-9.8 9.6-11.9s10.7-1.5 15.2 1.6L256 65.1 346.3 2.8c4.5-3.1 10.2-3.7 15.2-1.6zM160 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z" />
                </svg>
                </button>
            <a href="">
                <button class="py-3 px-5 rounded-md bg-main-gradient cursor-pointer text-light">
                    Register
                </button>
            </a>
        </div>
    </nav>
</header>