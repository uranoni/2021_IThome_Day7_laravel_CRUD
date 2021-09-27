<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUser;
use App\models\User;

class AuthController extends Controller
{
    //
    public function signup(CreateUser $request)
    {
        $validateData = $request->validated();
        $user = new User([
            'name'=> $validateData['name'],
            'email' =>$validateData['email'],
            'password' => bcrypt($validateData['password']),
        ]);
        $user->save();
        return response($user,201);
    }
}
