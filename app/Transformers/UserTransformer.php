<?php

namespace App\Transformers;

use App\Models\Foundation\User;

class UserTransformer extends BaseTransformer
{
    /**
     * Transform the \User entity.
     * @param \User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */
            'name'       => (string) $model->name,
            'email'       => (string) $model->email,

            'created_by' => (int) $model->created_by,
            'created_at' => (string) $model->created_at,
            'created_ip' => (string) $model->created_ip,

            'updated_by' => (int) $model->updated_by,
            'updated_at' => (string) $model->updated_at,
            'updated_ip' => (string) $model->updated_ip,

            'deleted_by' => (int) $model->deleted_by,
            'deleted_at' => (string) $model->deleted_at,
            'deleted_ip' => (string) $model->deleted_ip,
        ];
    }
}
