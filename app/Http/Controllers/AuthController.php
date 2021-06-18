<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function Loginview () {
        return view('Login');
    }

    //
    public function Register (Request $request)
    {
        $request->validate([
            'role' => 'required',
            'email' =>  'required|email',
            'password' => 'required'

        ]);

        User::create([
          'name' => $request -> input('name'),
          'role' => $request-> input('role'),
          'email' => $request -> input('email'),
          'password' => Hash::make($request -> input('password'))
      ]);


      return \response(view('login')  , Response::HTTP_CREATED);
    }
    public function Login (Request $request)
    {
        $user = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        if(Auth::attempt($user)){
            return redirect('/post');
        } else {
            return redirect('/login');
        }
    }
    public function Logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');


    }
    public function getuserbyid($id){
        $user = User::findorFail($id);
        return $user->name;
    }
}
