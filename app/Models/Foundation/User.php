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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Called when model is created
     * Other events available are in BaseModelEvents
     */
    public function onCreated()
    {
        parent::onCreated();

    }
}
