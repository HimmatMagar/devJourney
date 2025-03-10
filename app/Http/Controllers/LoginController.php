<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Exists;

class LoginController extends Controller
{

    public function loginPage() {
        return view('log/login');
    }

    public function signupPage() {
        return view('log/signup');
    }

    public function login(Request $request) {
        $validate = Validator::make($request -> all(), [
            'email' => 'required|email',
            'password' => 'required|alpha_num|min:4'
        ]);
        // dd($request -> all());
        if($validate -> passes()) {
             if(Auth::attempt(['email' => $request -> email, 'password' => $request -> password])) {
                return redirect() -> route('home') -> with('status', 'Login successfully');
             } else {
                return redirect() -> route('loginPage') -> with('error', 'Email and password incorrect');
             }
        } else {
            return redirect() -> route('loginPage') -> withInput() -> withErrors($validate);
        }
    }

    public function signup(Request $request) {
        $validate = Validator::make($request -> all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|alpha_num|min:4'
        ]);
    
        if($validate -> passes()) {
             User::create([
                'name' => $request -> name,
                'email' => $request -> email,
                'password' => bcrypt($request -> password),
                'role' => 'user'
             ]);
             return redirect() -> route('loginPage') -> with('status', 'Signup successfully');
        } else {
            return redirect() -> route('signupPage') -> withInput() -> withErrors($validate);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect() -> route('loginPage');
    }

}
