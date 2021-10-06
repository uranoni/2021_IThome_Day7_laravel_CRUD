<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class UserController extends Controller
{
    //
    public function getProfile(Request $request)
    {
        // $token = $request->cookie('token');
        if (empty($request->cookie('token'))) {
            return redirect('/user/login');
        }
        $user = $request->user();
        return view('user.profile', ['user' => $user]);
    }
}
