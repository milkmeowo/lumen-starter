<?php

namespace App\Api\Controllers\V1;

use Dingo\Api\Exception\ResourceException;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Dingo\Api\Exception\DeleteResourceFailedException;
use App\Repositories\Interfaces\UserRepository;
use App\Validators\UserValidator;

class UsersController extends BaseController
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var UserValidator
     */
    protected $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->repository->paginate($request->get('limit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

        // encrypt password
        $data['password'] = bcrypt($data['password']);

        $user = $this->repository->create($data);

        // Created, return 201 data
        return $this->response->created(null, $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);

        $user = $this->repository->update($data, $id);

        // Updated, return 204 No Content
        return $this->response->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete((int) $id);

        if ($deleted) {
            // Deleted, return 204 No Content
            return $this->response->noContent();
        } else {
            // Failed, throw exception
            throw new DeleteResourceFailedException('Failed to delete.');
        }
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function trashedIndex(Request $request)
    {
        return $this->repository->OnlyTrashed()->paginate($request->get('limit'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function trashedShow($id)
    {
        return $this->repository->OnlyTrashed()->find($id);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param $id
     *
     * @return \Dingo\Api\Http\Response
     */
    public function restore($id)
    {
        $restored =  $this->repository->restore((int) $id);

        if ($restored) {
            // Restored, return 204 No Content
            return $this->response->noContent();
        } else {
            // Failed, throw exception
            throw new ResourceException('Failed to restore.');
        }
    }
}
