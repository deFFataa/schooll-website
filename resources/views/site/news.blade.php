<x-layout>
    <div class="lg:px-40 pt-28 sm:px-10 max-sm:pt-24 md:px-10 px-5">
        <div>
            <span class="text-xl font-bold text-gray-800">
                News
            </span>
            <div class="divider divider-success mt-0 max-w-[50px]"></div>
        </div>
        <div class="space-y-3">
            @foreach ($news as $new)
                <div class="shadow-md bg-white border-gray-300 hover:bg-gray-50 rounded-lg h-auto">
                    <a href="news/{{ $new->id }}">
                        <div class="flex max-sm:flex-wrap gap-x-6 p-5">
                            <div class="min-w-[150px] min-h-[150px] md:max-w-[200px] max-sm:w-full max-sm:h-[100px]">
                                <img src="https://placehold.co/150x150" class="rounded-lg object-cover w-full h-full"
                                    alt="">
                            </div>

                            <div class="flex flex-col lg:pt-2 max-md:pt-3 flex-grow">
                                <div class="flex-grow">
                                    <div class="flex gap-3 text-gray-500 text-sm">
                                        {{ \Illuminate\Support\Carbon::parse($new->date)->format('M. j, Y') }}
                                    </div>
                                    <div class="text-lg font-semibold my-2 text-green-600">
                                        <div>
                                            {{ $new->title }}
                                        </div>
                                    </div>
                                    <div class="text-gray-700 text-sm flex-grow">
                                        {{ Illuminate\Support\Str::limit($new->content, 100) }}
                                    </div>
                                </div>
                                <div class="mt-2 text-gray-500 text-sm">
                                    {{ $new->author_name }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="my-5">
            {{ $news->links() }}
        </div>
    </div>
</x-layout>
