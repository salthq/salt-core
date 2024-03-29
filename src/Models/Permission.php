<?php

namespace Salt\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Salt\Core\Models\Permission
 *
 * @property string $name
 */
class Permission extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function options()
    {
        return config('core.permissions');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function dependencies()
    {
        return $this->belongsToMany(self::class, PeerPermission::class, 'peer_id', 'permission_id')->withTimestamps();
    }

    public function dependants()
    {
        return $this->belongsToMany(self::class, PeerPermission::class, 'permission_id', 'peer_id')->withTimestamps();
    }

    public function requiresPermissions()
    {
        return $this->dependencies()->count() > 0;
    }
}
