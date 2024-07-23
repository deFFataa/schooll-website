<x-layout>
    <div class="bg-green-600 border-b-2 border-green-200 pt-20 pb-2 max-sm:py-3 px-5 sm:px-0 max-sm:pt-16">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 grid-rows-1">
                <div class="">
                    <h1 class="text-white text-7xl max-sm:text-4xl max-md:text-5xl max-lg:text-7xl font-bold">Inspiring
                        Excellence, Empowering Every Student</h1>
                    <div class="stats bg-white/80 shadow-md mt-6">
                        <div class="stat px-4 gap-2 sm:gap-4">
                            <div class="stat-figure text-green-600 text-2xl">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                            <div class="stat-title text-base max-sm:text-sm"> Graduates</div>
                            <div class="stat-value text-green-600 max-sm:text-base">10,000+</div>
                        </div>
                    </div>
                    <div class="stats bg-white/80 shadow-md mt-6">
                        <div class="stat px-4 gap-2 sm:gap-4"">
                            <div class="stat-figure text-green-600 text-2xl">
                                <i class="fa-solid fa-certificate"></i>
                            </div>
                            <div class="stat-title text-sm sm:text-base">Passing Rate</div>
                            <div class="stat-value text-green-600 max-sm:text-base">100%</div>
                        </div>
                    </div>
                </div>
                <div class="w-auto max-md:mt-4">
                    <img src="images/graduation.png" class="w-full max-w-6xl min-w-sm" alt="gradpic">
                </div>
            </div>
        </div>
    </div>
    
    <!-- News -->
    <div class="h-auto px-40 py-10 max-md:px-5">
        <div>
            <h1 class="text-gray-800 text-2xl font-bold">Latest News</h1>
            <div class="divider divider-success mt-0 max-w-[50px]"></div>

            <div class="mt-3 bg-white rounded-lg border border-gray-200 shadow-md p-5">
                <div class="flex flex-wrap lg:gap-5">
                    <div class="h-auto max-lg:w-full">
                        <img src="https://placehold.co/600x300" class="w-full min-w-sm rounded-lg" alt="">
                    </div>
                    <div class="flex flex-col lg:py-2 max-md:py-3 flex-auto lg:basis-1/3">
                        @if ($latestNews)
                            <div class="flex gap-2 text-gray-500">
                                <div>{{ $latestNews->author_name }}</div>
                            </div>
                            <div class="text-gray-500">
                                {{ Illuminate\Support\Carbon::parse($latestNews->date)->format('F j, Y') }}
                            </div>
                            <div class="text-3xl font-semibold my-4">
                                <div>
                                    {{ $latestNews->title }}
                                </div>
                            </div>
                            <div class="text-gray-700 text-sm">
                                {{ Illuminate\Support\Str::limit($latestNews->content, 350) }}
                            </div>
                            <div class="flex justify-bottom mt-auto max-md:mt-5">
                                <a href="news/{{ $latestNews->id }}"
                                    class="text-green-600 text-sm hover:bg-green-200 font-bold rounded-lg py-2 px-4">
                                    Read More
                                </a>
                            </div>
                        @else
                            <div>No latest news available.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <div class="flex">
                <div class="me-auto">
                    <h1 class="text-gray-800 text-2xl font-bold">Other News</h1>
                    <div class="divider divider-success m-0 max-w-[50px]"></div>
                </div>
                <div class="">
                    <a href="/site/news"
                        class="text-green-600 text-sm hover:bg-green-200 font-bold rounded-lg py-2 px-4">
                        See All
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            <div class="mt-3 inline-flex gap-2 w-full overflow-x-scroll pb-3 custom-scrollbar">
                @foreach ($news as $new)
                    <a href="/news/{{ $new->id }}"
                        class="hover:shadow-xl shadow-md bg-white/50 hover:bg-white transition ease-in-out delay-50 rounded-lg h-[400px]">
                        <div class="w-[280px] h-full border p-5 rounded-lg flex flex-col">
                            <div class="flex flex-col flex-grow">
                                <div class="h-auto">
                                    <img src="https://placehold.co/300x200" class="w-full min-w-sm rounded-lg"
                                        alt="">
                                </div>
                                <div class="flex flex-col lg:py-2 max-md:py-3 flex-grow">
                                    <div class="flex flex-col gap-1 text-gray-500 text-sm">
                                        <div>
                                            {{ \Illuminate\Support\Carbon::parse($new->date)->format('M. j, Y') }}
                                        </div>
                                    </div>
                                    <div class="text-base font-semibold my-2 text-green-600">
                                        <div>
                                            {{ $new->title }}
                                        </div>
                                    </div>
                                    <div class="text-gray-700 text-xs flex-grow">
                                        {{ Illuminate\Support\Str::limit($new->content, 100) }}
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 text-gray-500 text-sm">
                                {{ $new->author_name }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <hr>

    <!-- Events -->
    <div class="h-auto px-40 py-10 max-md:px-5">
        <div class="flex">
            <div class="me-auto">
                <h1 class="text-gray-800 text-2xl font-bold">Events</h1>
                <div class="divider divider-success mt-0 max-w-[50px]"></div>
            </div>
            @if (count($events) > 5)
                <div>
                    <a href="/site/events"
                        class="text-green-600 text-sm hover:bg-green-200 font-bold rounded-lg py-2 px-4">
                        See All
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>
            @endif
        </div>
        <div class="mt-3 inline-flex gap-2 w-full overflow-x-scroll pb-3 custom-scrollbar">
            @foreach ($events as $event)
                <a href="/news/{{ $event->id }}"
                    class="hover:shadow-xl shadow-md bg-white/50 hover:bg-white transition ease-in-out delay-50 rounded-lg h-[400px]">
                    <div class="w-[280px] h-full border p-5 rounded-lg flex flex-col">
                        <div class="flex flex-col flex-grow">
                            <div class="w-full h-[150px]">
                                <img src="{{ asset('storage/' . $event->thumbnail) }}"
                                    class="border object-cover w-full h-full rounded-lg" alt="">
                            </div>

                            <div class="flex flex-col lg:py-2 max-md:py-3 flex-grow">
                                <div class="flex flex-col gap-1 text-gray-500 text-sm">
                                    <div>
                                        {{ \Illuminate\Support\Carbon::parse($event->starting_date)->format('M. j, Y') . ' - ' . \Illuminate\Support\Carbon::parse($event->ending_date)->format('M. j, Y') }}
                                    </div>
                                </div>
                                <div class="text-base font-semibold my-2 text-green-600">
                                    <div>
                                        {{ $event->title }}
                                    </div>
                                </div>
                                <div class="text-gray-700 text-xs flex-grow">
                                    {{ Illuminate\Support\Str::limit($event->content, 100) }}
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 text-gray-500 text-sm max-w-[101px]">
                            <div class="text-green-600 text-sm hover:bg-green-200 font-bold rounded-lg py-2 px-4">
                                Read More
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-layout>
