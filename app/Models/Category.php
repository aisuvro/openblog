<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug'
    ];



    public function childCategory():HasMany
    {
        return $this->hasMany(ChildCategory::class);
    }
}
