<?php

namespace Modules\Home\Http\Controllers;

use App\Category;
use App\Components\Recusive;
use App\Products;
use App\Setting;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

class HomeHeaderController extends Controller
{

    public function __construct()
    {

        $categories = Category::where('parent_id', 0)->limit(5)->get();
        View::share('categories', $categories);
        $categories_menu = Category::where('parent_id', 0)->get();


        $data = Category::all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryDEQUY('');


        $products_hot = Products::where('status','>', 0)
            ->where('pro_hot', '=', 1)
            ->limit(5)
            ->get();
        $products_new = Products::where('status','>', 0)
            ->limit(5)
            ->orderBy('id', 'desc')
            ->get();

        $e_email = Setting::where('config_key','email')->first();
        $e_phone = Setting::where('config_key','phone')->first();
        $e_location = Setting::where('config_key','location')->first();


        View::share([
            'categories_menu' => $categories_menu,
            'htmlOption' => $htmlOption,
            'products_hot' => $products_hot,
            'products_new' => $products_new,
            'e_email'=> $e_email,
            'e_phone'=> $e_phone,
            'e_location'=> $e_location,
        ]);
    }
}
