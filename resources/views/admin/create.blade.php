<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create a Post
            </h2>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-box>
                <div class="mb-3">
                    <x-alert-message />
                </div>
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        Fill out the forms.
                    </h2>
                </header>
                <form method="POST" action="/post" class="mt-6 space-y-3">
                    @csrf
                    <div>
                        <x-input-label for="author_name" class="text-lg">Author Name</x-input-label>
                        <x-text-input class="max-w-md w-full" name="author_name" id="author_name" />
                        <x-input-error :messages="$errors->get('author_name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="date" class="text-lg">Date</x-input-label>
                        <x-text-input class="max-w-md w-full" name="date" id="date" type="date" />
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="title" class="text-lg">Title</x-input-label>
                        <x-text-input class="max-w-md w-full" name="title" id="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="content" class="text-lg">Content</x-input-label>
                        <textarea name="content" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            id="content" cols="51" rows="20"></textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>
                    <x-primary-button>Create</x-primary-button>
                </form>
            </x-box>
        </div>
    </div>
</x-app-layout>
