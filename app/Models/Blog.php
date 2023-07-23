<?php

namespace App\Models;


use App\Models\ChildCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'featured_image',
        'image_caption',
        'is_published',
    ];

    public function ShortDescription():Attribute
    {
        return new Attribute(
            get: fn() => substr($this->description, 0, 150)
        );
    }

    public function ChildCategories():BelongsToMany
    {
        return $this->belongsToMany(ChildCategory::class);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];
}
