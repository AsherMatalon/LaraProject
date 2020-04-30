


@extends('master.master')

@section('content')
<div <class="container">
  <div class="pt-4">
  <h1>{{$title}} Product Page</h1>



  </div>
</div>


@if(!Session::get('sm'))
    <div class="album py-5 bg-light">
        <div class="container">
        <div class="row">

        <table class="table table-bordered table-dark text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Qun</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Total</th>
      <th scope="col">Delete Product</th>
    </tr>
  </thead>
  <tbody>
  <?php $counter = 1 ;?>
  @foreach($CartContent as $data)

    <tr>
      <th scope="row">{{$counter++}}</th>
      <th scope="col">{{$data->name}}</th>
      <th>
        <button data-id="{{$data->id}}" class="btn btn-sm btn-outline-secondary add_to_cart" >
          <i class="far fa-plus-square"> </i>
        </button>
        {{$data->quantity}}
        <button data-id="{{$data->id}}" class="btn btn-sm btn-outline-secondary update_cart" >
          <i class="far fa-minus-square"> </i>
        </button>
      </th>

      <th scope="col">{{$data->price}} $</th>
      <th scope="col">{{$data->quantity*$data->price}}  $</th>
      <th scope="col">
        <button data-id="{{$data->id}}" class="btn btn-sm btn-outline-secondary delete_product" >
        <i class="fas fa-trash-alt"></i>
        </button>
      </th>

    </tr>
  @endforeach

  </tbody>
  </table>

    <button type="button" class="btn btn-info ml">Sub Total: {{Cart::getSubtotal()}} $</button>

        <input  type="button" class="btn btn-success ml-3" value="Save To Pay" onclick="window.location='{{url('shop/save_order')}}'">
    @endif

    @if(Session::get('sm'))
    <div class="album py-5 bg-light">
    <div class="container">
       <div class="row">


        <table class="table table-bordered table-dark text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Qun</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Total</th>
      <th scope="col">Delete Product</th>
    </tr>
  </thead>
  <tbody>
  <?php $counter = 1 ;?>
  @foreach($LastOrderSaved as $data)

    <tr>
      <th scope="row">{{$counter++}}</th>
      <th scope="col">{{$data->name}}</th>
      <th>
        <button data-id="{{$data->id}}" class="btn btn-sm btn-outline-secondary add_to_cart" >
          <i class="far fa-plus-square"> </i>
        </button>
        {{$data->quantity}}
        <button data-id="{{$data->id}}" class="btn btn-sm btn-outline-secondary update_cart" >
          <i class="far fa-minus-square"> </i>
        </button>
      </th>

      <th scope="col">{{$data->price}} $</th>
      <th scope="col">{{$data->quantity*$data->price}}  $</th>
      <th scope="col">
        <button data-id="{{$data->id}}" class="btn btn-sm btn-outline-secondary delete_product" >
        <i class="fas fa-trash-alt"></i>
        </button>
      </th>

    </tr>
  @endforeach

  </tbody>
  </table>

    <button type="button" class="btn btn-info ml">Sub Total: {{Cart::getSubtotal()}} $</button>

        <input  type="button" class="btn btn-success ml-3" value="Pay Now " onclick="window.location='{{url('pay').'/'.Session::get('orderId')['id']}}'">
    @endif
 </div>
@endsection
