<?php

namespace App\Models;

class Product extends BaseModel
{
    const STATUS_ACTIVE = 1;

    protected $fillable = [
        'title',
        //'date_create',
        //'position',
        'content',
        'images',
        'meta',
        'slug',
    ];

    public function category()
    {
        return $this->belongsTo(TaxonomyItem::class, 'parent_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id');
    }
    public function votes()
    {
        return $this->hasMany(Vote::class, 'product_id');
    }
}
