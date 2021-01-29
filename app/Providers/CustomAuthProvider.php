<?php
namespace App\Providers;

use App\Services\PermissionGateAndPolicyAccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class CustomAuthProvider extends ServiceProvider
{

    public function register()
    {
    //
    }

    public function boot()
    {
            // Goi function trong /Services/PermissionGateAndPolicyAccess
            $permissionGateAndPolicy = new PermissionGateAndPolicyAccess();
            $permissionGateAndPolicy->setGateAndPolicyAccess();
    }
}
