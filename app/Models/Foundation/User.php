<?php

namespace App\Models\Foundation;

use Milkmeowo\Framework\Base\Models\Foundation\User as BaseUser;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends BaseUser
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
