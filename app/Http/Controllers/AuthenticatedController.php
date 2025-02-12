<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{
    public function create(){
        return view('login');
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only('email','password');
        if (Auth::attempt($credential)) {
            if (Auth::user()->hasRole('admin')){
                return redirect()->intended('dashboard')->with('success','Login Successful!');
            }else{
                return redirect()->intended(route('home'))->with('success','Login Successful!');
            }

        }else{
            return back()->with('error','Wrong Email or Password! Please try again.');
        }
    }

    public function dashboard(){
        if(Auth::check()){
            $breadcrumb = 'Dashboard';
            return view('dashboard.index',['breadcrumb' => $breadcrumb]);
        }
        return redirect()->route('login')->with('message','login nying');
    }

    public function home(){
        
        return view('home.index');
    }

    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
