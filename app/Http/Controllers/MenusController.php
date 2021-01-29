<?php

namespace App\Http\Controllers;

use App\Components\MenusRecusive;
use App\Menu;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    private $menusRecusive;
    private $menu;
    public function __construct(MenusRecusive $menusRecusive, Menu $menu)
    {
        $this->menusRecusive = $menusRecusive;
        $this->menu = $menu;
    }

    public function index(){
        $menus = $this->menu->paginate(10);
        return view('admin.menus.index', compact('menus'));
    }
    public function add(){
        $optionSelect = $this->menusRecusive->menuRecusiveAdd();
        //dd($test);
        return view('admin.menus.add', compact('optionSelect'));
    }
     public function store(Request $request){
         $this ->menu ->create([
             'name' => $request->name,
             'parent_id' => $request->parent_id,
             'slug' => str_slug($request->name)
         ]);
//         return redirect()->route('menus.index');
         return redirect()->route('menus.index')->with('status', 'Đã sửa thành công!');

     }
     public function edit($id){
         $menus = $this->menu->find($id);
         $optionSelect = $this->menusRecusive->menuRecusiveEdit($menus->parent_id);
         return view('admin.menus.edit', compact('menus','optionSelect'));
     }
     public function update($id , Request $request){
         $this->menu->find($id)->update([
             'name' => $request->name,
             'parent_id' => $request->parent_id,
             'slug' => str_slug($request->name)
         ]);
         return redirect()->route('menus.index');
     }
     public function delete($id){
         $this ->menu->find($id)->delete();
         return redirect()->route('menus.index');
     }
}
