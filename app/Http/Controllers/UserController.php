<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class UserController extends Controller
{
    //
    public function getProfile(Request $request)
    {
        $token = $request->headers->all();
        if (empty($token['cookie'][0])) {
            return redirect('/user/login');
            // dd($token);
        }

        $user = $request->user();
        return view('user.profile', ['user' => $user]);
    }
}
