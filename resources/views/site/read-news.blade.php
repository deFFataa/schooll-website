<x-layout>
    <div class="lg:px-40 pt-28 max-sm:px-5 max-sm:pt-24 max-md:px-10 px-5">
        @if (!$otherNews->isEmpty())
            <div class="grid grid-rows-1 grid-cols-4 gap-5 max-md:grid-rows-2 mb-20">
            @else
                <div class="grid grid-rows-1 grid-cols-4 gap-5 mb-20">
        @endif

        <div class="lg:col-span-3 col-span-4">
            <div class="">
                <span class="text-4xl text-gray-800 font-bold">{{ $news->title }}</span>
            </div>
            <div class="mt-6">
                <span class="text-gray-600">{{ $news->author_name }}</span>
            </div>
            <div>
                <span class="text-gray-600">{{ Illuminate\Support\Carbon::parse($news->date)->format('F j, Y') }}</span>
            </div>
            <div class="mt-6 w-full border">
                @if (!empty($news->thumbnail))
                    <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="">
                @else
                    <img src="{{ url('images/placeholder.png') }}"
                        class="w-full max-w-lg min-w-sm min-w-sm rounded-lg mx-auto" alt="">
                @endif

            </div>
            <div class="mt-6">
                <span class="whitespace-pre-wrap">{{ $news->content }}</span>
            </div>
        </div>

        @if (!$otherNews->isEmpty())
            <div class="lg:col-span-1 col-span-4 max-md:my-5">
                <span class="text-xl font-bold text-gray-800">
                    You'll also like
                </span>
                <div class="divider divider-success mt-0 max-w-[50px]"></div>
                <div
                    class="overflow-hidden custom-scrollbar md:pb-3 md:overflow-x-auto md:w-full max-sm:pb-3 max-sm:overflow-x-auto max-sm:w-full">
                    <div class="inline-flex lg:flex-col custom-scrollbar gap-2">
                        @foreach ($otherNews as $new)
                            <a href="/news/{{ $new->id }}"
                                class="hover:shadow-xl shadow-md bg-white/50 hover:bg-white transition ease-in-out delay-50 rounded-lg h-[400px]">
                                <div class="w-[280px] h-full border p-5 rounded-lg flex flex-col">
                                    <div class="flex flex-col flex-grow">
                                        <div class="w-full">
                                            @if (!empty($new->thumbnail))
                                                <img src="{{ asset('storage/' . $new->thumbnail) }}" alt="" class="w-full max-w-lg min-w-sm min-w-sm rounded-lg max-h-[160px] object-cover">
                                            @else
                                                <img src="{{ url('images/placeholder.png') }}"
                                                    class="w-full max-w-lg min-w-sm min-w-sm rounded-lg max-h-[160px] object-cover"
                                                    alt="">
                                            @endif
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
        @endif
    </div>
    </div>
</x-layout>
