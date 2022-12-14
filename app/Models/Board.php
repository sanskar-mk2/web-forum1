<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'banner',
    ];

    public function getBannerAttribute($value)
    {
        if (str_starts_with($value, 'http')) {
            return $value;
        } else {
            return asset('storage/' . $value);
        }
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
