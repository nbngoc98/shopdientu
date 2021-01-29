<?php

namespace Modules\Home\Http\Controllers;

use App\Category;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Product_price;
use App\Product_Tag;
use App\ProductImage;
use App\Products;
use App\Ratings;
use App\Services\ProccessViewService;
use App\Tag;
use App\Traits\StorageImageTrait;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class HomeProductController extends HomeHeaderController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function product_detail($id){

        $products = Products::find($id);


        $cate= Category::where('id', $products->category_id)->first();
        $brand= Category::where('id', $cate->parent_id)->first();


        // lấy ra ID parent_id
        $data = Category::where('id', $products->category_id)->first();
        $data_cate = Category::where('id', $data->parent_id)->first();
        $data_cate_parent = Category::where('id', $data_cate->parent_id)->first();

        // lấy ra các ID category con bằng cách truy vấn có cùng parent_id
        $data = Category::where('parent_id', $data_cate_parent->id)->get();
        $recusive = new Recusive($data);
        $parent_id = $recusive->categoryDEQUYleve1($data_cate_parent->id);

        //Show ra tất cả các danh mục con
        $listProductTypes = Category::whereIn('id', $parent_id)->get();

        // Các sản phẩm liên quan
        $related_product = Products::where('category_id', $products->category_id)
            ->paginate(9);
        // Các sản phẩm sale
        $sale_product = Products::where('category_id', $products->category_id)
            ->where('pro_sale','>', 0)
            ->paginate(9);
//        dd($sale_product);
        //Show đánh giá
        $ratings = Ratings::where('product_id', $id)->get();

        //tính lượt xem của sản phẩm
        ProccessViewService::view('products','pro_view','product',$id);
//        if ($id) {
//            $getDetailProduct = Product::where('pro_active',Product::STATUS_PUBLIC)->find($id);
//            $category = Category::find($getDetailProduct->pro_category_id);
//        }
//dd($ratings);
        return view('home::homes.product_detail.index',
            array(
                'title' => $products->name,
                'products' => $products,
                'brand'=> $brand,
                'listProductTypes' =>$listProductTypes,
                'name_cate_parent' => $data_cate_parent,
                'name_cate' => $data_cate,
                'sale_product' => $sale_product,
                'related_product' => $related_product,
                'ratings' => $ratings,
            )
        );
    }

}
