<?php

namespace Datakrama\Eloquid\Test\Model;

use Datakrama\Eloquid\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use Uuids;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    /**
     * The user that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany('Datakrama\Eloquid\Test\Model\User', 'user_roles')->using('Datakrama\Eloquid\Test\Model\UserRole')->withTimestamps()->withPivot('id');
    }
}
