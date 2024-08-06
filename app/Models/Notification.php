<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    // Define the primary key and its type
    protected $primaryKey = 'notification_id';
    protected $keyType = 'bigint'; // or 'int' if using integer

    // If the primary key is not auto-incrementing, specify it
    public $incrementing = true;

    // Define the fillable attributes
    protected $fillable = [
        'artisan_id',
        'message',
        'is_read',
    ];

    // Define the cast for the is_read attribute
    protected $casts = [
        'is_read' => 'boolean',
    ];

    /**
     * Define the relationship to the Artisan model.
     */
    public function artisan()
    {
        return $this->belongsTo(Artisan::class, 'artisan_id', 'artisan_id');
    }
}
