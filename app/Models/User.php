<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = app('hash')->needsRehash($value) ? Hash::make($value) : $value;
        }
    }

    /**
     * A user may have multiple roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_has_roles');
    }

    /**
     * A user may have multiple direct permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'user_has_permissions');
    }

    /**
     * A user have any file image.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function uploads()
    {
        return $this->hasMany('App\Models\Upload');
    }

    /**
     * A user have any blog.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function blogs()
    {
        return $this->hasMany('App\Models\Blog');
    }

    /**
     * A user have any confirmation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function confirmations()
    {
        return $this->hasMany('App\Models\Confirmation');
    }
}
