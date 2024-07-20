<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="me-auto">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Search Result for: {{ $query }}
                </h2>
            </div>
            <x-primary-link-button href="/staff/add">Add Staff</x-primary-link-button>
        </div>
    </x-slot>

    <div class="py-12 text-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-box>
                <div class="mb-3">
                    <x-alert-message />
                </div>
                <form action="/search-staff" method="GET" class="flex">
                    <input type="text" name="q"
                        class="text-gray-500 border max-w-lg w-full border-gray-300 py-2 px-4 rounded-lg"
                        placeholder="Search...">
                </form>
                <div>
                    <div class="rounded-lg overflow-hidden border mt-3 border-gray-300">
                        @if (count($staff) == 0)
                            <div class="p-10 mt-3">
                                No Records Found.
                            </div>
                        @else
                            <table class="table-auto w-full text-sm">
                                <thead class="bg-green-600 text-white">
                                    <tr class="">
                                        <th class="text-start p-3">No.</th>
                                        <th class="text-start p-3">Name</th>
                                        <th class="text-start p-3">Position</th>
                                        <th class="text-start p-3">Type</th>
                                        <th class="text-start p-3">Advisee</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($staff as $staffs)
                                        @php
                                            $isEven = $count % 2 == 0;
                                        @endphp
                                        <tr class="{{ $isEven ? 'bg-gray-100' : '' }}">
                                            <td class="p-3">{{ $count++ }}</td>
                                            <td class="p-3">{{ $staffs->name }}</td>
                                            <td class="p-3">{{ $staffs->position }}</td>
                                            <td class="p-3">{{ $staffs->type }}</td>
                                            <td class="p-3">
                                                @if (!empty($staffs->advisee))
                                                    {{ $staffs->advisee }}
                                                @else
                                                    None
                                                @endif
                                            </td>
                                            <td class="p-3">
                                                <a href="/staff/edit/{{ $staffs->id }}" class="text-gray-500">
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
                        {{ $staff->links() }}
                    </div>
                </div>
            </x-box>
        </div>
    </div>
</x-app-layout>
