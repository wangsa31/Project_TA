<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
Use Alert;




class LoginLogout extends Controller
{
    // Return view Login
    public function Login(){
        return view('authentication.sign_in',[]);
    }

    // Return proses login
    public function LoginPost(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }
        alert()->error('Invalid email and Username');

        return  redirect('/login');
     }

     public function Register(){
        $email = "admin01.gmail.com";
        $password = bcrypt("1234567890");

        $user = new User;
 
        $user->name = "admin01";
        $user->email = $email;
        $user->password = $password;
 
        $user->save();

     return  redirect('admin/dashboard');

     }

     public function Logout(){
        Auth::logout();
        return redirect('/login');
     }
}