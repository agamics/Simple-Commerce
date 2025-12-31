<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Http\Request;

class CategoryView extends Component
{
    public $id;
    public $categories;

    public function addToCart($id)
    {
        $cart = Cart::where('user_id', auth()->user()->id)->first();
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

    public function mount(Request $io)
    {
        $this->id = $io->id;
        $this->categories = Category::get();
    }

    public function render()
    {
        $category = Category::all();
        $products = Product::where('category_id', $this->id)->get();
        return view('livewire.product-view')->with([
            'products' => $products,
            'categories' => $category,
            'seletedCateg' => $this->id
        ]);
    }
}
