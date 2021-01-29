<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];
    public function Products(){
        return $this
            ->belongsToMany(Products::class, 'product__tags', 'tag_id', 'product_id')
            ->withTimestamps();
    }
}
