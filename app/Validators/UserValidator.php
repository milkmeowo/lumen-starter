<?php

namespace App\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Milkmeowo\Framework\Base\Validators\Validator;

class UserValidator extends Validator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];

    /**
     * Validation Custom Messages.
     *
     * @var array
     */
    protected $messages = [
        //'required' => 'The :attribute field is required.',
    ];

    /**
     * Validation Custom Attributes.
     *
     * @var array
     */
    protected $attributes = [
        //'email' => 'E-mail',
    ];
}
