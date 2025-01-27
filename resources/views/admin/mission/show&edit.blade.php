<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mission
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-box>
                <x-alert-message />
                @if (!empty($mission))
                    <form method="POST" action="/mission" class="space-y-3">
                        @csrf
                        @method('PATCH')
                        <div>
                            <x-input-label for="content" class="text-lg">Content</x-input-label>
                            <textarea name="content"
                                class="border-gray-300 w-full max-w-xl focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                id="content" rows="5">{{ $mission }}</textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        <x-primary-button>Save</x-primary-button>
                    </form>
                @else
                    <form method="POST" action="/mission" class="space-y-3">
                        @csrf
                        <div>
                            <x-input-label for="content" class="text-lg">Content</x-input-label>
                            <input type="hidden" name="name" value="mission">
                            <textarea name="content"
                                class="border-gray-300 w-full max-w-xl focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                id="content" rows="5"></textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        <x-primary-button>Add</x-primary-button>
                    </form>
                @endif
            </x-box>
        </div>
    </div>
</x-app-layout>
