<!DOCTYPE html>
<html class="font-poppins scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $title ?? '') Workshop Multimedia Udayana</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    @include('layouts.styles.tailwind')
</head>
<body class="min-h-screen overflow-x-hidden bg-white dark:bg-gradient-to-b dark:from-[#0A091D] dark:from-0% dark:via-one dark:via-10% dark:to-[#0A091D] dark:to-100% dark:bg-no-repeat">
    <div id="blob-container" class="fixed inset-0 -z-10"></div>
    <main class="max-w-full overflow-hidden relative z-1">
        <img src="{{ asset('assets/images/gradient-blur.png') }}" class="w-full absolute top-0 -z-1" />
        <section class="min-h-screen flex items-center justify-center">
            <div class="container mx-auto max-w-6xl flex flex-col items-center justify-center">
                @yield('content')
            </div>
        </section>
    </main>

    <script src="{{ asset('js/blob-manager.js') }}?v={{ time() }}"></script>
    <script>  
      let blobManager;
      document.addEventListener('DOMContentLoaded', () => {
          blobManager = new BlobManager();
      });
    </script>
    <script>
        if (
            localStorage.theme === 'dark' ||
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</body>
</html>