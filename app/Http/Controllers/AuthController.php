<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AuthController extends Controller
{
    public function login_page(){
        return view('auth.login');
    }
    public function register_page(){
        return view('auth.register');
    }
    public function check_login(Request $request){

        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['status' => true, 'msg' => 'Done']);
        }

        return response()->json(['status' => false, 'msg' => 'Please check email or password']);
    }


    public function logout()
    {
        Auth::logout();
        return redirect('home')->with('success-logout', 'Logout Successfully');
    }

    public function register_post(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|min:2|max:50',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);
        User::create([
            'username'=>$request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home')->with('success', 'Successfully Logged In');
        }
        return redirect('autn.register')->withError('error');
    }
}
