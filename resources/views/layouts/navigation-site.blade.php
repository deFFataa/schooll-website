<nav x-data="{ open: false }" class="nav bg-green-600 fixed w-full top-0 z-10">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('site') }}">
                        <x-app-logo-site />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 md:flex">
                    <x-nav-link-site :href="route('site/about-us')" :active="request()->routeIs('site/about-us')">
                        {{ __('About Us') }}
                    </x-nav-link-site>
                    <x-nav-link-site :href="route('site/news')" :active="request()->routeIs('site/news')">
                        {{ __('News') }}
                    </x-nav-link-site>
                    <x-nav-link-site :href="route('site/events')" :active="request()->routeIs('site/events')">
                        {{ __('Events') }}
                    </x-nav-link-site>
                    <x-nav-link-site :href="route('site/staff')" :active="request()->routeIs('site/staff')">
                        {{ __('Staffs') }}
                    </x-nav-link-site>
                </div>
            </div>

            <!-- Search -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 text-gray-800">
                <form action="/site/search" method="GET">
                    <label for="search">
                        <input id="search" type="text" name="q"
                            class="py-2 px-3 w-full text-sm border-gray-300 bg-transparent placeholder:text-white/70 focus:border-green-100 focus:ring-white text-white rounded-md hidden md:block"
                            placeholder="Search..." required>
                    </label>
                </form>
            </div>            

            <!-- Hamburger -->
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
        <div class="pt-2 px-4 pb-3 space-y-2 flex flex-col flex-wrap border-b border-white">
            <form action="/site/search" method="GET">
                <input type="text" name="q"
                class="py-2 px-3 w-full text-sm border-gray-300 bg-transparent placeholder:text-white/70 focus:border-green-100 focus:ring-white text-white rounded-md"
                placeholder="Search..." required>
            </form>
            <x-nav-link-site :href="route('site/about-us')" :active="request()->routeIs('site/about-us')">
                {{ __('About Us') }}
            </x-nav-link-site>
            <x-nav-link-site :href="route('site/news')" :active="request()->routeIs('site/news')">
                {{ __('News') }}
            </x-nav-link-site>
            <x-nav-link-site :href="route('site/events')" :active="request()->routeIs('site/events')">
                {{ __('Events') }}
            </x-nav-link-site>
            <x-nav-link-site :href="route('site/staff')" :active="request()->routeIs('site/staff')">
                {{ __('Staffs') }}
            </x-nav-link-site>
        </div>
    </div>
</nav>
