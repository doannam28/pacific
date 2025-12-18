<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model {
    protected $fillable = [];
    protected $table = 'votes';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

