<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Mail;
use Auth;

class MailController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public static function send()
    {
     
            
           Mail::send(['text'=>'mail'],['name','Admin'],function($message){
            $to = Auth::User()->email;

            $message->to($to,'TO User')->subject('Email');
               $message->from('anankarki97@gmail.com','Anan');
        });
           
           Mail::send(['text'=>'admin_mail'],['name','Admin'],function($message){
            $to = Auth::User()->email;

            $message->to('anankarki97@gmail.com','TO Anan')->subject('Email');
               $message->from('anankarki97@gmail.com','Anan');
        });    
       return view('/user_home');
           


    
    }

    }

