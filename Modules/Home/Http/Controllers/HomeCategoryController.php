<?php

namespace Modules\Home\Http\Controllers;

use App\Category;
use App\Components\Recusive;
use App\Products;
use App\Tag;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeCategoryController extends HomeHeaderController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function product_list(Request $request, $category_slug1, $category_slug2, $category_slug3,  $category_id){

        //URL
        $data_cate1 = Category::where('slug', $category_slug1)->first();
        $data_cate2 = Category::where('slug', $category_slug2)->first();
        $data_cate3 = Category::where('slug', $category_slug3)->first();
//        dd($data_cate2);

        $price_min = 0;
        $price_max =40000000;

        //lọc theo
        $sortBy = 'id';
        $sortOrder = 'asc';
        $filter_sort = request('filter_sort') ?? '';
        $filterArr = [
            'price_desc' => ['price', 'desc'],
            'price_asc' => ['price', 'asc'],
            'id_desc' => ['id', 'desc'],
            'id_asc' => ['id', 'asc'],
        ];
        if (array_key_exists($filter_sort, $filterArr)) {
            $sortBy = $filterArr[$filter_sort][0];
            $sortOrder = $filterArr[$filter_sort][1];
        }

//        //Show data id category
//        $dataParentCategory = Category::where('id', $category_id)->first();

        //Category level 1
        // lấy ra các ID category con bằng cách truy vấn có cùng parent_id
        $data = Category::where('parent_id', $category_id)->get();
        $recusive = new Recusive($data);
        $parent_id = $recusive->categoryDEQUYleve1($category_id);

        //Show ra tất cả các danh mục con
        $listProductTypes = Category::whereIn('id', $parent_id)->get();

        //DANH MUC CON LEVEL2
        if (strlen($category_slug3) > 2) {

            // số lượng sản phẩm
            $products_count = Products::where('category_id', $category_id)
                ->where('status','>', 0)
                ->get()
                ->count();
//            dd($products_count);

            $listProductTypes = '';
            if(($request->min_price && $request->max_price) || $request->min_price || $request->max_price)
            {
                //  tùy chọn lọc
                $products = Products::where('category_id', $category_id)
                    ->where('status','>', 0)
                    ->whereBetween('price',[$request->min_price,$request->max_price])
                    ->orderBy($sortBy, $sortOrder)
                    ->paginate(9);
//                    dd($products);
            }else{
                $products = Products::where('category_id', $category_id)
                    ->where('status','>', 0)
                    ->orderBy($sortBy, $sortOrder)
                    ->paginate(9);
            }
        }
        //DANH MUC CON LEVEL1
        if (strlen($category_slug3) == 2) {

            // số lượng sản phẩm
            $products_count = Products::where('category_id', $category_id)
                ->where('status','>', 0)
                ->get()
                ->count();

            // hiện thị theo loại danh mục
            if ($request->parent_id) {
                if(($request->min_price && $request->max_price) || $request->min_price || $request->max_price)
                {
                    //tùy chọn lọc
                    $products = Products::where('category_id', $request->parent_id)
                        ->where('status','>', 0)
                        ->whereBetween('price',[$request->min_price,$request->max_price])
                        ->orderBy($sortBy, $sortOrder)
                        ->paginate(9);
//                    dd($products);
                }else{
                    $products = Products::where('category_id', $request->parent_id)
                        ->where('status','>', 0)
                        ->orderBy($sortBy, $sortOrder)
                        ->paginate(9);
                }
            }else {
                if(($request->min_price && $request->max_price) || $request->min_price || $request->max_price)
                {
                    // tùy chọn lọc
                    $products = Products::whereIn('category_id', $parent_id)
                        ->where('status','>', 0)
                        ->whereBetween('price',[$request->min_price,$request->max_price])
                        ->orderBy($sortBy, $sortOrder)
                        ->paginate(9);
                }else{
                    //Hiện thị theo tags
                    if ($request->tag_id) {
                        $tag_data = Tag::find($request->tag_id);
                        $arr_id_Products = array();
                        foreach ($tag_data->Products as $pro){
                            $id_pro = $pro->id;
                            array_push($arr_id_Products, $id_pro);
                        }
//                        dd($arr_id_Products);
                        $products =Products::whereIn('id', $arr_id_Products)
                            ->where('status','>', 0)
                            ->orderBy($sortBy, $sortOrder)
                            ->paginate(9);
                    }else{
                        $products =Products::whereIn('category_id', $parent_id)
                            ->where('status','>', 0)
                            ->orderBy($sortBy, $sortOrder)
                            ->paginate(9);
                    }
                }
            }
        }
        /*DANH MUC CHA*/
        if (strlen($category_slug2) == 1) {

            // số lượng sản phẩm
            $products_count = Products::where('category_id', $category_id)
                ->where('status','>', 0)
                ->get()
                ->count();

            //Category level 2
            // lấy ra các ID category con bằng cách truy vấn có cùng parent_id ở Level 1
            $data2 = Category::whereIn('parent_id', $parent_id)->get();
            $recusive2 = new Recusive($data2);
            $parent_id2 = $recusive2->categoryDEQUYleve2($parent_id);


            //lọc sản phẩm theo loại
            if ($request->parent_id) {
                // lấy ra các id của thương hiệu chọn
                $cate = Category::where('parent_id', $request->parent_id)->get();
                $recusive_request = new Recusive($cate);
                $cate_id_request = $recusive_request->categoryDEQUYleve1($cate);
//                dd($cate_id);

                //lọc sản phẩm theo giá cả
                if(($request->min_price && $request->max_price) || $request->min_price || $request->max_price)
                {
                    // tùy chọn lọc giá cả
                    $products = Products::whereIn('category_id', $cate_id_request)
                        ->where('status','>', 0)
                        ->whereBetween('price',[$request->min_price,$request->max_price])
                        ->orderBy($sortBy, $sortOrder)
                        ->paginate(9);
//                    dd($products);
                }else{
                    $products = Products::whereIn('category_id', $cate_id_request)
                        ->where('status','>', 0)
                        ->orderBy($sortBy, $sortOrder)
                        ->paginate(9);
//                    dd($products);
                }

            }else {

                if(($request->min_price && $request->max_price) || $request->min_price || $request->max_price)
                {
                    // tùy chọn lọc giá cả
                    $products = Products::whereIn('category_id', $parent_id2)
                        ->where('status','>', 0)
                        ->whereBetween('price',[$request->min_price,$request->max_price])
                        ->orderBy($sortBy, $sortOrder)
                        ->paginate(9);
                }else{
                    //Hiện thị theo tags
                    if ($request->tag_id) {
                        $tag_data = Tag::find($request->tag_id);
                        $arr_id_Products = array();
                        foreach ($tag_data->Products as $pro){
                            $id_pro = $pro->id;
                            array_push($arr_id_Products, $id_pro);
                        }
//                        dd($arr_id_Products);
                        $products = Products::whereIn('id', $arr_id_Products)
                            ->where('status','>', 0)
                            ->orderBy($sortBy, $sortOrder)
                            ->paginate(9);
                    }else{
                        $products = Products::whereIn('category_id', $parent_id2)
                            ->where('status','>', 0)
                            ->orderBy($sortBy, $sortOrder)
                            ->paginate(9);
                    }
                }
            }

        }

        return view('home::homes.list_product.list_product',
            array(
                'title' => 'Product List',
                'products' => $products,
                'filter_sort' => $filter_sort,
                'listProductTypes' => $listProductTypes,
                'products_count' => $products_count,
                'discriminate' => strlen($category_slug2),
                'discriminate2' => strlen($category_slug3),
                'price_min' => $price_min,
                'price_max' => $price_max,
                'data_cate1' => $data_cate1,
                'data_cate2' => $data_cate2,
                'data_cate3' => $data_cate3,
            )
        );
    }


}
