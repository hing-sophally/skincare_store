<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'name', 'product_id', 'type', 'amount', 'start_date', 'end_date', 'active'
    ];

    // In app/Models/Discount.php
    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
