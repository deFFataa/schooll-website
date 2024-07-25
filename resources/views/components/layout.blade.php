<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ url('images/logo.png') }}" />
    <title>SPNHS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/script.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation-site')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="footer bg-green-900 text-neutral-content px-40 py-10 max-md:px-5 max-sm:px-5">
            <aside class="max-sm:w-full max-sm:flex max-sm:justify-center max-sm:flex-col max-sm:items-center">
                <div>
                    <img src="{{ asset('images/logo.png') }}" class="grayscale" alt="">
                </div>
                <p>
                    SAN PABLO NATIONAL HIGH SCHOOL
                    <br />
                    Established 1999
                </p>
            </aside>
            <nav>
                <h6 class="footer-title">Social</h6>
                <div class="grid grid-flow-col gap-4">
                    <a href="https://www.facebook.com/sanpablo.nationalhighschool.5" target="_blank" class="text-lg">
                        <i class="fa-brands fa-facebook "></i>
                    </a>
                    <a href="https://www.facebook.com/p/300597-San-Pablo-National-High-School-The-Blaze-100072222230297/" target="_blank" class="text-lg">
                        <i class="fa-solid fa-user-group"></i>
                    </a>

                </div>
                <div class="mt-6">
                    <h6 class="footer-title">Contact Us</h6>
                    <div class="space-y-2">
                        <div>
                            <i class="fa-solid fa-envelope me-2"></i> <span>email@gmail.com</span>
                        </div>
                        <div>
                            <i class="fa-solid fa-phone me-2"></i> <span>09349542345</span>
                        </div>
                    </div>
                </div>
            </nav>
        </footer>
        <div class="text-center bg-green-900 py-5 text-white/80 border-t text-sm">
            <div>Copyright © 2024. All Rights Reserved - San Pablo National High School</div>
            <p class="mt-3">Created by Isaac Luis Balabbo</p>
        </div>
    </div>
</body>

</html>
