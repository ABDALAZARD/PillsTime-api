<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUser;
use App\Models\User;
use App\Services\ResponseService;
use App\Transformers\User\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function register(StoreUser $request)
    {
        $request->validate([
            'email'     => 'unique:users,email|email|required',
            'name'      => 'required|min:3|max:250',
            'password'  => 'required|min:5|max:250',
        ]);

        try{
            $user = $this->user->create($request->all());

        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('register', null, $e);
        }

        return new UserResource($user,['type' => 'store', 'route' => 're0gister']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'     => 'email|required',
            'password'  => 'required|min:5',
        ]);
        
        try {
            $token = $this->user->login($request->only('email', 'password'));
        } catch (\Throwable|\Exception $e) {
            return ResponseService::exception('login', null, $e);
        }

        return response()->json(compact('token'));
    }

    public function logout(Request $request) {
        try {
            $this
            ->user
            ->logout($request->input('token'));
        } catch (\Throwable|\Exception $e) {
            return ResponseService::exception('logout', null, $e);
        }

        return response(200);
    }
}
