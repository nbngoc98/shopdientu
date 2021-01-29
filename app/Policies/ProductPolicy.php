<?php

namespace App\Policies;

use App\User;
use App\Products;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the products.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function view(User $user)
    {
        return $user -> checkPermissionAccess('product_list');
    }

    /**
     * Determine whether the user can create products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user -> checkPermissionAccess('product_add');
    }

    /**
     * Determine whether the user can update the products.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function update(User $user,$id)
    {
        $product = Products::find($id);
//        dd($product);
        if ($user -> checkPermissionAccess('product_edit' && $product->user_id === (Auth::guard('admin-web')->user()->id) )) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the products.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user -> checkPermissionAccess('product_delete');
    }

    /**
     * Determine whether the user can restore the products.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function restore(User $user, Products $products)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the products.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function forceDelete(User $user, Products $products)
    {
        //
    }
}
