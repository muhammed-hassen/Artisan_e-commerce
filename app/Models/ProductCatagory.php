<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCatagory extends Model
{
    use HasFactory;

    private $primaryKey='category_id';
    protected $keyType='bigint';

    public $incrementing=True;

    protected $fillable=[
        'category_name',

    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'catagory_id', 'catagory_id');
    }
}
