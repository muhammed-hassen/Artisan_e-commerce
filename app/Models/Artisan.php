<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artisan extends Model
{
    use HasFactory;

    // Define the primary key and its type
    protected $primaryKey = 'artisan_id';
    protected $keyType = 'bigint'; // or 'int' if using integer
        // If the primary key is not auto-incrementing, specify it
   public $incrementing = false;

    // If the interests column needs to be cast to an array
    protected $casts = [
        'specialization' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'artisan_id','user_id');
    }
    public function proucts()  
    {
        return $this->hasMany(Product::class,'artisan_id','artisan_id');
        
    }
    public function notfications()
    {
        return $this->hasMany(Notification::class,'artisan_id','artisan_id');
    }
}
