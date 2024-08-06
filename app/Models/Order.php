<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    private $primaryKey='order_id';
    protected $keyType = 'bigint'; // or 'int' if using integer

    // If the primary key is not auto-incrementing, specify it
    public $incrementing = true;
    
    protected $fillable=[
        'customer_id',
        'product_id',
        'unit_price',
        'quantity',
        'status',
        'ordered_date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','customer_id');

    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');

    }
}
