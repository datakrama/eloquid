# Eloquid
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/datakrama/eloquid/CI?style=flat-square) ![Packagist Version](https://img.shields.io/packagist/v/datakrama/eloquid?style=flat-square) ![Packagist Downloads](https://img.shields.io/packagist/dm/datakrama/eloquid?style=flat-square) ![Packagist License](https://img.shields.io/packagist/l/datakrama/eloquid?style=flat-square)

This package is created to insert UUID into Eloquent Model Primary Key (id) automatically.

## Requirement
- [Laravel 8.x](https://github.com/laravel/framework "Laravel")

## Laravel Compatibility

|   Laravel                             | Package                                               |
| ------------------------------------- | ----------------------------------------------------- |
| [5.8.x](https://laravel.com/docs/5.8) | [0.x](https://github.com/datakrama/eloquid/tree/v0)   |
| [6.x](https://laravel.com/docs/6.x)   | [1.x](https://github.com/datakrama/eloquid/tree/v1)   |
| [7.x](https://laravel.com/docs/7.x)   | [1.x](https://github.com/datakrama/eloquid/tree/v1)   |
| [8.x](https://laravel.com/docs/8.x)   | [2.x](https://github.com/datakrama/eloquid/tree/v2)   |

## Installation
`$ composer require datakrama/eloquid:"^2.0"`

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
