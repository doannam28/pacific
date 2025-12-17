<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
    protected $fillable = [];
    protected $table = 'tags';
    public function products()
    {
        return $this->belongsToMany(Post::class, 'product_tag', 'tag_id', 'product_id');
    }
}

