<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('auth/login');
    }
    public function postLogin(LoginRequest $request){
        $credentials = $request->except((['_token','is_admin']));
        if (Auth::attempt($credentials)){
            return redirect()->route('index');
        }else{
            abort(403);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function register(){
        return view('auth/register');
    }
    public function postRegister(LoginRequest $request){
        $user = new User($request->all());
        $user -> password = bcrypt($request->input('password'));
        $user -> is_admin = $request->input('is_admin')=="on";
        $user->save();
        $cart = new Cart(['user_id'=>$user->id]);
        $cart ->save();
        return $this->postLogin($request);
    }
}
