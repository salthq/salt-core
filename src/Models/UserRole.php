<?php

namespace Salt\Core\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Salt\Core\Observers\UserRoleObserver;

/**
 * Salt\Core\Models\Role
 *
 * @property string $name
 * @property string $label
 */
class UserRole extends Pivot
{
    protected $table = 'role_user';

    public static function boot()
    {
        parent::boot();
        UserRole::observe(UserRoleObserver::class);
    }
}
