# Eloquid
This package is created to insert UUID into Eloquent Model Primary Key (id) automatically.

# Requirements
- [Laravel 5.x|6.x](https://github.com/laravel/framework "Laravel")

# Installations
`$ composer require datakrama/eloquid`

# Usages
## For reguler model
```<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Datakrama\Eloquid\Traits\Uuids;

class Role extends Model
{
    use Uuids;
    
    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->using('App\RoleUser');
    }
}
```

## For custom intermediate table model (Pivot)

```<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Datakrama\Eloquid\Traits\Uuids;

class RoleUser extends Pivot
{
    use Uuids;
    
    //
}
```

# Credits
- [Ahmad Husen](https://github.com/husenisme "Ahmad Husen")

# Licence
The MIT License (MIT). Please see [License File](https://github.com/datakrama/eloquid/blob/master/LICENSE.md "License File") for more information.
