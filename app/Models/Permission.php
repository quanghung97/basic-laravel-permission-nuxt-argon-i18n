<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasPermissions;

// use App\Repositories\Contracts\PermissionInterface;

class Permission extends Model
{
    use HasPermissions;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    public $guarded = ['id'];

    /**
     * A permission can be applied to roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_has_permissions');
    }

    /**
     * A permission can be applied to users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_has_permissions');
    }
}
