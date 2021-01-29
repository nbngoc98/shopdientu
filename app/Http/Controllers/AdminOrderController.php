<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recusive;
use App\Order;
use App\Product_Tag;
use App\ProductImage;
use App\Products;
use App\Tag;
use App\Transactions;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    private $products;
    private $category;
    private $tag;
    private $product_Tag;
    private $productImage;
    private $order;
    private $transactions;
    public function __construct(Category $category, Products $products,Tag $tag, Product_Tag $product_Tag, ProductImage $productImage,Order $order,Transactions $transactions) //Khai báo để dùng chung dữ liệu data Category
    {
        $this ->category = $category;
        $this ->products = $products;
        $this ->tag = $tag;
        $this ->product_Tag = $product_Tag;
        $this ->productImage = $productImage;
        $this->order = $order;
        $this->transactions = $transactions;
    }
    public function getCategory($parent_id){

        $data = $this ->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryDEQUY($parent_id);
        return $htmlOption;
    }
    public function index()
    {
        $transactions = $this->transactions->paginate(9);
        return view('admin.order.index',
            array(
                'transactions' => $transactions,
            )
        );
    }
    public function check_order($id){
//        $this->transactions->find($id)->update(['status' => 1]);
        $data = $this->order->where('transaction_id', $id)->get();
        $arr = array();
        foreach ($data as $item){
            array_push($arr, $item->product_id);
        }
        $pro = $this->products->whereIn('id',$arr)->update(['pro_sold' => 1]);
        dd($arr);
        return redirect()->route('order.index');
    }
    public function view($id)
    {
        $order = $this->order->where('transaction_id', $id)->get();
        $transactions= $this->transactions->find($id)->first();
//        dd($transactions);
        return view('admin.order.view',
            array(
                'order' => $order,
                'transactions' => $transactions,
            )
        );
    }
}
