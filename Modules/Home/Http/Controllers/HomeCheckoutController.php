<?php

namespace Modules\Home\Http\Controllers;

use App\Category;
use App\Components\Recusive;
use App\Mail\OrderDetail;
use App\Mail\OrderDetailBanking;
use App\Order;
use App\Products;
use App\Tag;
use App\Transactions;
use App\User_guest;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class HomeCheckoutController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $items = Cart::content();
        return view('home::homes.checkout.checkout',
            array(
                'title' => 'Thanh toán',
                'items' => $items,
            )
        );
    }
    public function post(Request $request)
    {
        $products = Cart::content();//lấy danh sách sản phẩm từ giỏ hàng
        $total = Cart::subtotal(0,'','');
        //lưa transaction vào dattabase đồng thời lấy ra id của transaction bằng insertGetId() để dùng cho order
        $idTransaction = Transactions::insertGetId([
            'user_id' => get_data_user('web'),
            'total'   => (int)$total,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'phone' => $request->phone,
            'province_city' => $request->province_city,
            'district' => $request->district,
            'village' => $request->village,
            'hamlet' => $request->hamlet,
            'note' => $request->note,
            'created_at' => Carbon::now(),
        ]);
        //lưa order vào database
        if ($idTransaction) {

            foreach ($products as $product) {
                Order::insert([
                    'user_id' => get_data_user('web'),
                    'transaction_id' => $idTransaction,
                    'product_id'     =>$product->id,
                    'product_price'     =>$product->price,
                    'product_sale'     =>$product->options->sale,
                    'qty'            => $product->qty,
                    'created_at' => Carbon::now(),
                ]);
            }
        }
        //gửi thông tin sản phẩm qua email
        //lấy địa chi email của khách hàng
        $email = $request->email;
        $data = [
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'phone' => $request->phone,
            'province_city' => $request->province_city,
            'district' => $request->district,
            'village' => $request->village,
            'hamlet' => $request->hamlet,
            'note' => $request->note,
        ];
        //phone và address là data user có thể thay đổi
        if ($request->method_pay == 1) {
            Mail::to($email)->send(new OrderDetailBanking($products,$data));
        }else {
            Mail::to($email)->send(new OrderDetail($products,$data));
        }

        Cart::destroy();
        toastr()->success('Đặt hàng thành công, mời bạn kiểm tra email để xem chi tiết đơn hàng');
        return redirect()->route('home.index');
    }
}
