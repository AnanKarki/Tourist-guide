<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers ;
    //
     public function  login(Request $request)
    {
         $this->validate($request, [
            $this->username() => 'required', 
            'password' => 'required',  
        ]);
    
    if(Auth::attempt([
        'email'=>$request->email,
        'password'=>$request->password]))
    {
        $user= User::where('email',$request->email)->first();
        if($user->is_admin()){
            return redirect()->route('dashboard');
        }
        
        return redirect()->route('home');
    }

        return back();
}
}
