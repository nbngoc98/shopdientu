<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
//    protected $table = 'categories';
//    protected $primaryKey = 'id';
//    protected $guarded = []; những thuộc tính ko đc insert

// Chạy lệnh php artisan make:model Category -m    -> tử đông hiểu khai báo $table

    // Update date Delete
    use SoftDeletes;
    protected $fillable =['name', 'parent_id','slug']; // Khai báo nhứng biến muốn thêm vào
    public function categoryChildrent(){
        return $this->hasMany(Category::class,'parent_id');
    }
    public function products()
    {
        //Quan hệ 1 - nhiều nghịch đảo
        // 1 category_id sẽ có nhiều Product_id khác nhau
        // 1 Product_id chỉ có 1 category_id
        return $this->belongsTo(Products::class,'category_id');
    }
}
