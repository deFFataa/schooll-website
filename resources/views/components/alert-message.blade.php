@if (session()->has('success'))
    <div class="flex font-semibold items-center gap-3 text-green-600 w-100 p-3">
        <i class="fa-solid fa-check"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

@if (session()->has('danger'))
    <div class="flex font-semibold items-center gap-3 text-red-500 w-100 p-3">
        <i class="fa-solid fa-xmark"></i>
        <span>{{ session('danger') }}</span>
    </div>
@endif
