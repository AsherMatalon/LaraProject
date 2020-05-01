<?php
 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use Validator,Redirect,Response,File;
 use Socialite;
 use Session;

 use App\User;
 class SocialController extends Controller
 {
 public function redirect($provider)
 {
     return Socialite::driver($provider)->redirect();
 }
 public function callback($provider)
 {

   $getInfo = Socialite::driver($provider)->user();

   $user = $this->createUser($getInfo,$provider);
    // dd($user);
    session::put("user_id","1");
    session::flash("sm","you sign up successfully please sign in $user->name ");

   return redirect('/');
 }
 function createUser($getInfo,$provider){
 $user = User::where('provider_id', $getInfo->id)->first();

 if (!$user) {
      $user = User::create([
         'name'     => $getInfo->name,
         'email'    => $getInfo->email,
         'password' => bcrypt($getInfo->id),
         'role'     => 5,
         'provider' => $provider,
         'provider_id' => $getInfo->id
     ]);
     //dd($user);
   }


   return $user;
    }
 }
