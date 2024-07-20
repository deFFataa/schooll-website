@props(['type'])

@if ($type == 'teacher')
    <span class="bg-green-100 py-1 px-2 border border-green-200 rounded-full font-bold text-xs text-green-700 uppercase">
        {{ $slot }}
    </span>
@endif

@if ($type == 'staff')
    <span class="bg-sky-100 py-1 px-2 border border-sky-200 rounded-full font-bold text-xs text-sky-700 uppercase">
        {{ $slot }}
    </span>
@endif

@if ($type == 'president')
    <span class="px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase">
        {{ $slot }}
    </span>
@endif
