# Eloquid
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/datakrama/eloquid/CI?style=flat-square) ![Packagist Version](https://img.shields.io/packagist/v/datakrama/eloquid?style=flat-square) ![Packagist Downloads](https://img.shields.io/packagist/dm/datakrama/eloquid?style=flat-square) ![Packagist License](https://img.shields.io/packagist/l/datakrama/eloquid?style=flat-square)

This package is created to insert UUID into Eloquent Model Primary Key (id) automatically.

## Requirement
- [Laravel 5.8.x](https://github.com/laravel/framework "Laravel")

## Laravel Compatibility

|   Laravel                             | Package                                               |
| ------------------------------------- | ----------------------------------------------------- |
| [5.8.x](https://laravel.com/docs/5.8) | [0.x](https://github.com/datakrama/eloquid/tree/v0)   |

## Installation
`$ composer require datakrama/lapires:"^0.4"`

## Usages
### Reguler model
```
<?php

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

### Custom intermediate table model (Pivot)

```
<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Datakrama\Eloquid\Traits\Uuids;

class RoleUser extends Pivot
{
    use Uuids;
    
    //
}
```

## Licence
The MIT License (MIT). Please see [License File](https://github.com/datakrama/eloquid/blob/master/LICENSE.md "License File") for more information.
