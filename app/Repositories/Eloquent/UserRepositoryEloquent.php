<?php

namespace App\Repositories\Eloquent;

use App\Models\Foundation\User;
use App\Presenters\UserPresenter;
use App\Repositories\Criteria\UserCriteria;
use App\Repositories\Interfaces\UserRepository;
use App\Validators\UserValidator;
use Prettus\Repository\Criteria\RequestCriteria;

class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Specify Validator class name.
     *
     * @return mixed
     */
    public function validator()
    {
        return UserValidator::class;
    }

    /**
     * Specify Presenter class name.
     *
     * @return mixed
     */
    public function presenter()
    {
        return UserPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));

        // Custom Criteria
        //$this->pushCriteria(app(UserCriteria::class));
    }
}
