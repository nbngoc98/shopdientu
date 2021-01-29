<?php

namespace App\Http\Controllers;

use App\Role;
use App\User_guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteModelTrait;

class AdminUserGuestController extends Controller
{
    use DeleteModelTrait;
    private $user;
    private $role;
    public function __construct(User_guest $user, Role $role)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->paginate(10);
        return view('admin.user_guest.index', compact('users'));

    }
    public function add()
    {
        return view('admin.user_guest.add');
    }
    public function store(Request $request)
    {
//        try {
//            DB::beginTransaction();
//            $user = $this->user->create([
//                'name' => $request->name,
//                'email' => $request->email,
//                'password' => Hash::make($request->password)
//            ]);
//            // Insert table attach() array
//            $user->roles()->attach($request->role_id);
//            DB::commit();
//            return redirect()->route('user_guest.index');
//        } catch (\Exception $exception) {
//            DB::rollBack();
//            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
//
//        }

    }
    public function edit($id)
    {
        $user = $this->user->find($id);
        return view('admin.user_guest.edit', compact('user'));

    }

    public function update(Request $request, $id)
    {
//        try {
//            DB::beginTransaction();
//            $this->user->find($id)->update([
//                'name' => $request->name,
//                'email' => $request->email,
//                'password' => Hash::make($request->password)
//            ]);
//            $user = $this->user->find($id);
//            $user->roles()->sync($request->role_id);
//            DB::commit();
//            return redirect()->route('user_guest.index');
//        } catch (\Exception $exception) {
//            DB::rollBack();
//            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
//
//        }

    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->user);

    }
}
