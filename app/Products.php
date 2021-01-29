<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }
    public function prices(){
        return $this->hasMany(Product_price::class,'product_id');
    }
    public function tags(){
        return $this
            ->belongsToMany(Tag::class, 'product__tags', 'product_id', 'tag_id')
            ->withTimestamps();
    }
    public function category()
    {
        //Quan hệ 1 - nhiều nghịch đảo
        // 1 category_id sẽ có nhiều Product_id khác nhau
        // 1 Product_id chỉ có 1 category_id
        return $this->belongsTo(Category::class,'category_id');
    }
}
