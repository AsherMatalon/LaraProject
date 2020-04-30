


@extends('cms.master')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div <class="container">
  
        <h1>Here you can Edit this Product </h1>
  
</div>

  <div class="album py-5 bg-light ">
    <div class="container ">
      <div class="row">
        <div class= align-self-center>
          <form class="form-signin" action="{{url('cms/products')."/".$product->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="inputEmail" class="sr-only">Product Name</label>
            <input type="text" name="name" class="form-control" value="{{$product->name}}" >
            
            <input type="text" name="price" class="form-control" value="{{$product->price}}" >
            <label  class="sr-only">Product Description</label>
            <input type="text" name="description" class="form-control" value="{{$product->description}}" >
            
            <select class="form-control" name="cat_name">
            <option value="{{$product->cat_id}}">{{$product->cat_name}}</option>
              @foreach ($categories as $category)
                <option value="{{$category['id']}}">{{$category['cat_name']}}</option>
              @endforeach 
              
            </select> 
            <label  class="sr-only">Image</label>
            <input  type="file" name="image" class="form-control"  placeholder="Image">
            <image src="{{asset('img/products')."/".$product->image}}" width="10%">

            <input  type="submit"  class="btn btn-lg btn-primary btn-block"  value="Save">
          </form>
          </div>
            
          </div>
    </div>
  </div>
</main>

@endsection