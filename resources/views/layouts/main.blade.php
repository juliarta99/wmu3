<!DOCTYPE html>
<html class="font-poppins scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', ($title ?? '')) Workshop Multimedia Udayana</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.ico') }}">

    {{-- SEO Meta Tags --}}
    <meta name="description" content="{{ $description ?? 'Workshop Multimedia Udayana adalah sebuah kegiatan yang menggabungkan pembelajaran teori dan praktik di bidang videografi' }}">
    <meta name="keywords" content="{{ $keywords ?? 'workshop, multimedia, bem udayana, kominfo udayana, workshop multimedia, workshop multimedia udayana, workshop multimedia udayana 2025, kominfo bem udayana, workshop gratis, kamera, multimedia, workshop 2025' }}">
    <meta name="author" content="{{ $author ?? 'Kementerian Komunikasi dan Informasi Badan Eksekutif Mahasiswa Universitas Udayana' }}">
    <link rel="canonical" href="{{ $url ?? url()->current() }}">

    {{-- Open Graph / Facebook / LinkedIn --}}
    <meta property="og:url" content="{{ $url ?? url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ? $title.'Workshop Multimedia Udayana' : 'Workshop Multimedia Udayana' }}">
    <meta property="og:description" content="{{ $description ?? 'Workshop Multimedia Udayana adalah sebuah kegiatan yang menggabungkan pembelajaran teori dan praktik di bidang videografi' }}">
    <meta property="og:image" content="{{ $image ?? asset('assets/images/meta-tag.png') }}">
    <meta property="og:site_name" content="Workshop Multimedia Udayana">

    {{-- Twitter Meta Tags --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:domain" content="{{ request()->getHost() }}">
    <meta name="twitter:url" content="{{ $url ?? url()->current() }}">
    <meta name="twitter:title" content="{{ $title ? $title.'Workshop Multimedia Udayana' : 'Workshop Multimedia Udayana' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Workshop Multimedia Udayana adalah sebuah kegiatan yang menggabungkan pembelajaran teori dan praktik di bidang videografi' }}">
    <meta name="twitter:image" content="{{ $image ?? asset('assets/images/meta-tag.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    @include('layouts.styles.tailwind')

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="min-h-screen overflow-x-hidden bg-white dark:bg-gradient-to-b dark:from-[#0A091D] dark:from-0% dark:via-one dark:via-10% dark:to-[#0A091D] dark:to-100% dark:bg-no-repeat">
    <div id="blob-container" class="fixed inset-0 -z-10"></div>
    <main class="max-w-full overflow-hidden relative z-1">
      @include('layouts.header')
  
      <img src="{{ asset('assets/images/gradient-blur.png') }}" class="w-full absolute top-0 -z-1" />
     
      @yield('content')
     
      @include('layouts.footer')
    </main>
    
    <script src="{{ asset('js/blob-manager.js') }}?v={{ time() }}"></script>
    <script>  
      let blobManager;
      document.addEventListener('DOMContentLoaded', () => {
          blobManager = new BlobManager();
      });
    </script>
    <script>
      const qrCodeBlack = new QRCodeStyling({
          width: 120,
          height: 120,
          type: "canvas",
          data: "{{ url('register') }}",
          image: "{{ asset('assets/images/logo.png') }}",
          dotsOptions: {
              color: "#070707",
              type: "rounded"
          },
          backgroundOptions: {
              color: "transparent"
          },
          imageOptions: {
              crossOrigin: "anonymous",
              margin: 5,
              width: 80,
              height: 80
          }
      });
      qrCodeBlack.append(document.getElementById("qrcode-black"));
      
      const qrCodeWhite = new QRCodeStyling({
          width: 120,
          height: 120,
          type: "canvas",
          data: "{{ url('register') }}",
          image: "{{ asset('assets/images/logo.png') }}",
          dotsOptions: {
              color: "#FCFDFD",
              type: "rounded"
          },
          backgroundOptions: {
              color: "transparent"
          },
          imageOptions: {
              crossOrigin: "anonymous",
              margin: 5,
              width: 80,
              height: 80
          }
      });
      qrCodeWhite.append(document.getElementById("qrcode-white"));
    </script>

    <script>
      const navbar = document.getElementById('navbar');

      window.addEventListener('scroll', () => {
        if (window.scrollY > 0) {
          navbar.classList.add('backdrop-blur-2xl');
          navbar.classList.remove('bg-transparent');
        } else {
          navbar.classList.remove('backdrop-blur-2xl');
          navbar.classList.add('bg-transparent');
        }
      });

      if (
        localStorage.theme === 'dark' ||
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
      ) {
        document.documentElement.classList.add('dark');
      } else {
        document.documentElement.classList.remove('dark');
      }

      const toggleBtn = document.getElementById('theme-toggle');
      const moonIcon = document.getElementById('moon-icon');
      const sunIcon = document.getElementById('sun-icon');

      function addRotateAnimation(icon) {
        icon.classList.add('animate-rotate-swing');
        setTimeout(() => {
          icon.classList.remove('animate-rotate-swing');
        }, 1500);
      }

      toggleBtn.addEventListener('click', () => {
        const isDark = document.documentElement.classList.contains('dark');
        if (isDark) {
          document.documentElement.classList.remove('dark');
          localStorage.theme = 'light';
          addRotateAnimation(moonIcon);
        } else {
          document.documentElement.classList.add('dark');
          localStorage.theme = 'dark';
          addRotateAnimation(sunIcon);
        }
      });

      document.addEventListener("DOMContentLoaded", () => {
        const humberger = document.getElementById("humberger");
        const navMobile = document.getElementById("nav-mobile");
        const line1 = document.querySelector("#humberger .line1");
        const line2 = document.querySelector("#humberger .line2");
        const line3 = document.querySelector("#humberger .line3");

        function toggleNav() {
          line1.classList.toggle("rotate-45");
          line1.classList.toggle("translate-y-1");

          line2.classList.toggle("scale-0");

          line3.classList.toggle("-rotate-45");
          line3.classList.toggle("-translate-y-2");

          navMobile.classList.toggle("-translate-y-[100%]");
          navMobile.classList.toggle("translate-y-0");
        }

        humberger.addEventListener("click", (e) => {
          e.stopPropagation();
          toggleNav();
        });

        document.addEventListener("click", (e) => {
          if (
            !navMobile.classList.contains("-translate-y-[100%]") && 
            !navMobile.contains(e.target) && 
            !humberger.contains(e.target) 
          ) {
            toggleNav();
          }
        });

        navMobile.querySelectorAll("a, button").forEach((el) => {
          el.addEventListener("click", () => {
            if (!navMobile.classList.contains("-translate-y-[100%]")) {
              toggleNav();
            }
          });
        });
      });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    @yield('scripts')
</body>
</html>
