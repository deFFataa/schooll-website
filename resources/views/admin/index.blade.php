<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="me-auto">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Post
                </h2>
            </div>
            <x-primary-link-button href="/post/add">Create Post</x-primary-link-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-box>
                <div class="rounded-lg overflow-hidden border border-gray-300">
                    <table class="table-auto w-full">
                        <thead class="bg-green-600 text-white">
                            <tr class="">
                                <th class="text-start p-3">No.</th>
                                <th class="text-start p-3">Author Name</th>
                                <th class="text-start p-3">Title</th>
                                <th class="text-start p-3">Content</th>
                                <th class="text-start p-3">Date</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($posts as $post)
                                <tr class="">
                                    <td class="p-3">{{ $count++ }}</td>
                                    <td class="p-3">{{ $post->author_name }}</td>
                                    <td class="p-3">{{ $post->title }}</td>
                                    <td class="p-3">
                                        {{ Illuminate\Support\Str::limit($post->content, 25) }}
                                    </td>
                                    <td class="p-3">{{ $post->date }}</td>
                                    <td class="p-3">
                                        <a href="/post/edit">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $posts->links() }}
                </div>

            </x-box>
        </div>
    </div>
</x-app-layout>
