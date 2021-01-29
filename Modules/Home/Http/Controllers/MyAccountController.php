<?php

namespace Modules\Home\Http\Controllers;

use App\Category;
use App\Components\Recusive;
use App\Order;
use App\Products;
use App\Role;
use App\Slider;
use App\Transactions;
use App\User_guest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class MyAccountController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function profile()
    {
        $transactions = Transactions::where('user_id',auth()->user()->id)->paginate(10);
//        dd($transactions);
        return view('home::homes.my_account.profile',
        array(
            'title' => 'My Account',
            'transactions' => $transactions,
        )
        );
    }
    public function profileEdit(Request $request, $id)
    {
//        dd($request->all());
        try {
            DB::beginTransaction();
            User_guest::find($id)->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'province_city' => $request->province_city,
                'district' => $request->district,
                'village' => $request->village,
                'hamlet' => $request->hamlet,
            ]);
            DB::commit();
            toastr()->success('Chúng mừng bạn đã chỉnh sửa thông tin thành công', 'Lưu thành công');
            return redirect()->route('home.profile');
        } catch (\Exception $exception) {
            DB::rollBack();
            toastr()->error('Lỗi không lưu được', 'Không thành công');
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());

        }
//        toastr()->success('Chúng mừng bạn đã tạo tài khoản thành công', 'Đăng ký thành công');
//        return redirect()->route('home.index');
    }


    public function order_history($id)
    {
        $transactions = Transactions::where('id',$id)->first();
        $order = Order::where('transaction_id',$id)->get();
//        dd($order);
        return view('home::homes.my_account.order_history',
            array(
                'title' => 'Lịch sử đơn hàng chi tiết',
                'transactions' => $transactions,
                'order' => $order,
            )
        );
    }
}
