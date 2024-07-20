<div class="flex border-gray-200 border rounded-lg gap-2 shadow-md">
    <div class="p-2">
        <img src="https://placehold.co/600x400"
            class="w-[200px] rounded-md h-[200px] object-cover" alt="avatar">
    </div>
    <div class="py-2 flex flex-col">
        <div>
            <x-tag :type="'teacher'">{{ $staffs->type }}</x-tag>
        </div>
        <h1 class="text-xl mt-3 font-bold">{{ $staffs->name }}</h1>
        <span class="text-sm text-gray-500">{{ $staffs->position }}</span>
        @if (!empty($staffs->advisee))
            <div class="mt-3">
                <span class="font-semibold">Advisee:</span>
                <span>Grade - 7 Red</span>
            </div>
        @endif
        <div class="mt-auto">
            <x-primary-button>Edit</x-primary-button>
        </div>
    </div>
</div>