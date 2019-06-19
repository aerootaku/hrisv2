<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {

            if (Auth::user()->role_id == '2') {
                return redirect('employee-profile/'.Auth::user()->employee_id);
            }else{
                return redirect('dashboard');
            }

        } else {
            $notification = array(
                'message' => 'Invalid Username / Passwird',
                'alert-type' => 'error'
            );


            return redirect()->back()->with($notification);
        }

    }
}
