<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit a Post
            </h2>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-box>
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        Fill out the forms.
                    </h2>
                </header>
                <form method="POST" action="/post/edit/{{ $posts->id }}" class="mt-6 space-y-3">
                    @csrf
                    @method('PATCH')
                    <div>
                        <x-input-label for="author_name" class="text-lg">Author Name</x-input-label>
                        <x-text-input class="max-w-md w-full" name="author_name" value="{{ $posts->author_name }}"
                            id="author_name" />
                        <x-input-error :messages="$errors->get('author_name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="date" class="text-lg">Date</x-input-label>
                        <x-text-input class="max-w-md w-full" name="date" id="date" value="{{ $posts->date }}"
                            type="date" />
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="title" class="text-lg">Title</x-input-label>
                        <x-text-input class="max-w-md w-full" name="title" value="{{ $posts->title }}"
                            id="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="content" class="text-lg">Content</x-input-label>
                        <textarea name="content" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            id="content" cols="51" rows="20">{{ $posts->content }}</textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>
                    <div class="flex">
                        <div class="flex-1">
                            <x-danger-button x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-post-deletion')">
                                Delete
                            </x-danger-button>
                        </div>
                        <div>
                            <x-secondary-link-button href="/post">Cancel</x-secondary-link-button>
                            <x-primary-button>Save</x-primary-button>
                        </div>
                    </div>
                </form>
                <x-modal name="confirm-post-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form method="post" action="/post/{{ $posts->id }}" class="p-6 grid place-items-center">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Are you sure you want to delete this post?') }}
                        </h2>

                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-danger-button class="ms-3">
                                {{ __('Delete Post') }}
                            </x-danger-button>
                        </div>
                    </form>
                </x-modal>
            </x-box>
        </div>
    </div>
</x-app-layout>
