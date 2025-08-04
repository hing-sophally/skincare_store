<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SkincareTip extends Model
{
    protected $fillable = [
        'title',
        'tip_content',
        'author_name',
        'question',
        'date',
    ];
    protected $dates = [
        'date', // Cast the date field to Carbon instance
        'created_at',
        'updated_at',
    ];
    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }
}
