<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Cart extends Component
{
    public function removeItem($id)
    {
        $cart = \App\Models\Cart::find($id);
        $cart->delete();

        $this->dispatch('show-toast', message: 'Item removed from cart successfully!');
        $this->dispatch('cart-updated');
    }

    public function increasePrice($id)
    {
        $cart = \App\Models\Cart::find($id);

        // Validate Stock Availability
        if ($cart->product->stock->quantity < $cart->quantity + 1) {
            $this->dispatch('show-toast', message: 'Stock is not available!');
            return;
        }

        $cart->quantity++;
        $cart->price = $cart->quantity * $cart->product->price;
        $cart->save();

        $this->dispatch('show-toast', message: 'Item price increased successfully!');
        $this->dispatch('cart-updated');
    }

    public function decreasePrice($id)
    {
        $cart = \App\Models\Cart::find($id);

        if ($cart->quantity > 1) {
            $cart->quantity--;
            $cart->price = $cart->quantity * $cart->product->price;
            $cart->save();

            $this->dispatch('show-toast', message: 'Item price decreased successfully!');
            $this->dispatch('cart-updated');
        } else {
            $this->dispatch('show-toast', message: 'Item price cannot be zero (0)!');
        }
    }

    public function render()
    {
        return view('livewire.cart')->with([
            'cart' => auth()->user()->mineCart,
            'products' => Product::all(),
        ]);
    }
}
