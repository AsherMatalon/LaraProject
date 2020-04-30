<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\publishe;
use App\Http\Requests\AddPublish;
use session;

class CmsPublishes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     self::$data['title'].="publish Erea";
     self::$data['publishes'] = publishe::all()->toArray();
     //dd(self::$data['publishes']);
     return view ("cms.publishes",self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        self::$data['title'].="Add New publish";
        return view ("cms.addpublish",self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPublish $request)
    {
        // <input type="checkbox" name="cat_id[]">
        dd($request->cat_id);
        $cat = Categorie::find($request->cat_id);
        if($cat){

        }
        //echo __METHOD__;
        if(publishe::saveNewPublishes($request)){
            
            if($request->WebPageName === 'categories'){            
            Session::flash('sm',"new publish added");
            dd($request->WebPageName);
            
            }
        }
        else {
            Session::flash('sm',"you can choose only between categories/products");
            return redirect('cms/addpublish');
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
       if(self::$data['publishes']= publishe::find($id)->toArray()){
        self::$data['title'].="Delete Form"; 
        self::$data['deleteType']="publish";
        return view("cms.deleteForm",self::$data);
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
        if(self::$data['publishes']= publishe::find($id)->toArray()){
            self::$data['title'].="Edit Form"; 
            return view("cms.Editpublish",self::$data);
           }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddCategory $request, $id)
    {
        if(publishe::updatepublishes($request,$id)){
            Session::flash('sm'," publish upadded");
            return redirect('cms/publishes');
            
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

          publishe::destroy($id);
          Session::flash('sm',"publish has been delete");
          return redirect("cms/publishes");
       
          
        }
    }
}
