<?php

namespace App;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
	protected $table = 'permissions';

    protected $fillable = [
        'display_name', 'name', 'description',
    ];
}
