<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\product;
use App\categorie;
use session;
use App\Http\Requests\AddProduct;
use App\Http\Requests\EditProduct;

class CmsProducts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     self::$data['title'].="products";
     self::$data['products'] = DB::select('select p.*,c.cat_name from categories as c join products  as p on c.id=p.cat_id' );
     return view ("cms.products",self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        self::$data['title'].="Add New product";
        self::$data['categories'] = categorie::all()->toArray();
        return view ("cms.addproduct",self::$data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProduct $request)
    {
        if(product::saveNewProduct($request)){

            Session::flash('sm',"new product added");
            return redirect('cms/products');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(self::$data['product']= DB::select('select p.*,c.cat_name from categories as c join products  as p on c.id=p.cat_id ')){

            self::$data['title'].="Delete Form";
            self::$data['deleteType']="product";
            return view("cms.deleteProduct",self::$data);
           }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if( $product= DB::select('select p.*,c.cat_name from categories as c join products  as p on c.id=p.cat_id where p.id=?',[$id])){
            self::$data['product'] = $product[0];
            self::$data['categories'] = categorie::all();
            self::$data['title'].="Edit Form";
            return view("cms.EditProduct",self::$data);
           }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProduct $request, $id)
    {
        if(product::updateProduct($request,$id)){
            Session::flash('sm'," product upadded");
            return redirect('cms/products');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id && is_numeric($id)){

            product::destroy($id);
            Session::flash('sm',"product has been delete");
            return redirect("cms/products");


          }
    }
}
