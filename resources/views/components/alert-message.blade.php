@if (session()->has('success'))
    <div class="flex items-center gap-3 text-white/90 w-100 bg-green-500 border-green-200 rounded-lg p-3 max">
        <i class="fa-solid fa-check"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif
