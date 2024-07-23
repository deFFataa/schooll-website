<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Staff
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
                <form method="POST" action="/staff/edit/{{ $staff->id }}" enctype="multipart/form-data"
                    class="mt-6 space-y-3">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Avatar</label>
                        <a href="#" class="pointer" onclick="document.getElementById('file-upload').click()">
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed hover:bg-gray-900/5 border-gray-900/25 px-6 py-10 cursor-pointer">
                                <div class="text-center">
                                    <div>
                                        @if (!empty($staff->avatar))
                                            <img id="avatar-preview" class="object-cover h-[200px] rounded-lg w-[200px]"
                                                 src="{{ asset('storage/' . $staff->avatar) }}" alt="Current Avatar" />
                                        @else
                                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                    </div>
                                    <input id="file-upload" name="avatar" type="file" class="sr-only" onchange="previewImage(event)">
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
                    <x-input-error :messages="$errors->get('avatar')" class="mt-2" />

                    <div>
                        <x-input-label for="name" class="text-lg">Name</x-input-label>
                        <x-text-input class="max-w-md w-full" name="name" value="{{ $staff->name }}"
                            id="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="position" class="text-lg">Position</x-input-label>
                        <x-text-input class="max-w-md w-full" name="position" id="position"
                            value="{{ $staff->position }}" />
                        <x-input-error :messages="$errors->get('position')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="type" class="text-lg">Type</x-input-label>
                        <x-text-input class="max-w-md w-full" name="type" type="text" value="{{ $staff->type }}"
                            id="type" />
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>
                    <div class="flex">
                        <div class="flex-1">
                            <x-danger-button x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-staff-deletion')">
                                Delete
                            </x-danger-button>
                        </div>
                        <div>
                            <x-secondary-link-button href="/staff">Cancel</x-secondary-link-button>
                            <x-primary-button>Save</x-primary-button>
                        </div>
                    </div>
                </form>

                <x-modal name="confirm-staff-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form method="post" action="/staff/{{ $staff->id }}" class="p-6 grid place-items-center">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Are you sure you want to delete this staff?') }}
                        </h2>

                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-danger-button class="ms-3">
                                {{ __('Delete Staff') }}
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
                const preview = document.getElementById('avatar-preview');
                preview.style.display = 'block';
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };

            reader.readAsDataURL(file);
        }
    }
</script>
