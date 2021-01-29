<?php

namespace App\Http\Controllers;

use App\Products;
use App\Ratings;
use App\Role;
use App\Transactions;
use App\User;
use App\User_guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    private $user;
    private $role;
    private $ratings;
    private $user_guest;
    private $products;
    private $transactions;
    public function __construct(User $user, Role $role,Ratings $ratings, User_guest $user_guest, Products $products, Transactions $transactions)
    {
        $this->user = $user;
        $this->role = $role;
        $this ->ratings = $ratings;
        $this ->user_guest = $user_guest;
        $this ->products = $products;
        $this->transactions = $transactions;
    }
    public function index(){
        $transactions = $this->transactions->paginate(9);
        $review = $this ->ratings->get();
        $pro = $this ->products->get();
        $user_guest = $this ->user_guest->get();
        $users = $this->user_guest->paginate(6);
        $doanhthu = $this->transactions->where('status', '=', 1)->sum('total');

        if (Auth::guard('admin-web')->check()) {
            return view('admin',
                array(
                    'review' => count($review),
                    'pro' => count($pro),
                    'user_guest' => $user_guest,
                    'transactions' => $transactions,
                    'users' => $users,
                    'doanhthu' => $doanhthu,
                )
            );
        }else{
            return view('admin.login');
        }
    }
    public function loginAdmin(){

        if (Auth::guard('admin-web')->check()) {
            return redirect()->to('admin');
        }
        return view('admin.login');
    }
    public function logoutAdmin()
    {
        Auth::guard('admin-web')->logout();
        return redirect()->route('admin.login');
    }
    public function postloginAdmin(Request $request){
        // Check role guest
        $users = $this->user->where('email', '=', $request->email)->first();
        if ($users) {
            $rolesOfUser = $users->roles;
            foreach ($rolesOfUser as $item){
                if ($item ->name === 'guest') {
                    abort(403);
                }
                $remember = $request->has('remember_login')?true:false;
                if (Auth::guard('admin-web')->attempt([
                    'email' => $request->email,
                    'password' => $request->password
                ],$remember)) {
                    Session::put('success','Đăng nhập thành công, Chào mừng bạn đến với trang quản trị ADMIN');
                    return redirect()->to('admin');
                }else{
                    Session::put('errors','Mật khẩu hoặc tài khoản bị sai, mời nhập lại');
                    return redirect()->route('admin.login');
                }
            }
        }else{
            Session::put('errors','Email chưa đăng ký');
            return redirect()->route('admin.login');
        }



    }

}
