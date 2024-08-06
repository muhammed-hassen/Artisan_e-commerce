<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    // Define the primary key and its type
    protected $primaryKey = 'cart_item_id';
    protected $keyType = 'bigint'; // or 'int' if using integer

    // If the primary key is not auto-incrementing, specify it
    public $incrementing = true;

    // Define the fillable attributes
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
    ];
    /**
     * Define the relationship to the ShoppingCart model.
     */
    public function shoppingCart()
    {
        return $this->belongsTo(ShoopingCart::class, 'cart_id', 'cart_id');
    }

    /**
     * Define the relationship to the Product model.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
