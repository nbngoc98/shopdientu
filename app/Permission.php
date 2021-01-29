<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = [];
    public function permissionChildrent()
    {
        // quan hệ giữa Permission cha và con ---- 1 cha có nhiều con
        return $this->hasMany(Permission::class, 'parent_id');
    }
}
