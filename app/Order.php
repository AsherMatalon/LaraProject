<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Cart;
use Session;
class Order extends Model
{
    public static function Saveorder(){
        $valid = false;
        $order= new self();
        $order->user_id= session::get("user_id");
        $order->content= Cart::getContent()-> toJson();
        $order->subtotal= Cart::getTotal();
        $order->save();
       // print_r(Cart::getContent()-> toJson());
        // echo serialize(Cart::getContent());
        // echo "<hr>";
        // echo Cart::getTotal();
        if($order->id){
            cart::clear();
            $valid = true;

        }
        return $valid;
}
}
