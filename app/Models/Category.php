<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public static function generateUniqueSlug(string $name) {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        while (self::where('slug', $slug)->exists()){
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}