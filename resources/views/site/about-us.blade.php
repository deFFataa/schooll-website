<x-layout>
    <div class="banner-about-us">
        <div class="relative z-1 text-white flex gap-2 justify-center px-5 items-center flex-col h-full">
            <h1 class="text-3xl font-bold text-center">San Pablo National High School</h1>
            <h1 class="text-3xl font-bold">Established 1999</h1>
        </div>
    </div>

    <div class="mt-6 px-40 max-sm:px-5 max-md:px-20">
        <div>
            <span class="text-4xl font-bold text-gray-800">
                Background
            </span>
            <div class="divider divider-success mt-0 max-w-[50px]"></div>
        </div>

        <div class="grid grid-cols-2 grid-rows-1 max-sm:grid-rows-2 max-sm:grid-cols-1 gap-5 italic">
            <div class="">
                <p class="leading-relaxed">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis ipsum numquam
                    aut sapiente. Architecto
                    laudantium mollitia, repudiandae amet minus temporibus explicabo, praesentium recusandae molestiae,
                    sed ipsum eum voluptatibus rem esse.
                    Ratione dolor ipsa doloribus deleniti quibusdam, dignissimos a voluptatum ut tempore similique
                    fugiat ad dolore! Eaque pariatur laboriosam iusto vel nobis quos dignissimos, consectetur dolor sed
                    voluptate cumque saepe quisquam!
                    Quidem, facere. Consectetur rem fugit dolor, quis quae optio. Obcaecati dolor molestiae voluptates
                    incidunt saepe recusandae inventore, atque reiciendis consequuntur asperiores, architecto laboriosam
                    ipsa aperiam quis consequatur ea dolores error!
            </div>
            <div class="">
                <p class="leading-relaxed">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis ipsum numquam
                    aut sapiente. Architecto
                    laudantium mollitia, repudiandae amet minus temporibus explicabo, praesentium recusandae molestiae,
                    sed ipsum eum voluptatibus rem esse.
                    Ratione dolor ipsa doloribus deleniti quibusdam, dignissimos a voluptatum ut tempore similique
                    fugiat ad dolore! Eaque pariatur laboriosam iusto vel nobis quos dignissimos, consectetur dolor sed
                    voluptate cumque saepe quisquam!
                    Quidem, facere. Consectetur rem fugit dolor, quis quae optio. Obcaecati dolor molestiae voluptates
                    incidunt saepe recusandae inventore, atque reiciendis consequuntur asperiores, architecto laboriosam
                    ipsa aperiam quis consequatur ea dolores error!
            </div>
        </div>
    </div>

    <div class="mt-6 px-40 max-sm:px-5 max-md:px-20">
        <div>
            <div class="p-10 max-sm:p-0">
                <div class="grid grid-cols-2 lg:gap-5 place-items-center max-sm:grid-rows-2 max-sm:grid-cols-1">
                    <div class="">
                        <div>
                            <span class="text-4xl font-bold text-gray-800">
                                Vision
                            </span>
                            <div class="divider divider-success mt-0 max-w-[50px]"></div>
                        </div>
                        <div class="text-gray-700 mt-3 text-base">
                            <p>{{ $vision }}</p>
                        </div>
                    </div>
                    <div class="h-auto w-full rounded-lg shadow-lg border-gray-300">
                        <img src="{{ asset('images/vision-img.jpg') }}"
                            class="w-full object-fit-cover min-w-sm rounded-lg shadow-lg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div>
            <div
                class="p-10 max-sm:p-0 grid grid-cols-2 lg:gap-5 place-items-center max-sm:grid-rows-2 max-sm:grid-cols-1">
                <!-- Image Section -->
                <div class="col-span-1 max-sm:order-2">
                    <img src="{{ asset('images/mission-img.jpg') }}" class="w-full object-cover shadow-lg rounded-lg"
                        alt="Mission Image">
                </div>
                <!-- Text Section -->
                <div class="col-span-1 order-1 max-sm:order-1">
                    <div>
                        <span class="text-4xl font-bold text-gray-800">
                            Mission
                        </span>
                        <div class="divider divider-success mt-0 max-w-[50px]"></div>
                    </div>
                    <div class="text-gray-700 mt-3 text-base">
                        <p>{{ $mission }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .banner-about-us {
            position: relative;
            height: 450px;
            overflow: hidden;
        }

        .banner-about-us::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ asset('images/banner-about-us.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: brightness(60%);
            z-index: 0;
        }
    </style>
</x-layout>

<script>
document.addEventListener('DOMContentLoaded', function () {
    console.log('Script loaded and DOM fully loaded');
    let navbar = document.querySelector('.nav');
    let lastScrollTop = 0;
    navbar.classList.add('bg-transparent');

    window.addEventListener('scroll', function () {
        let scrollTop = document.documentElement.scrollTop;

        if (scrollTop > 20) {
            if (scrollTop > lastScrollTop) {
                // Scrolling down
                navbar.classList.add('shadow-md');
                navbar.classList.remove('bg-transparent');
                navbar.classList.add('bg-green-600');
            } else {
                // Scrolling up
                if (scrollTop === 0) {
                    // Scrolled all the way to the top
                    navbar.classList.remove('shadow-md');
                    navbar.classList.remove('bg-green-600');
                    navbar.classList.add('bg-transparent');
                }
            }
        } else {
            if (scrollTop === 0) {
                // Scrolled all the way to the top
                navbar.classList.remove('shadow-md');
                navbar.classList.remove('bg-green-600');
                navbar.classList.add('bg-transparent');
            }
        }

        lastScrollTop = scrollTop;
    });
});

</script>
