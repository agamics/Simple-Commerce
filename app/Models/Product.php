<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'category_id',
    ];

    public function addToCart($c)
    {
        $cart = Cart::where('product_id', $c)->first();
        if ($cart) {
            $cart->quantity++;
            $cart->save();
        } else {
            $product = Product::find($c);
            Cart::create([
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
                'total' => $product->price,
            ]);
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function stock()
    {
        return $this->hasOne(Inventory::class);
    }
}
