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

            @if ($latestNews)
                <div class="mt-3 bg-white rounded-lg border border-gray-200 shadow-md">
                    <div class="flex flex-wrap lg:gap-5">
                        <div class="w-100">
                            @if (!empty($latestNews->thumbnail))
                                <img src="{{ asset('storage/' . $latestNews->thumbnail) }}" alt=""
                                    class="w-full max-w-xl h-full object-cover rounded-lg">
                            @else
                                <img src="{{ url('images/placeholder.png') }}"
                                    class="w-full max-w-xl min-w-sm min-w-sm rounded-lg mx-auto" alt="">
                            @endif
                        </div>
                        <div class="flex flex-col max-md:py-3 flex-auto lg:basis-1/3 p-5">
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
                                <a href="{{ url('site/news/' . Illuminate\Support\Str::slug($latestNews->title)) }}"
                                    class="text-green-600 text-sm hover:bg-green-200 font-bold rounded-lg py-2 px-4">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div>No latest news available.</div>
            @endif
        </div>
        <div class="mt-10">
            <div class="flex">
                <div class="me-auto">
                    <h1 class="text-gray-800 text-2xl font-bold">Other News</h1>
                    <div class="divider divider-success m-0 max-w-[50px]"></div>
                </div>
                @if (count($news) >= 5)
                    <div class="">
                        <a href="/site/news"
                            class="text-green-600 text-sm hover:bg-green-200 font-bold rounded-lg py-2 px-4">
                            See All
                            <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                @endif
            </div>
            <div class="mt-3 inline-flex gap-2 w-full overflow-x-scroll pb-3 custom-scrollbar">
                @if (count($news) == 0)
                    <div>
                        <div>No data available.</div>
                    </div>
                @endif
                @foreach ($news as $new)
                    <a href="{{ url('site/news/' . Illuminate\Support\Str::slug($new->slug)) }}"
                        class="hover:shadow-xl shadow-md bg-white/50 hover:bg-white transition ease-in-out delay-50 rounded-lg h-[400px]">
                        <div class="w-[280px] h-full border rounded-lg flex flex-col">
                            <div class="flex flex-col flex-grow">
                                <div class="w-full max-w-lg max-h-[185px] overflow-hidden">
                                    @if (!empty($new->thumbnail))
                                        <img src="{{ asset('storage/' . $new->thumbnail) }}" alt=""
                                            class="w-full max-w-xl h-full object-cover rounded-lg">
                                    @else
                                        <img src="{{ url('images/placeholder.png') }}"
                                            class="w-full max-w-xl min-w-sm min-w-sm rounded-lg mx-auto" alt="">
                                    @endif
                                </div>
                                <div class="flex flex-col flex-grow p-5">
                                    <div class="flex flex-col gap-1 text-gray-500 text-sm">
                                        <div>
                                            {{ \Illuminate\Support\Carbon::parse($new->date)->format('M. j, Y') }}
                                        </div>
                                    </div>
                                    <div class="text-base font-semibold my-2 text-green-600">
                                        <div>
                                            {{ Illuminate\Support\Str::limit($new->title, 50) }}
                                        </div>
                                    </div>
                                    <div class="text-gray-700 text-xs flex-grow">
                                        {{ Illuminate\Support\Str::limit($new->content, 100) }}
                                    </div>
                                    <div class="mt-auto text-gray-500 text-sm">
                                        {{ $new->author_name }}
                                    </div>
                                </div>
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
            @if (count($events) >= 5)
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
            @if (count($news) == 0)
                <div>
                    <div>No data available.</div>
                </div>
            @endif
            @foreach ($events as $event)
                <a href="{{ url('site/events/' . Illuminate\Support\Str::slug($event->slug)) }}"
                    class="hover:shadow-xl shadow-md bg-white/50 hover:bg-white transition ease-in-out delay-50 rounded-lg h-[400px]">
                    <div class="w-[280px] h-full border rounded-lg flex flex-col">
                        <div class="flex flex-col flex-grow">
                            <div class="w-full max-w-lg max-h-[185px] overflow-hidden">
                                @if (!empty($event->thumbnail))
                                    <img src="{{ asset('storage/' . $event->thumbnail) }}" alt=""
                                        class="w-full max-w-xl h-full object-cover rounded-lg">
                                @else
                                    <img src="{{ url('images/placeholder.png') }}"
                                        class="w-full max-w-xl min-w-sm min-w-sm rounded-lg mx-auto" alt="">
                                @endif
                            </div>

                            <div class="flex flex-col flex-grow p-5">
                                <div class="flex flex-col gap-1 text-gray-500 text-sm">
                                    <div>
                                        {{ \Illuminate\Support\Carbon::parse($event->starting_date)->format('M. j, Y') . ' - ' . \Illuminate\Support\Carbon::parse($event->ending_date)->format('M. j, Y') }}
                                    </div>
                                </div>
                                <div class="text-base font-semibold my-2 text-green-600">
                                    <div>
                                        {{ Illuminate\Support\Str::limit($event->title, 50) }}
                                    </div>
                                </div>
                                <div class="text-gray-700 text-xs flex-grow">
                                    {{ Illuminate\Support\Str::limit($event->content, 100) }}
                                </div>
                                <div class="text-gray-500 text-sm max-w-[101px]">
                                    <div class="text-green-600 text-sm hover:bg-green-200 font-bold rounded-lg py-2 px-4">
                                        Read More
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-layout>
