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
    /**
     * Check If a user has been logged In
     * @return bool
     */
    public function hasAUserLoggedIn(){
        
        return Auth::check();
    }
    
    /**
     * Summary of home : Display Dashboard
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function home()
    {       

        if($this->hasAUserLoggedIn() === false){
            return  redirect(route('login'));
        }
        return view('home');
    }

    /**
     * Summary of home : Display Login Page
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function login()
    {
        if(Auth::check()){
            return  redirect(route('home'));
        }
        return view('login');
    }
    
    /**
     * Summary of home : Display Register Page
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function register()
    {
        if(Auth::check()){
            return  redirect(route('home'));
        }
        return view('registeration');
    }
    
    /**
     * Summary of home : Validates and Register New User
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
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

    /**
     * Summary of home : Validates and Register New User
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
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

    /**
     * Summary of home : Validates and Register New User
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function logOut(){
        Session::flush();
        Auth::logout();

        return  redirect(route('login'));
    }
    
}
