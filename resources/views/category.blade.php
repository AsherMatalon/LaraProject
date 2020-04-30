


@extends('master.master')

@section('content')
<div <class="container">

  <h1 style="color:pink">{{$title}} Category Page</h1>


</div>

  <div class="album py-5 bg-light">
    <div class="container">
       <div class="row">
          @foreach($products['data'] as $data)
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">

              <img class="bd-placeholder-img card-img-top" src="{{asset('img'.'/'.'product'.'/'.$data['image'])}}" width= "100%" height="225">
              <div class="card-body">
              <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{$data['name']}}</text>
                <p class="card-text">{{$data['description']}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">

                      <input type="button" data-id="{{$data['id']}}" class="btn btn-sm btn-outline-secondary primary add_to_cart" value="Add To cart">
                      <input type="button" class="btn btn-sm btn-outline-secondary" value="Go to cart" onclick="window.location='{{url('product'.'/'.$data['id'])}}'">
                      <input type="button" class="btn btn-sm btn-outline-secondary" value="Back" onclick="window.location='{{url('/')}}'">
                    </div>
                    <small class="text-muted">{{$data['price']}}</small>
                  </div>
                </div>
                </div>
              </div>
            @endforeach
          </div>
          {{ $objProducts->links() }}
    </div>
  </div>



@endsection
