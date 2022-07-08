<?php

namespace App\Models;

use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    protected $fillable = [
        'name',
        'title',
        'weight',
        'colour',
        'requirement'
    ];

    protected $casts = [
        'requirement' => 'integer'
    ];
}
