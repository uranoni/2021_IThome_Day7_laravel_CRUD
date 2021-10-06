<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUser;
use App\models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function signup(CreateUser $request)
    {
        $validateData = $request->validated();
        $user = new User([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => bcrypt($validateData['password']),
        ]);
        $user->save();
        return response($user, 201);
    }
    public function login(Request $request)
    {

        $validateData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        if (!Auth::attempt($validateData)) {
            return response('登入失敗', 401);
        }
        $user = $request->user();
        $token = $user->createToken('Token');

        // $token->token->save();
        return response(['token' => $token->accessToken]);
        // return view('welcomee')->with('token', $token);
        // return response()->json(['status' => 0, 'token' => $token]);
    }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response(['message' => '登出成功'], 200);
    }

    public function user(Request $request)
    {
        dd($request);
        return response($request->user());
    }
}
