<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\categorie;

class product extends Model
{
    public static function saveNewProduct($request){
        

        $valid = false;
        $product = new self();
        $product->cat_id = $request->cat_name;//str_replace(" ","_",$request->cat_name);
        $product->name = $request->name;        
        $product->description = $request->description;
        $product->image = categorie::uploadFile($request);
        $product->price = $request->price;
        $product->save();
        if($product->id){
           $valid= true;
        }
        return $valid;
    }

    public static function updateProduct($request,$id){
        $valid = false;
        $product =self::find($id);
        $product->cat_id = $request->cat_name;//str_replace(" ","_",$request->cat_name);
        $product->name = $request->name;        
        $product->description = $request->description;
        $product->image = categorie::uploadFile($request);
        $product->price = $request->price;
        $product->save();
        if($product->id){
           $valid= true;
        }
        return $valid;
        
   
        
     }
}
