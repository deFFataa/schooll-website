<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit an Event
            </h2>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-box>
                <x-alert-message />
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        Fill out the forms.
                    </h2>
                </header>
                <form method="POST" action="/events/edit/{{ $events->id }}" enctype="multipart/form-data"
                    class="mt-6 space-y-3">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="cover-photo"
                            class="block text-sm font-medium leading-6 text-gray-900">Thumbnail</label>
                        <a href="#" class="pointer " onclick="document.getElementById('thumbnail').click()">
                            <div
                                class="mt-2 flex justify-center rounded-lg border border-dashed hover:bg-gray-900/5 border-gray-900/25 px-6 py-10 cursor-pointer">
                                <div class="text-center">
                                    @if (!empty($events->thumbnail))
                                        <div class="">
                                            <img id="thumbnail-preview" src="{{ asset('storage/' . $events->thumbnail) }}"
                                                class="object-cover h-[300px] rounded-lg w-[700px]" alt="Pic">
                                        </div>
                                    @else
                                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                    <input id="thumbnail" name="thumbnail" value="{{ $events->thumbnail }}" type="file" class="sr-only hidden" onchange="previewImage(event)">
                                    <p class="pl-1 mt-6 text-green-600">
                                        <span class="font-bold">
                                            <i class="fa-solid fa-cloud-arrow-up me-2"></i>Upload
                                        </span>
                                        or drag and drop
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div>
                        <x-input-label for="title" class="text-lg">Title</x-input-label>
                        <x-text-input class="max-w-md w-full" name="title" value="{{ $events->title }}"
                            id="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="content" class="text-lg">Content</x-input-label>
                        <textarea name="content" class="border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm"
                            id="content" cols="51" rows="20"> {{ $events->content }}</textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="starting_date" class="text-lg">Starting Date</x-input-label>
                        <x-text-input class="max-w-md w-full" name="starting_date" type="datetime-local"
                            value="{{ $events->starting_date }}" id="starting_date" />
                        <x-input-error :messages="$errors->get('starting_date')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="ending_date" class="text-lg">Ending Date</x-input-label>
                        <x-text-input class="max-w-md w-full" name="ending_date" type="datetime-local"
                            value="{{ $events->ending_date }}" id="ending_date" />
                        <x-input-error :messages="$errors->get('starting_date')" class="mt-2" />
                    </div>
                    <div class="flex">
                        <div class="flex-1">
                            <x-danger-button x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-event-deletion')">
                                Delete
                            </x-danger-button>
                        </div>
                        <div>
                            <x-secondary-link-button href="/events">Cancel</x-secondary-link-button>
                            <x-primary-button>Save</x-primary-button>
                        </div>
                    </div>
                </form>

                <x-modal name="confirm-event-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form method="post" action="/events/{{ $events->id }}" class="p-6 grid place-items-center">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Are you sure you want to delete this event?') }}
                        </h2>

                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-danger-button class="ms-3">
                                {{ __('Delete Event') }}
                            </x-danger-button>
                        </div>
                    </form>
                </x-modal>
            </x-box>
        </div>
    </div>
</x-app-layout>

<script>
    function previewImage(event) {
        const input = event.target;
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('thumbnail-preview');
                preview.style.display = 'block';
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };

            reader.readAsDataURL(file);
        }
    }
</script>

