<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'image_url',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the full image URL.
     */
    public function getFullImageUrlAttribute()
    {
        if ($this->image_url) {
            // If it's already a full URL, return as is
            if (filter_var($this->image_url, FILTER_VALIDATE_URL)) {
                return $this->image_url;
            }
            // If it's a relative path, make it a full URL
            return asset('storage/' . $this->image_url);
        }
        return asset('images/no-image.png'); // fallback image
    }
}
