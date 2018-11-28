<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password'
        //'userid','dateofbirth','gender','height','nickname','weight',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
        //'logo',
    ];

    protected $dates = ['deleted_at'];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || false;
        }
        return $this->hasRole($roles);
    }

    public function hasAnyRole($roles)
    {
        foreach ($roles as $role) {
            if ($this->role->name === $role) {
                return true;
            }
        }

        return false;
    }

    public function hasRole($role)
    {
        return $this->role->name === $role;
    }
}
