<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

     // Define the primary key and its type
     protected $primaryKey = 'customer_id';
     protected $keyType = 'bigint'; // or 'int' if using integer
         // If the primary key is not auto-incrementing, specify it
    public $incrementing = false;

    protected $fillable=[

    ];
     // If the interests column needs to be cast to an array
     protected $casts = [
        'interests' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'customer_id','user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'customer_id','customer_id');
    }

    public function shoopingcart()
    {
        return $this->hasOne(ShoopingCart::class,'customer_id','customer_id');
    }
}

