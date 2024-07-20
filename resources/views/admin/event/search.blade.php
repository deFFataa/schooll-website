<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="me-auto">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Search Result for: {{ $query }}
                </h2>
            </div>
            <x-primary-link-button href="/events/add">Add Event</x-primary-link-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-box>
                <div class="mb-3">
                    <x-alert-message />
                </div>
                <form action="/search-events" method="GET" class="flex">
                    <input type="text" name="q"
                        class="text-gray-500 border max-w-lg w-full border-gray-300 py-2 px-4 rounded-lg"
                        placeholder="Search...">
                </form>
                <div class="rounded-lg overflow-hidden mt-3 border border-gray-300">
                    @if (count($events) == 0)
                        <div class="p-10">No Records Found.</div>
                    @else
                        <table class="table-auto w-full text-sm">
                            <thead class="bg-green-600 text-white">
                                <tr class="">
                                    <th class="text-start p-3">No.</th>
                                    <th class="text-start p-3">Title</th>
                                    <th class="text-start p-3">Content</th>
                                    <th class="text-start p-3">Starting Date</th>
                                    <th class="text-start p-3">Ending Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($events as $event)
                                    @php
                                        $isEven = $count % 2 == 0;
                                    @endphp
                                    <tr class="{{ $isEven ? 'bg-gray-100' : '' }}">
                                        <td class="p-3">{{ $count++ }}</td>
                                        <td class="p-3">{{ $event->title }}</td>
                                        <td class="p-3">
                                            {{ Illuminate\Support\Str::limit($event->content, 25) }}
                                        </td>
                                        <td class="p-3">
                                            {{ Illuminate\Support\Carbon::parse($event->starting_date)->format('F j, Y - g:ia') }}
                                        </td>
                                        <td class="p-3">
                                            {{ Illuminate\Support\Carbon::parse($event->ending_date)->format('F j, Y - g:ia') }}
                                        </td>
                                        <td class="p-3">
                                            <a href="/events/edit/{{ $event->id }}" class="text-gray-500">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

                <div class="mt-4">
                    {{ $events->links() }}
                </div>
            </x-box>
        </div>
    </div>
</x-app-layout>