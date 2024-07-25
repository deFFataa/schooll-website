<x-layout>
    <div class="lg:px-40 pt-28 sm:px-10 max-sm:pt-24 md:px-10 px-5">
        <div>
            <span class="text-xl font-bold text-gray-800">
                Meet the Staffs
            </span>
            <div class="divider divider-success mt-0 max-w-[50px]"></div>
        </div>

        {{-- @if ($principal->isEmpty() && $staffs->isEmpty())
            <div class="mb-20">
                No Records found.
            </div>
        @endif --}}

        @if (!is_null($principal))
            <div class="flex justify-center">
                <div class="card card-compact bg-base-100 w-96 shadow-xl p-5">
                    <div>
                        <x-tag :type="'principal'">{{ $principal->type }}</x-tag>
                    </div>
                    <div class="avatar mx-auto mt-3">
                        <div class="w-[150px] rounded-full">
                            @if (!empty($principal->avatar))
                                <img src="{{ asset('storage/' . $principal->avatar) }}" />
                            @else
                                <img src="{{ url('images/avatar.jpg') }}" />
                            @endif
                        </div>
                    </div>
                    <div class="px-5 mt-3">
                        <h2 class="text-center text-xl font-bold">{{ $principal->name }}</h2>
                        <p class="text-center text-base">{{ $principal->position }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (!is_null($staffs))
            <div class="flex flex-wrap justify-center gap-2 my-5">
                @foreach ($staffs as $staff)
                    <div class="card card-compact bg-base-100 w-96 shadow-xl p-5">
                        <div>
                            <x-tag :type="$staff->type">{{ $staff->type }}</x-tag>
                        </div>
                        <div class="avatar mx-auto mt-3">
                            <div class="w-[150px] rounded-full">
                                @if (!empty($staff->avatar))
                                    <img src="{{ asset('storage/' . $principal->avatar) }}" />
                                @else
                                    <img src="{{ url('images/avatar.jpg') }}" />
                                @endif
                            </div>
                        </div>
                        <div class="px-5 mt-3">
                            <h2 class="text-center text-xl font-bold">{{ $staff->name }}</h2>
                            <p class="text-center text-base">{{ $staff->position }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</x-layout>
