<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //

    public function login(Request $request){
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {



            return redirect('dashboard');

        }
        else {
            $notification = array(
                'message' => 'Invalid Username / Passwird',
                'alert-type' => 'error'
            );


            return redirect()->back()->with($notification);
        }

    }
}
