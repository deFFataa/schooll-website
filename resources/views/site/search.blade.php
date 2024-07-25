<x-layout>
    <div class="lg:px-40 pt-28 sm:px-10 max-sm:pt-24 md:px-10 px-5 mb-20">
        <div>
            <span class="text-xl text-gray-800">
                Search Result for: <span class="font-bold"> {{ $query }} </span>
            </span>
            <div class="divider divider-success mt-0 max-w-[50px]"></div>
        </div>
        <div class="space-y-3">

            @if ($news->isEmpty() && $events->isEmpty())
                <div class="mb-20">
                    No results found. Please try searching with different keywords.
                </div>
            @endif

            @foreach ($news as $new)
                <div class="shadow-md bg-white border-gray-300 hover:bg-gray-50 rounded-lg h-auto">
                    <a href="events/{{ $new->id }}">
                        <div class="md:flex">
                            <div class="md:shrink-0">
                                @if (!empty($new->thumbnail))
                                    <div class="w-full max-w-lg max-h-[340px] overflow-hidden">
                                        <img src="{{ asset('storage/' . $new->thumbnail) }}" alt=""
                                            class="w-full h-full object-cover rounded-lg">
                                    </div>
                                @else
                                    <img src="{{ url('images/placeholder.png') }}"
                                        class="w-full max-w-lg min-w-sm min-w-sm rounded-lg min-w-[150px] min-h-[150px] object-fill"
                                        alt="">
                                @endif
                            </div>
                            <div class="p-8">
                                <div class="flex flex-col h-full">
                                    <div class="uppercase tracking-wide text-sm text-gray-500 font-semibold">
                                        {{ \Illuminate\Support\Carbon::parse($new->date)->format('M. j, Y') }}
                                    </div>
                                    <div class="text-lg font-semibold my-2 text-green-600">
                                        {{ $new->title }}
                                    </div>
                                    <div class="mt-2 flex-grow text-gray-500">
                                        {{ Illuminate\Support\Str::limit($new->content, 100) }}</div>
                                    <div class="mt-auto text-gray-500 text-sm">
                                        {{ $new->author_name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            @foreach ($events as $event)
                <div class="shadow-md bg-white border-gray-300 hover:bg-gray-50 rounded-lg h-auto">
                    <a href="events/{{ $event->id }}">
                        <div class="md:flex">
                            <div class="md:shrink-0">
                                @if (!empty($event->thumbnail))
                                    <div class="w-full max-w-lg max-h-[340px] overflow-hidden">
                                        <img src="{{ asset('storage/' . $event->thumbnail) }}" alt=""
                                            class="w-full h-full object-cover rounded-lg">
                                    </div>
                                @else
                                    <img src="{{ url('images/placeholder.png') }}"
                                        class="w-full max-w-lg min-w-sm min-w-sm rounded-lg min-w-[150px] min-h-[150px] object-fill"
                                        alt="">
                                @endif
                            </div>

                            <div class="p-8">
                                <div class="flex flex-col h-full">
                                    <div class="uppercase tracking-wide text-sm text-gray-500 font-semibold">
                                        {{ \Illuminate\Support\Carbon::parse($event->starting_date)->format('M. j, Y') . ' - ' . \Illuminate\Support\Carbon::parse($event->ending_date)->format('M. j, Y') }}
                                    </div>
                                    <div class="text-lg font-semibold my-2 text-green-600">
                                        <div>
                                            {{ $event->title }}
                                        </div>
                                    </div>
                                    <div class="text-gray-700 text-sm flex-grow">
                                        {{ Illuminate\Support\Str::limit($event->content, 100) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
