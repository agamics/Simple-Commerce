<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    <!-- Cart Items List -->
    <div class="col-span-1 lg:col-span-8 space-y-4" id="cartItemsList">

        @forelse($cart as $ct)
            <!-- Item-->
            <div wire:key="{{ $ct->id }}"
                class="cart-item-row group bg-white dark:bg-dark p-6 rounded-3xl shadow-sm flex flex-col md:flex-row items-center gap-6"
                data-price="24.00">
                <div class="w-24 h-24 flex-shrink-0">
                    <img src="{{ $ct->product->image }}" class="w-full h-full object-cover rounded-2xl">
                </div>
                <div class="flex-grow text-center md:text-left">
                    <p class="text-[10px] text-muted uppercase font-bold tracking-wider mb-1">{{ $ct->category->name }}</p>
                    <h3 class="font-bold text-lg dark:text-white mb-2">{{ $ct->product->name }}</h3>
                    <div class="flex items-center justify-center md:justify-start gap-4 text-xs text-muted">
                        <span>Available Stock: {{ $ct->product->stock->quantity - ($ct->quantity)}}</span>
                        <span class="text-green-500 flex items-center gap-1"><i class="bi bi-check2-circle"></i> In
                            Stock</span>
                    </div>
                </div>
                <div class="flex items-center gap-8 w-full md:w-auto justify-between md:justify-end">
                    <div class="flex items-center bg-gray-50 dark:bg-gray-800 rounded-full px-4 py-2">
                        <button wire:click="decreasePrice({{ $ct->id }})"
                            class="decrease-qty w-6 h-6 flex items-center justify-center hover:text-primary transition"><i
                                class="bi bi-dash"></i></button>
                        <input type="text"
                            class="quantity-input w-8 text-center bg-transparent font-bold text-sm outline-none dark:text-white"
                            value="{{ $ct->quantity }}" readonly>
                        <button wire:click="increasePrice({{ $ct->id }})"
                            class="increase-qty w-6 h-6 flex items-center justify-center hover:text-primary transition"><i
                                class="bi bi-plus"></i></button>
                    </div>
                    <div class="text-right">
                        <div class="font-bold text-xl text-dark dark:text-white mb-1">${{ number_format($ct->price, 2) }}
                        </div>
                        <button wire:click="removeItem({{ $ct->id }})"
                            class="remove-cart-item text-xs font-bold text-red-500 hover:text-red-600 transition">Remove</button>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-12">
                <div
                    class="w-20 h-20 bg-gray-50 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="bi bi-cart-x text-3xl text-muted"></i>
                </div>
                <h3 class="text-lg font-bold text-dark dark:text-white mb-2">Your cart is empty</h3>
                <p class="text-muted text-sm max-w-[250px] mx-auto">Looks like you haven't added any items to your cart yet.
                </p>
            </div>
        @endforelse

        <div class="mt-8">
            <a href="{{ route('products') }}"
                class="flex items-center gap-2 text-sm font-bold text-muted hover:text-dark dark:hover:text-white transition">
                <i class="bi bi-arrow-left"></i> Continue Shopping
            </a>
        </div>
    </div>

    <!-- Order Summary Sidebar -->
    <div class="col-span-1 lg:col-span-4">
        <div class="bg-white dark:bg-dark p-8 rounded-3xl shadow-sm sticky top-8">
            <h2 class="text-xl font-bold text-dark dark:text-white mb-6">Order Summary</h2>

            <div class="space-y-4 mb-6">
                <div class="flex justify-between text-muted text-sm">
                    <span>Subtotal</span>
                    <span
                        class="subtotal-val font-bold text-dark dark:text-white">${{ number_format($cart->sum('price'), 2) }}</span>
                </div>
                <div class="flex justify-between text-muted text-sm">
                    <span>Shipping</span>
                    <span class="text-green-500 font-bold">Free</span>
                </div>
                <div class="flex justify-between text-muted text-sm">
                    <span>Estimated Tax</span>
                    <span class="font-bold text-dark dark:text-white">$0.00</span>
                </div>
            </div>

            <div class="border-t border-gray-100 dark:border-gray-800 pt-6 mb-8 flex justify-between items-center">
                <span class="font-bold text-dark dark:text-white">Total</span>
                <span
                    class="order-total text-2xl font-black text-primary">${{ number_format($cart->sum('price'), 2) }}</span>
            </div>

            <div class="mb-8">
                <label class="block text-[10px] font-bold text-muted uppercase tracking-widest mb-3">Promo
                    Code</label>
                <div class="flex gap-2">
                    <input type="text" placeholder="Enter code" disabled
                        class="flex-grow bg-gray-50 dark:bg-gray-800 rounded-full px-6 py-3 text-sm outline-none dark:text-white">
                    <button
                        class="bg-dark dark:bg-gray-700 text-white px-6 py-3 rounded-full text-sm font-bold hover:bg-black dark:hover:bg-gray-600 transition">Apply</button>
                </div>
            </div>

            <div class="space-y-4">
                <a href="checkout.html"
                    class="block w-full bg-primary text-white text-center py-4 rounded-full font-bold text-lg shadow-lg shadow-primary/20 hover:scale-[1.02] transition-transform">Checkout
                    Now</a>
                <div class="flex justify-center gap-4 opacity-50 grayscale">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" class="h-6">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" class="h-4 mt-1">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" class="h-5">
                </div>
            </div>
        </div>
    </div>
</div>