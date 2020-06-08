<?php

namespace Datakrama\Eloquid\Test\Model;

use Datakrama\Eloquid\Traits\Uuids;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserRole extends Pivot
{
    use Uuids;

    /**
     * Get the user that owns the user role.
     */
    public function user()
    {
        return $this->belongsTo('Datakrama\Eloquid\Test\Model\User');
    }

    /**
     * Get the role that owns the user role.
     */
    public function role()
    {
        return $this->belongsTo('Datakrama\Eloquid\Test\Model\Role');
    }
}
