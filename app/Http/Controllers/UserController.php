<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\User;
use Illuminate\Support\Facades\DB;
use Hash,Session;


class UserController extends Controller
{
   public static function ShowLoginForm(){
    self::$data['title'] .= 'Login';
    return view('forms.login',self::$data);

   }
   public static function ShowSignUpForm(){
    self::$data['title'] .= 'SignUp';
    return view('forms.signup',self::$data);

    }
public static function ValidateUesr(SignInRequest $request) {
    // if($user=User::where('email',$request->email)->first()->toArray()){
    //     if(Hash::check($request->password,$user['password'])){
    //         echo "all good";
    //     }
    // }
    //echo $request->email;
    //echo "<hr>";
    //echo $request->password;
    //echo bcrypt($request->password);
    //echo __METHOD__;die;
              //DB::table('users')->where...
    if($user=(User::where('email',$request->email))->first()){
        //$userDb=[$user->password] ;
        //dd($userDb) ;
       //echo $userDb['0'];
       // echo "<pre>";
       // echo $request->password;
       if(Hash::check($request->password,$user->password)){
            session::put("user_id",$user->id);
            session::put("user_name",$user->name);
            session::flash("sm","welcome back $user->name");
            if ($user->role ==7){
                session::put("is_admin",true);
            }
            return redirect('/');
       } 
       
   }
   return redirect('user/login')->withErrors("invalid emaillllllll or password",'login');
}
public static function SignUpUser(SignUpRequest $request){
    if(User::SaveUser($request)){
        session::flash("sm","you sign up successfully please sign in"); 
        return redirect('user/login');
    }
}

public static function LogOut(){
    session::flush();
    return redirect('/');


}
}