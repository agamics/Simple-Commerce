<!-- Main Content -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    <!-- Sidebar Filters -->
    <div class="col-span-1 lg:col-span-3 space-y-8">
        <div>
            <h3 class="text-sm font-bold uppercase tracking-wider text-dark dark:text-white mb-4">Categories
            </h3>
            <ul class="space-y-3">
                <li><a wire:navigate href="{{ route('products') }}"
                        class="flex justify-between items-center text-primary font-semibold text-sm">All
                        Products <span
                            class="bg-white dark:bg-gray-800 text-muted px-2 py-0.5 rounded-full text-xs">{{ $products->count() }}</span></a>
                </li>
                @foreach ($categories as $category)
                    <li><a wire:navigate href="{{ route('category', $category->id) }}"
                            class="flex justify-between items-center text-muted hover:text-dark dark:hover:text-white transition text-sm @if($category->id == $seletedCateg) text-primary @endif">{{ $category->name }}
                            <span
                                class="bg-white dark:bg-gray-800 text-muted px-2 py-0.5 rounded-full text-xs">{{ $category->products->count() }}</span></a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3 class="text-sm font-bold uppercase tracking-wider text-dark dark:text-white mb-4">Price Range
            </h3>
            <input type="range"
                class="w-full h-1.5 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer accent-primary"
                min="0" max="500">
            <div class="flex justify-between mt-2 text-xs text-muted">
                <span>$0</span>
                <span class="font-bold text-dark dark:text-white">$500</span>
            </div>
        </div>

        <!-- Promo Card -->
        <div class="bg-dark dark:bg-gray-800 rounded-3xl p-6 text-white relative overflow-hidden">
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-primary/20 rounded-full"></div>
            <h4 class="font-bold text-lg mb-2 relative z-10">Summer Sale!</h4>
            <p class="text-xs text-gray-400 mb-4 relative z-10">Up to 40% off on all home decor items.</p>
            <a href="#" class="text-primary text-sm font-bold flex items-center gap-2 hover:gap-3 transition-all">Shop
                Now <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>

    <!-- Product Grid -->
    <div class="col-span-1 lg:col-span-9">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <!-- Product 1 -->
            @forelse($products as $product)
                <div wire:key="{{ $product->id }}"
                    class="group product-card-hover bg-white dark:bg-dark rounded-3xl p-4 shadow-sm hover:shadow-xl transition-all duration-300">
                    <div class="relative h-64 overflow-hidden rounded-2xl mb-4">
                        <!-- <span
                                     class="absolute top-3 left-3 bg-primary text-white text-[10px] font-bold px-3 py-1 rounded-full z-10">NEW</span> -->
                        <img src="{{ $product->image }}"
                            class="product-img w-full h-full object-cover transition-transform duration-500">
                        <button
                            class="absolute bottom-3 right-3 w-10 h-10 bg-white/90 dark:bg-gray-800/90 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity translate-y-2 group-hover:translate-y-0 duration-300">
                            <i class="bi bi-heart text-dark dark:text-white"></i>
                        </button>
                    </div>
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <p class="text-[10px] text-muted uppercase font-bold tracking-wider mb-1">
                                {{ $product->category->name }}
                            </p>
                            <h3 class="font-bold text-sm dark:text-white">{{ $product->name }}</h3>
                        </div>
                        <span class="text-primary font-bold">${{ number_format($product->price, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <button class="text-xs font-bold text-muted hover:text-dark dark:hover:text-white transition">
                            Available Stock
                            ({{ $product->stock->quantity - ($product->cart->sum('quantity') ?? 0) }})
                        </button>
                        <button wire:click="addToCart({{ $product->id }})"
                            class="w-8 h-8 bg-primary rounded-full text-white flex items-center justify-center shadow-lg shadow-primary/20 hover:scale-110 transition"><i
                                class="bi bi-plus-lg"></i></button>
                    </div>
                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-20 text-center">
                    <div class="w-20 h-20 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mb-4">
                        <i class="bi bi-search text-3xl text-muted"></i>
                    </div>
                    <h3 class="text-lg font-bold text-dark dark:text-white">No products found</h3>
                    <p class="text-muted text-sm max-w-xs mt-2">We couldn't find any products matching your current filters.
                        Try adjusting your criteria.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <!-- <div class="flex justify-center mt-12 gap-2">
            <button
                class="w-10 h-10 rounded-full bg-white dark:bg-gray-800 shadow-sm flex items-center justify-center hover:bg-primary hover:text-white transition"><i
                    class="bi bi-chevron-left"></i></button>
            <button
                class="w-10 h-10 rounded-full bg-primary text-white shadow-lg flex items-center justify-center font-bold">1</button>
            <button
                class="w-10 h-10 rounded-full bg-white dark:bg-gray-800 shadow-sm flex items-center justify-center hover:bg-primary hover:text-white transition font-bold">2</button>
            <button
                class="w-10 h-10 rounded-full bg-white dark:bg-gray-800 shadow-sm flex items-center justify-center hover:bg-primary hover:text-white transition"><i
                    class="bi bi-chevron-right"></i></button>
        </div> -->
    </div>
</div>