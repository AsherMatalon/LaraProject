


@extends('master.master')

@section('content')
<div <class="container">

  <h1 style="color:pink">{{$title}} Product Page</h1>


</div>

  <div class="album py-3 bg-light">
    <div class="container">
       <div class="row">

          <div class="col-sm-4">
            <div class="card mb-8 shadow-sm center">

              <img class="bd-placeholder-img card-img-top  " src="{{asset('img'.'/'.'product'.'/'.$product['image'])}}" width= "140" height="250">
              <div class="card-body">
              <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{$product['name']}}</text>
                <p class="card-text">{{$product['description']}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <input type="button" data-id="{{$product['id']}}" class="btn btn-sm btn-outline-secondary primary add_to_cart" value="Add To cart"/>
                    <input type="button" class="btn btn-sm btn-outline-secondary" value="Go to cart" onclick="window.location='{{url('shop/GoToCart')}}'">
                    <input type="button" class="btn btn-sm btn-outline-secondary" value="Back" onclick="window.location='{{url('category'.'/'.$category['cat_name'])}}'">
                    </div>
                    <small class="text-muted">{{$product['price']}}$</small>
                  </div>
                </div>
                </div>

              </div>

          </div>
    </div>
  </div>



@endsection
