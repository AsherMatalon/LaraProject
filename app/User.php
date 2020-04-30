<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [

        'name', 'email', 'password','role', 'provider', 'provider_id'
    
    ];

   public static function SaveUser($req){
       $valid = false;
       $user=new self(); //create a inctance
       $user->name=$req->name;
       $user->email=$req->email;
       $user->password=bcrypt($req->password);
       $user->role=5;
       $user->save();
       if($user->id){
           $valid = true;
       }
       return $valid;

   }

  

   

}
