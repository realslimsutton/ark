<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'weight',
        'colour',
        'requirement'
    ];

    protected $casts = [
        'requirement' => 'integer'
    ];
}
