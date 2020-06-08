<?php

namespace Datakrama\Eloquid\Test\Model;

use Datakrama\Eloquid\Traits\Uuids;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Uuids, Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The role that belong to the user.
     */
    public function role()
    {
        return $this->belongsToMany('Datakrama\Eloquid\Test\Model\Role', 'user_roles')->using('Datakrama\Eloquid\Test\Model\UserRole')->withTimestamps()->withPivot('id');
    }
}