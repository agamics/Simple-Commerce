<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class ProductView extends Component
{
    public $products;
    public $categories;
    public $cart;

    public function addToCart($id)
    {
        $cart = auth()->user()->mineCart->where('product_id', $id)->first();

        $product = Product::find($id);
        if ($cart) {
            $quantity = $cart->quantity + 1;
            $cart->update([
                'quantity' => $quantity,
                'price' => $product->price * $quantity,
            ]);
            $this->dispatch('show-toast', message: 'Product\'s price updated successfully!');
        } else {
            $cart = Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
            ]);
            $this->dispatch('show-toast', message: 'Product added to cart successfully!');
        }

        $this->dispatch('cart-updated');
    }

    public function mount()
    {
        $this->products = Product::get();
        $this->categories = Category::get();
    }

    public function render()
    {
        return view('livewire.product-view', [
            'products' => $this->products,
            'categories' => $this->categories,
            'cart' => auth()->user()->mineCart,
            'seletedCateg' => 0
        ]);
    }
}
