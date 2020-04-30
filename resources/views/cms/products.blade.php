


@extends('cms.master')

@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


@if(Session('sm'))
    <div class ="contianer">
      <div class="alert alert-success text-center sm" role="alert">
         {{Session::get('sm')}}
      </div>
    </div>
    @endif

    @if (!$errors)
        <div class ="contianer">
        <div class=" text-center" role="">
    @endif

<div <class="container">
  <div class="row pt-3">
  <h1 style="color:pink">{{$title}}</h1>

  </div>
</div>

  <div class="album py-5 ">
    <div class="container">
       <div class="row">
       <h5 style="color:black">Type product name or category name in the input field to search product name or category name :</h5>
       <input class="form-control text-info" id="myInput" type="text" placeholder="Search product name or category name..">
       <br>


        <table class="table table-bordered text-info text-center">
  <thead>
    <tr>
      <th id="sorts" scope="col">#</th>
      <th id="sorts" scope="col">Products Name</th>
      <th id="sorts" scope="col">Category Name</th>
      <th id="sorts" scope="col">price Nis
      <i class="fa fa-sort" aria-hidden="true" ></i>
      </th>
      <th scope="col">Edit Products</th>
      <th scope="col">Delete Products</th>

    </tr>
  </thead>
  <tbody id="myTable">
  <?php $counter = 1 ;?>
  @foreach($products as $data)
    <tr>
      <td scope="row">{{$counter++}}</td>
      <td >{{$data->name}}</td>
      <td>{{$data->cat_name}}</td>
      <td id="">{{$data->price}}</td>
      <th>
        <button id="" class="btn btn-sm btn-outline-secondary " onclick="window.location='{{url('cms/products'."/".$data->id."/".'edit')}}'" >
        <i class="far fa-edit"></i>
        </button>
      </th>
      <th>
        <button id="{{url('cms/products')."/".$data->id}}" class="btn btn-sm btn-outline-secondary" onclick="window.location='{{url('cms/products')."/".$data->id}}'">
        <i class="fas fa-trash-alt"></i>
        </button>
      </th>

    </tr>
  @endforeach

  </tbody>
  </table>
  <input type="hidden" id="name_order" value="asc">
  <input type="hidden" id="priceOrder" value="asc">


    <input  type="button" class="btn btn-success " value="+ Add New" onclick="window.location='{{url('cms/products/create')}}'"/>

 </div>
</main>
@endsection
