<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create(){
        return view('pages.register'); 
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'name'=>['required', 'min:2'],
            'email'=>['required', 'email', Rule::unique('users', 'email')],
            'password'=>'required|confirmed|min:2'
        ]);
        // Hash password

        $formFields['password']= bcrypt($formFields['password']);

        $user =User::create($formFields);
        // login 
        auth()->login($user);
        return redirect('/');
    }

    public function loginform(){
        return view('pages.login');
       }
    
    public function login(Request $request){
        $formFields = $request->validate([
            'email'=>['required', 'email'],
            'password'=>'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors(['email'=>'invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}