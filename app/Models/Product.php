<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private $primaryKey='product_id';
    protected $keyType='bigint';

    // If the primary key is not auto-incrementing, specify it
    public $incrementing = true;

    protected $fillable=[
        'artisan_id',
        'product_name',
        'description',
        'image',
        'price',
        'stock_quantity',
        'category_id',
    ];

      // If the image column needs to be cast to an array
      protected $casts = [
        'image' => 'array',
    ];

    public function  catagory()
    {
        return $this->belongsTo(ProductCatagory::class,'catagory_id','catagory_id');
    }

    public function owner()
    {
        return $this->belongsTo(Artisan::class,'artisan_id','artisan_id');
        //return $this->belongsTo(Artisan::class, 'artisan_id', 'artisan_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id', 'product_id');
    }
    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'product_id', 'product_id');
    }

}
