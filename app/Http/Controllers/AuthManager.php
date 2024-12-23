<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    //
    public function home()
    {
        return view('home');
    }
    public function login()
    {
        return view('login');
    }
    

    public function register()
    {
        return view('registeration');
    }
    

    public function registerPost(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if(!$user){
            return redirect(route('registeration'))->with('error',"Registration failed, try again please");
        }

        return  redirect(route('login'))->with('error',"Registration successfully, Login to access the application");;
    }


    public function loginPost(Request $request)
    {

        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'))->with('success',"You have successfully logged in");
        }
        return  redirect(route('login'))->with('error',"Login details are incorrect");
    }


    public function logOut(){
        Session::flush();
        Auth::logout();

        return  redirect(route('login'));
    }
    
}
