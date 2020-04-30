


@extends('cms.master')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div <class="container">
  
        <h1>Here you can add Edit your Category </h1>
  
</div>

  <div class="album py-5 bg-light ">
    <div class="container ">
      <div class="row">
        <div class= align-self-center>
          <form class="form-signin" action="{{url('cms/categories')."/".$category['id']}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type ="hidden" name="requestType" value ="update">
            <label for="inputEmail" class="sr-only">Category Name</label>
            <input type="text" name="cat_name" class="form-control" value = "{{$category['cat_name']}}">
            <label class="sr-only">Category Description</label>
            <input type="text" name="description" class="form-control" value = "{{$category['description']}}" >
            <label class="sr-only">Image</label>
            <input type="file" name="image" class="form-control"  placeholder="Image">
            <image src="{{asset('img/categories')."/".$category['image']}}" width="10%">
            <input type="submit"  class="btn btn-lg btn-primary btn-block"  value="Save">
          </form>
          </div>
            
          </div>
    </div>
  </div>
</main>

@endsection