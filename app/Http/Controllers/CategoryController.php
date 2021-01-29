<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use App\Components\Recusive;


class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category) //Khai báo để dùng chung dữ liệu data
    {
        $this ->category = $category;
//        $this->middleware('can:list-category');
    }
    public function getCategory($parent_id){

        $data = $this ->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryDEQUY($parent_id);
        return $htmlOption;
    }

    public function index(){
        $categories = $this->category->latest()->paginate(5);

//        dd($this->authorize('list-category'));
        $htmlOption = $this ->getCategory($parent_id = '');

        return view('admin.category.index', compact('categories','htmlOption'));
    }
    public function add(){
        $htmlOption = $this ->getCategory($parent_id = '');

        return view('admin.category.add', compact('htmlOption'));

    }
    public function store(Request $request){
        $this ->category ->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }
    public function edit($id){
        $category = $this->category->find($id);
        $htmlOption = $this ->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category','htmlOption'));
    }
    public function update($id , Request $request){
        $this ->category->find($id) ->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }
    public function delete($id){
        $this ->category->find($id)->delete();
        return redirect()->route('categories.index');
    }
}
