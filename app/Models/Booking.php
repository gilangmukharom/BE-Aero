<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'product_id', 
        'passenger_name', 
        'contact_name', 
        'gender',
        'contact_email'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

?>