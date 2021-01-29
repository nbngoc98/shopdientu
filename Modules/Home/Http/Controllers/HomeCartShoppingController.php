<?php

namespace Modules\Home\Http\Controllers;

use App\Category;
use App\Components\Recusive;
use App\Product_price;
use App\Products;
use App\Tag;
use App\User_guest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HomeCartShoppingController extends HomeHeaderController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $items = Cart::content();//        dd($items);

        return view('home::homes.cart.cart_shopping',
            array(
                'title' => 'Giỏ hàng',
                'items' => $items,
            )
        );
//        return view('home::homes.components.header', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
//        return view('home::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $id)
    {

        $properties = Product_price::where('product_id',$id)->where('price', $request->properties )->first();

        $product = Products::find($id);
        if ($product->amount - $product->pro_sold >0) {
            $category_name = Category::find($product->category_id);
            Cart::add([
                'id' => $id,
                'name' => $product->name,
                'price' => ( $product->price - ( $product->price* $product->pro_sale/100) ),
                'qty' => $request->quantity,
                'weight' => 1,
                'options' => [
                    'avatar_product' => $product->avata_image_path,
                    'category_name' => $category_name->name,
                    'sale' => $product->pro_sale,
                ]
            ]);
            toastr()->success('Thêm vào giỏ hàng thành công!');
            return redirect()->back();;

        }
        else {
            toastr()->error('Sản phẩm đã hết!');
            return redirect()->back();;
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('home::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('home::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        Cart::update($rowId, ['qty' => $request->quantity]); // Will update the name
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Cart::remove($id);
        toastr()->success('Xóa sảm phẩm thành công!');
        return redirect()->back();
    }
    public function deleteAll()
    {
        Cart::destroy();
        toastr()->success('Đã xóa tất cả sảm phẩm thành công!');
        return redirect()->back();
    }
}
