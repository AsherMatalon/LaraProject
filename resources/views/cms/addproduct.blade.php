


@extends('cms.master')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div <class="container">
  
        <h1>Here you can add new Product </h1>
  
</div>

  <div class="album py-5 bg-light ">
    <div class="container ">
      <div class="row">
        <div class= align-self-center>
          <form class="form-signin" action="{{url('cms/products')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="inputEmail" class="sr-only">Product Name</label>
            <input type="text" name="name" class="form-control" placeholder="Product Name" >
            
            <input type="text" name="price" class="form-control" placeholder="Product Price" >
            <label  class="sr-only">Product Description</label>
            <input type="text" name="description" class="form-control" placeholder="Product Description" >
            
            <select class="form-control" name="cat_name">
              @foreach ($categories as $category)
                <option value="{{$category['id']}}">{{$category['cat_name']}}</option>
              @endforeach 
              
            </select> 
            <label  class="sr-only">Image</label>
            <input  type="file" name="image" class="form-control"  placeholder="Image">

            <input  type="submit"  class="btn btn-lg btn-primary btn-block"  value="Save">
          </form>
          </div>
            
          </div>
    </div>
  </div>
</main>

@endsection