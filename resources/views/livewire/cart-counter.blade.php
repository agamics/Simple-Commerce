<div class="relative group">
    <a wire:navigate href="{{ route('cart') }}"
        class="w-10 h-10 bg-white dark:bg-gray-800 dark:text-white rounded-full shadow-sm flex items-center justify-center border border-transparent hover:bg-gray-50 dark:hover:bg-gray-700 transition">
        <i class="bi bi-cart3 text-lg"></i>
    </a>
    @if($count > 0)
        <span
            class="absolute -top-1 -right-1 w-5 h-5 bg-primary text-white text-[10px] rounded-full flex items-center justify-center border-2 border-[#f4f6f9] dark:border-[#151521]">{{ $count }}</span>
    @endif
</div>