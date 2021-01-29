<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess {

    public function setGateAndPolicyAccess()
    {
        $this->defineGateCategory();
        $this->defineGateMenu();
        $this->defineGatePermission();
        $this->defineGateProduct();
        $this->defineGateRole();
        $this->defineGateSetting();
        $this->defineGateSlider();
        $this->defineGateUser();
    }

    public function defineGateCategory()
    {
        Gate::define('list-category', 'App\Policies\CategoryPolicy@view');
        Gate::define('add-category', 'App\Policies\CategoryPolicy@create');
        Gate::define('edit-category', 'App\Policies\CategoryPolicy@update');
        Gate::define('delete-category', 'App\Policies\CategoryPolicy@delete');
    }
    public function defineGateMenu()
    {
        Gate::define('list-menu', 'App\Policies\MenuPolicy@view');
        Gate::define('add-menu', 'App\Policies\MenuPolicy@create');
        Gate::define('edit-menu', 'App\Policies\MenuPolicy@update');
        Gate::define('delete-menu', 'App\Policies\MenuPolicy@delete');
    }
    public function defineGatePermission()
    {
        Gate::define('add-permission', 'App\Policies\PermissionPolicy@create');
        Gate::define('list-permission', 'App\Policies\PermissionPolicy@view');
        Gate::define('delete-permission', 'App\Policies\PermissionPolicy@delete');
    }
    public function defineGateProduct()
    {
        Gate::define('list-product', 'App\Policies\ProductPolicy@view');
        Gate::define('add-product', 'App\Policies\ProductPolicy@create');
        Gate::define('edit-product', 'App\Policies\ProductPolicy@update');
        Gate::define('delete-product', 'App\Policies\ProductPolicy@delete');
    }
    public function defineGateRole()
    {
        Gate::define('list-roles', 'App\Policies\RolePolicy@view');
        Gate::define('add-roles', 'App\Policies\RolePolicy@create');
        Gate::define('edit-roles', 'App\Policies\RolePolicy@update');
        Gate::define('delete-roles', 'App\Policies\RolePolicy@delete');
    }
    public function defineGateSetting()
    {
        Gate::define('list-setting', 'App\Policies\SettingPolicy@view');
        Gate::define('add-setting', 'App\Policies\SettingPolicy@create');
        Gate::define('edit-setting', 'App\Policies\SettingPolicy@update');
        Gate::define('delete-setting', 'App\Policies\SettingPolicy@delete');
    }
    public function defineGateSlider()
    {
        Gate::define('list-slider', 'App\Policies\SliderPolicy@view');
        Gate::define('add-slider', 'App\Policies\SliderPolicy@create');
        Gate::define('edit-slider', 'App\Policies\SliderPolicy@update');
        Gate::define('delete-slider', 'App\Policies\SliderPolicy@delete');
    }
    public function defineGateUser()
    {
        Gate::define('list-users', 'App\Policies\UserPolicy@view');
        Gate::define('add-users', 'App\Policies\UserPolicy@create');
        Gate::define('edit-users', 'App\Policies\UserPolicy@update');
        Gate::define('delete-users', 'App\Policies\UserPolicy@delete');
    }
}
