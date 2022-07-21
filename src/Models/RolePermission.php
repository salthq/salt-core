<?php

namespace Salt\Core\Models;

use Salt\Core\Observers\RolePermissionObserver;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Salt\Core\Models\Role
 *
 * @property string $name
 * @property string $label
 */
class RolePermission extends Pivot
{
    protected $table =  'permission_role';

    public static function boot()
    {
        parent::boot();
        RolePermission::observe(RolePermissionObserver::class);
    }

}
