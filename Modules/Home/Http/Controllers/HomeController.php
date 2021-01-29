<?php

namespace Modules\Home\Http\Controllers;

use App\Tag;
use App\User_guest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Category;
use App\Components\Recusive;
use App\Products;
use App\Role;
use App\Slider;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class HomeController extends HomeHeaderController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $sliders = Slider::get();
//        $pro_sales = $this->products->latest()->get();


        // lấy ra các id category của điện thoai
        $data_phone = Category::where('slug', 'dien-thoai')->first();
        $data_phone2 = Category::where('parent_id', $data_phone->id)->get();
        $recusive_phone2 = new Recusive($data_phone2);
        $category_phone_hot2 = $recusive_phone2->categoryDEQUYleve1($data_phone->id);
        $data_phone3 = Category::whereIn('parent_id', $category_phone_hot2)->get();
        $recusive_phone3 = new Recusive($data_phone3);
        $category_phone_hot3 = $recusive_phone3->categoryDEQUYleve1($category_phone_hot2);
//        dd($category_hot3);

        // lấy danh sách các product tương ứng của dienthoai
        $dienthoai = Products::whereIn('category_id', $category_phone_hot3)
            ->where('status', '>', 0)
            ->where('pro_hot', '=', 1)
            ->limit(6)
            ->get();
//        dd($products);

        // lấy ra các id category của lapptop
        $data_lapptop = Category::where('slug', 'lapptop')->first();
        $data_lapptop2 = Category::where('parent_id', $data_lapptop->id)->get();
        $recusive_lapptop2 = new Recusive($data_lapptop2);
        $category_lapptop_hot2 = $recusive_lapptop2->categoryDEQUYleve1($data_lapptop->id);
        $data_lapptop3 = Category::whereIn('parent_id', $category_lapptop_hot2)->get();
        $recusive_lapptop3 = new Recusive($data_lapptop3);
        $category_lapptop_hot3 = $recusive_lapptop3->categoryDEQUYleve1($category_lapptop_hot2);
//        dd($category_hot3);

        // lấy danh sách các product tương ứng của laptop
        $lapptop = Products::whereIn('category_id', $category_lapptop_hot3)
            ->where('status', '>', 0)
            ->where('pro_hot', '=', 1)
            ->limit(6)
            ->get();
//        dd($category_lapptop_hot3);

        // lấy ra các id category của clock
        $data_clock = Category::where('slug', 'dong-ho')->first();
        $data_clock2 = Category::where('parent_id', $data_clock->id)->get();
        $recusive_clock2 = new Recusive($data_clock2);
        $category_clock_hot2 = $recusive_clock2->categoryDEQUYleve1($data_clock->id);
        $data_clock3 = Category::whereIn('parent_id', $category_clock_hot2)->get();
        $recusive_clock3 = new Recusive($data_clock3);
        $category_clock_hot3 = $recusive_clock3->categoryDEQUYleve1($category_clock_hot2);


        // lấy danh sách các product tương ứng của laptop
        $clock = Products::whereIn('category_id', $category_clock_hot3)
            ->where('status', '>', 0)
            ->where('pro_hot', '=', 1)
            ->limit(6)
            ->get();
