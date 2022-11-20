<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\User\StoreUser;
use App\Services\ResponseService;
use App\Transformers\User\UserResource;
use App\Transformers\User\UserResourceCollection;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function store(StoreUser $request)
    {
        //
        try{
            $user = $this->user->create($request->all());

        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('users.store',null,$e);
        }
        return new UserResource($user,array('type' => 'store','route' => 'users.store'));
    }
}
