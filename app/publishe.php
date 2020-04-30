<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class publishe extends Model
{
    public static $fileName;
    public static function showPublishes(){
    
    }
     public static function saveNewPublishes($request){
        $valid = false;
        $Publish = new self();
        $Publish->WebPageName = str_replace(" ","_",$request->WebPageName);
        $Publish->AdvertisingName = $request->AdvertisingName;
        $Publish->AdvertisingFile = self::uploadFile($request);
        $Publish->save();
        if($Publish->id){
            return true;
        }
        
        }

  
    public static function uploadFile($request){
        $file = $request->file('AdvertisingFile');
        self::$fileName =  "default.jpg";
        if($request->hasFile('AdvertisingFile')&& $request->file('AdvertisingFile')->isValid()){
            self::$fileName = time().$file->getClientOriginalName();
            $file-> move(public_path()."\img\publishes",self::$fileName);
            
        }
        return self::$fileName;
    }
     public static function updatePublish($request,$id){
        $valid = false;
        $Publish =self::find($id);
        //select* from Category where cat_name = $category['cat_name']
        $checkPubName = DB::select('select * from publishes where WebPageName = ? '
        , [$request->AdvertisingName]);
        
        if(count($checkPubName) == 0){
            $Publish->WebPageName = str_replace(" ","_",$request->WebPageName);
            $Publish->AdvertisingName = $request->AdvertisingName;
            if($request->hasFile('AdvertisingFile')){
            $Publish->AdvertisingFile = self::uploadFile($request);
            }
            $Publish->save();
            if($Publish->id){
            return true;
        }
        
       } 
        return redirect ("cms/Publishes")-> withErrores("there is publishe like this");
     }

}

