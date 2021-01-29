<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;


class AdminRoleController extends Controller
{
    use DeleteModelTrait;
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $roles = $this->role->paginate(10);
        return view('admin.role.index', compact('roles'));

    }

    public function add()
    {
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        return view('admin.role.add', compact('permissionsParent'));
    }

    public function store(Request $request)
    {
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        // thêm vào 1 array vào bảng trung gian permissions_role
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        // lấy ra các permission có parent_id= 0
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        $role = $this->role->find($id);
        $pemissionsChecked = $role->permissions;
//        dd($pemissionsChecked);
        return view('admin.role.edit', compact('permissionsParent', 'role', 'pemissionsChecked'));
    }

    public function update(Request $request, $id)
    {
        $role = $this->role->find($id);
        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('roles.index');
    }
    public function delete($id){
        $this->deleteModelTrait($id, $this->role);
        return back();
    }
}
