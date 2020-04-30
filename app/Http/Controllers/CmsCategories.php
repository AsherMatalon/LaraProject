<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Http\Requests\AddCategory;
use session;
class CmsCategories extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        self::$data['title'].="categories";
        self::$data['categories'] = categorie::all()->toArray();
        
        return view ("cms.categories",self::$data);
        print_r(Categorie::all()->toArray());
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        self::$data['title'].="Add New Category";
        return view ("cms.addcategory",self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategory $request)
    {
       if(Categorie::saveNewCategory($request)){
           
           Session::flash('sm',"new category added");
           return redirect('cms/categories');
           
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
       if(self::$data['category']= Categorie::find($id)->toArray()){
        self::$data['title'].="Delete Form"; 
        self::$data['deleteType']="Category";
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
        if(self::$data['category']= Categorie::find($id)->toArray()){
            self::$data['title'].="Edit Form"; 
            return view("cms.EditCategory",self::$data);
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
        if(Categorie::updateCategory($request,$id)){
            Session::flash('sm'," category upadded");
            return redirect('cms/categories');
            
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

          Categorie::destroy($id);
          Session::flash('sm',"category has been delete");
          return redirect("cms/categories");
       
          
        }
    }
}
