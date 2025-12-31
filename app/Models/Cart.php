<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id',
        'quantity',
        'price',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function category()
    {
        return $this->hasOneThrough(
            Category::class,
            Product::class,
            'id', // Foreign key on the products table...
            'id', // Foreign key on the categories table...
            'product_id', // Local key on the carts table...
            'category_id' // Local key on the products table...
        );
    }
}