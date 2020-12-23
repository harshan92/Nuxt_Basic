<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Requests\UserRegisterRequest;

class AuthController extends Controller
{
    public function register(Request  $request)
    {
        $this->validate($request, [
            'name' => 'required|max:25',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user=User::create([
            'email'=>$request->input("email"),
            'name'=>$request->input("name"),
            'password'=>bcrypt($request->input("password")),
        ]);

        return $user;
    }
}
