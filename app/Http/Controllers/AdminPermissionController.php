<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use App\Components\PermissionRecusive;
use App\Traits\DeleteModelTrait;

class AdminPermissionController extends Controller
{
    use DeleteModelTrait;
    private $permission;
    public function __construct(Permission $permission) //Khai báo để dùng chung dữ liệu data
    {
        $this ->permission = $permission;
    }
    public function getPermission($parent_id){

        $data = $this ->permission->all();
        $permission_recusive = new PermissionRecusive($data);
        $htmlOption = $permission_recusive->permissionDEQUY($parent_id);
        return $htmlOption;
    }
    public function index(){
        $permission = $this ->permission->where('parent_id', 0)->get();
        $htmlOption = $this ->getPermission($parent_id = '');
        return view('admin.permission.index', compact('permission','htmlOption'));
    }
    public function addPermissions()
    {
        $htmlOption = $this ->getPermission($parent_id = '');
        return view('admin.permission.add', compact('htmlOption'));

    }

    public function store(Request $request)
    {
        if ($request->parent_id == 0) {
             $b= Permission::create([
                'name' => $request->name,
                'display_name' => $request->name,
                'parent_id' => $request->parent_id,
                'key_code' => ''
            ]);
        }else{
            $pemission = $this ->permission->find($request->parent_id);
            $a = Permission::create([
                'name' => $request->name,
                'display_name' => $request->name,
                'parent_id' => $request->parent_id,
                'key_code' => $pemission->name . '_' .$request->name
            ]);
        }
        return back()->withInput();
    }
    public function delete($id){
        $this->deleteModelTrait($id, $this->permission);
        return back();
    }
}
