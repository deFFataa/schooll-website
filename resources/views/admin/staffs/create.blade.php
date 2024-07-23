<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Staff
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
                <form method="POST" action="/staff/add" enctype="multipart/form-data" class="mt-6 space-y-3">
                    @csrf
                    <div>
                        <label for="cover-photo"
                            class="block text-sm font-medium leading-6 text-gray-900">Avatar</label>
                        <a href="#" class="pointer" onclick="document.getElementById('file-upload').click()">
                            <div
                                class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10 cursor-pointer">
                                <div class="text-center">
                                    <img id="avatar" name="avatar" class="object-cover h-[200px] rounded-lg w-[200px] hidden"
                                        alt="Image Preview" style="max-width: 100%; max-height: 200px;" />
                                    <svg id="gallery-logo" class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600 justify-center">
                                        <label for="avatar"
                                            class="relative pointer-events-none rounded-md bg-white font-semibold text-green-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-green-600 focus-within:ring-offset-2 hover:text-green-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="avatar" type="file"
                                                class="sr-only" onchange="previewImage(event)">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p id="file-type" class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div>
                        <x-input-label for="name" class="text-lg">Name</x-input-label>
                        <x-text-input class="max-w-md w-full" name="name" id="name" :value="old('name')" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="position" class="text-lg">Position</x-input-label>
                        <x-text-input class="max-w-md w-full" name="position" id="position" :value="old('position')" />
                        <x-input-error :messages="$errors->get('position')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="type" class="text-lg">Type</x-input-label>
                        <x-text-input class="max-w-md w-full" name="type" type="text"
                            id="type" />
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>
                    <div class="flex justify-end">
                        <div>
                            <x-secondary-link-button href="/staff">Cancel</x-secondary-link-button>
                            <x-primary-button>Add</x-primary-button>
                        </div>
                    </div>
                </form>
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
                const preview = document.getElementById('avatar');
                preview.style.display = 'block';
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };

            reader.readAsDataURL(file);
        }

        document.getElementById('gallery-logo').style.display = 'none';
    }
</script>