//        dd($clock);





        return view('home::index',
            array(
                'sliders' => $sliders,
                'dienthoai' => $dienthoai,
                'clock' => $clock,
                'lapptop' => $lapptop
            )
        );
    }


    public function getLogin(){
        return view('home::homes.login',
            array(
                'title' => 'Login',
            )
        );
    }



    public function register_view(){
        return view('home::homes.register',
            array(
                'title' => 'Đăng ký',
            )
        );
    }


    public function register(Request $request){
        if ($request->password === $request->confirm_password){
            User_guest::create([
                'firstname' => $request->first_name,
                'lastname' => $request->last_name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            toastr()->success('Chúng mừng bạn đã tạo tài khoản thành công', 'Đăng ký thành công');
            return redirect()->route('home.index');
        }
        return back()->with('errors', 'Mật khẩu không khớp mời nhập lại');

    }



    public function postLogin(Request $request){
        // Check role guest

        $users = User_guest::where('email', '=', $request->email)->first();
        if ($users) {
            $credentials = $request->only(['email', 'password']);
            $remember = $request->has('remember_login_home')?true:false;
            if (Auth::attempt($credentials,$remember)) {
                toastr()->success('Đăng nhập thành công, Chào mừng bạn đến với website của chúng tôi');
                return redirect()->route('home.index');
            }else{
                toastr()->error('Mật khẩu hoặc tài khoản bị sai, mời nhập lại');
                return redirect()->route('home.getlogin');
            }
        }else{
            toastr()->error('Email chưa đăng ký');
            return redirect()->route('home.getlogin');
        }

    }


    public function logout()
    {
        auth()->logout();
        toastr()->success('Đăng xuất tài khoản thành công');
        return redirect()->route('home.index');
    }



    public function search(Request $request){

        $keyword = request('keyword');
        $category_id = request('category');
        $price_min = 0;
        $price_max =70000000;

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
//        $dataParentCategory = $this ->category->where('id', $category_id)->first();
//        dd($category_id);
        //Category level 1
        // lấy ra các ID category con bằng cách truy vấn có cùng parent_id
        $data =Category::where('parent_id', $category_id)->get();
        $recusive = new Recusive($data);
        $parent_id = $recusive->categoryDEQUYleve1($category_id);

        //Show ra tất cả các danh mục con
        $listProductTypes = Category::whereIn('id', $parent_id)->get();

        // lấy ra các ID category con bằng cách truy vấn có cùng parent_id ở Level 1
        $data2 = Category::whereIn('parent_id', $parent_id)->get();
        $recusive2 = new Recusive($data2);
        $parent_id2 = $recusive2->categoryDEQUYleve2($parent_id);



        if ($category_id) {


            // số lượng sản phẩm
            $products_count = Products::where('category_id', $category_id)
                ->where('status','>', 0)
                ->get()
                ->count();

            //lọc sản phẩm theo loại
            if ($request->parent_id) {
                // lấy ra các id của thương hiệu chọn
                $cate = Category::where('parent_id', $request->parent_id)->get();
                $recusive_request = new Recusive($cate);
                $cate_id_request = $recusive_request->categoryDEQUYleve1($cate);
//                dd($cate_id);

                //lọc sản phẩm theo giá cả
                if (($request->min_price && $request->max_price) || $request->min_price || $request->max_price) {
                    // tùy chọn lọc giá cả
                    $products = Products::whereIn('category_id', $cate_id_request)
                        ->where('status', '>', 0)
                        ->whereBetween('price', [$request->min_price, $request->max_price])
                        ->where('name', 'like', $keyword . '%')
                        ->orderBy($sortBy, $sortOrder)
                        ->paginate(9);
//                    dd($products);
                } else {
                    $products = Products::whereIn('category_id', $cate_id_request)
                        ->where('status', '>', 0)
                        ->where('name', 'like', $keyword . '%')
                        ->orderBy($sortBy, $sortOrder)
                        ->paginate(9);
//                    dd($products);
                }

            } else {

                if (($request->min_price && $request->max_price) || $request->min_price || $request->max_price) {
                    // tùy chọn lọc giá cả
                    $products = Products::whereIn('category_id', $parent_id2)
                        ->where('status', '>', 0)
                        ->whereBetween('price', [$request->min_price, $request->max_price])
                        ->where('name', 'like', $keyword . '%')
                        ->orderBy($sortBy, $sortOrder)
                        ->paginate(9);
                } else {
                    //Hiện thị theo tags
                    if ($request->tag_id) {
                        $tag_data = Tag::find($request->tag_id);
                        $arr_id_Products = array();
                        foreach ($tag_data->Products as $pro) {
                            $id_pro = $pro->id;
                            array_push($arr_id_Products, $id_pro);
                        }
//                        dd($arr_id_Products);
                        $products = Products::whereIn('id', $arr_id_Products)
                            ->where('status', '>', 0)->where('name', 'like', $keyword . '%')
                            ->orderBy($sortBy, $sortOrder)
                            ->paginate(9);
                    } else {
                        $products = Products::whereIn('category_id', $parent_id2)
                            ->where('status', '>', 0)
                            ->where('name', 'like', $keyword . '%')
                            ->orderBy($sortBy, $sortOrder)
                            ->paginate(9);
                    }
                }
            }
        }else{

            // số lượng sản phẩm
            $products_count = Products::where('status','>', 0)
                ->get()
                ->count();

            $products = Products::where('status','>', 0)
                ->where('name', 'like', $keyword.'%')
                ->orderBy($sortBy, $sortOrder)
                ->paginate(9);
//            dd($products);
        }

        return view('home::homes.list_product.list_product',
            array(
                'title' => 'Product List',
                'products' => $products,
                'filter_sort' => $filter_sort,
                'listProductTypes' => $listProductTypes,
                'products_count' => $products_count,
                'discriminate' => '',
                'discriminate2' => '',
                'price_min' => $price_min,
                'price_max' => $price_max,
            )
        );
    }


}

