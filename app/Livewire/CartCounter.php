<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class CartCounter extends Component
{
    #[On('cart-updated')]
    public function render()
    {
        $count = auth()->check() ? auth()->user()->mineCart()->count() : 0;
        return view('livewire.cart-counter', compact('count'));
    }
}
