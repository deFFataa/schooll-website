<x-layout>
    <div class="lg:px-40 pt-28 sm:px-10 max-sm:pt-24 max-md:px-10 px-5">
        <div class="grid grid-rows-1 grid-cols-4 gap-5 max-md:grid-rows-2">
            <div class="lg:col-span-3 col-span-4">
                <div class="">
                    <span class="text-4xl text-gray-800 font-bold">{{ $news->title }}</span>
                </div>
                <div class="mt-6">
                    <span class="text-gray-600">{{ $news->author_name }}</span>
                </div>
                <div>
                    <span
                        class="text-gray-600">{{ Illuminate\Support\Carbon::parse($news->date)->format('F j, Y') }}</span>
                </div>
                <div class="mt-6 w-full border">
                    <img src="https://placehold.co/600x400" class="w-auto min-w-sm rounded-lg mx-auto" alt="">
                </div>
                <div class="mt-6">
                    <span class="whitespace-pre-wrap">{{ $news->content }}</span>
                </div>
            </div>

            <div class="lg:col-span-1 col-span-4 max-md:my-5">
                <div class="sticky top-24"> <!-- Add sticky class with top offset -->
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
                                            <div class="h-auto">
                                                <img src="https://placehold.co/300x200"
                                                    class="w-full min-w-sm rounded-lg" alt="">
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
            </div>
        </div>
    </div>
</x-layout>
