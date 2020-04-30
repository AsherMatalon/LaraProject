


@extends('cms.master')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="container">
  
        <h1>Are you sure you want to delete this {{$deleteType}} </h1>
  
</div>

  <div class="album py-5 bg-light ">
    <div class="container ">
      <div class="row">
        <div class= align-self-center>
          <form class="form-signin" action="{{url('cms/products')."/".$product['id']}}" method="post" enctype="multipart/form-data">
            @csrf
            
            @method('DELETE')
            <input  type="submit"  class="btn btn-lg btn-primary btn-block"  value="Delete {{$deleteType}} ">
          </form>
          </div>
            
          </div>
    </div>
  </div>
</main>

@endsection