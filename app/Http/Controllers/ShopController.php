<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\Order;
use Cart;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ShopController extends Controller
{
   public static function addToCart(Request $request){
    //    echo $_GET['product_id'];
    if(is_numeric($request->product_id)&& $request->product_id != 0){
        if($product= Product::find($request->product_id)->toArray()){
            Cart::add($product['id'],$product['name'], $product['price'], 1, array());
            Session::flash('sm',"{$product['name']} Added to the cart");
            echo true ;
        }else{
            //  #todo return redirect('/');

        }
    }else{//  #todo return redirect('/');
    }

   }
   public static function UpdateCart(Request $request){
    if(is_numeric($request->product_id)&& $request->product_id != 0){
        if (Cart::get($request->product_id)){
            Cart::update(
                $request->product_id,
                array(
                    'quantity' => -1,
                )
            );
            Session::flash('sm',"Product Update In The Cart");
            echo true ;
        }
    }

   }

   public static function DeleteProduct(Request $request){
    Cart::remove($request->product_id);
    Session::flash('sm',"Product Delete From The Cart");
    echo true ;
   }

   public static function ShowCart(){

      Self::$data['title'].="Cart";
      Self::$data["CartContent"]= json_decode((Cart::getContent()->toJson()));
      $order= (DB::select('SELECT * FROM orders ORDER BY ID DESC LIMIT 1'));
    //   dd(json_decode($order[0]->content));
        $order=json_decode($order[0]->content);
        // foreach($order as $item){
        //     dd($item);
        // }
    //   $order = (array)(json_decode(json_encode($order["0"]), true))['content'];
    //   $order =(array)(json_decode(json_encode($order["0"]), true));
    //   $order= (array)(json_decode($order[0])) ;
    //   $order = (array)$order;


    //   echo "<pre>";
    //   var_dump($order);die;
      self::$data["LastOrderSaved"]=$order;
      return view('cart',self::$data);
   }
   public static function SaveOrder(){
       if(session::get('user_id')){
           if(Cart::getTotalQuantity()>0){
            if(Order::Saveorder()){
                Session::put('orderId',Order::get()->last());
                Session::flash('sm',"your order has been saved");

                // $order= (DB::select('SELECT * FROM orders ORDER BY ID DESC LIMIT 1'));
                // $order = (array)(json_decode(json_encode($order["0"]), true))['content'];
                // $order =(array)(json_decode(json_encode($order["0"]), true));
                // $order= (array)(json_decode($order[0])) ;
                // $order = (array)$order[1];

                // $url= url();
                // dd($url);die;

               // echo "<pre>";
                //var_dump($order);die;
               // dd($order);
                // self::$data["LastOrderSaved"]=$order;
                //dd(self::$data["LastOrderSaved"]);//['content']);
                return redirect("shop/GoToCart");
            }else{
                return redirect("shop/GoToCart")->withErrors("somthing worng call us to solve the problem");
            }
           }else{
            return redirect("/")->withErrors("The cart must have minimum 1 product ");
           }

       }else{
         return redirect("user/login")->withErrors("you must sign in ");
       }
   }
}
