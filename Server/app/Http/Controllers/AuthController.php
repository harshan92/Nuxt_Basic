<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;

use App\Http\Resources\User as UserResource;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $user=User::create([
            'email'=>$request->input("email"),
            'name'=>$request->input("name"),
            'password'=>bcrypt($request->input("password")),
        ]);

        if(!$token=auth()->attempt($request->only(['email','password']))){
            return abort('401');
        }

        return (new UserResource($user))->additional([
            'meta'=>[
                'token'=>$token
            ]
        ]);
    }

    public function login(UserLoginRequest $request)
    {
        if(!$token=auth()->attempt($request->only(['email','password']))){
            return response()->json([
                'errors'=>[
                    'error'=>["Sorry we can't find with those details."],
                ]
            ]);
        }

        return (new UserResource($request->user()))->additional([
            'meta'=>[
                'token'=>$token
            ]
        ]);
    }
}
