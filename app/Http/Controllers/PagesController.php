<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\product;
use App\Order;
use Session;

class PagesController extends Controller
{
    public function home(){
       self::$data['categories']=Categorie::all()->toArray();
       self::$data['title'].=' Home';
       if(Session::get('orderId')['id']){
            Session::flash('sf',"thank you for buying in our shop");

       }Session::get('orderId')['id']='';


       return view('Home',self::$data);

    }


    public function showCat($cat_name){
        $cat = categorie::where('cat_name',"$cat_name")->first()->toarray();
        $products=product::where('cat_id',"{$cat['id']}")->paginate(3);
        self::$data["objProducts"]=$products;
        self::$data["products"]=$products->toArray();

        // echo "<pre>";
        // var_dump($products->toArray());die;
        self::$data['title'].=" $cat_name";
        return view('category', self::$data);
    }
    public function showProduct($product_id){

       $product= Product::find($product_id)->toArray();
       $cat = categorie::where('id',"{$product['cat_id']}")->first()->toarray();
       self::$data['product']=$product;
       self::$data['title'].=" {$product['name']}";
       self::$data['category']=$cat;
       return view('product', self::$data);

    }
    public static function ShowDashboard(){
       //echo __METHOD__;
       return view ("cms.dashboard",self::$data);
    }


}
