<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(){
        return view('register');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

        ]);
        $user->assignRole('pembeli');
        customer::create([
            'user_id'=>$user->id,
            'name'=>$user->name,
            'email'=>$user->email,
            'alamat'=>$request->alamat,
            'no_hp'=>$request->no_hp,
        ]);


        return redirect()->route('login')->with('success','account created');
    }
}
