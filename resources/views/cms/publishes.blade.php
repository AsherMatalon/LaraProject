


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

  <div class="album py-5 bg-light">
    <div class="container">
       <div class="row">
       <p>Type product name or category name in the input field to search product name or category name :</p>
       <input class="form-control" id="myInput" type="text" placeholder="Search product name or category name..">
       <br>

        <table id="tableTable" class="table table-bordered table-dark text-center">
  <thead>
    <tr>
      <th id="sorts" scope="col">#</th>
      <th id="sorts" scope="col">Web Page Name</th>
      <th scope="col">Advertising Name</th>
      <th scope="col">Edit </th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody id="myTable">
  <?php $counter = 1 ;?>
  @foreach($publishes as $data)
    <tr>
      <td scope="row">{{$counter++}}</td>
      <td >{{$data["WebPageName"]}}</td>
      <td>{{$data["AdvertisingName"]}}</td>

      <th>
        <button id="" class="btn btn-sm btn-outline-secondary " onclick="window.location='{{url('cms/publishes'."/".$data["id"]."/".'edit')}}'" >
        <i class="far fa-edit"></i>
        </button>
      </th>
      <th>
        <button id="" class="btn btn-sm btn-outline-secondary" onclick="window.location='{{url('cms/publishes')."/".$data["id"]}}'">
        <i class="fas fa-trash-alt"></i>
        </button>
      </th>

    </tr>
  @endforeach

  </tbody>
  </table>
  <input type="hidden" id="name_order" value="asc">
  <input type="hidden" id="priceOrder" value="asc">


    <input  type="button" class="btn btn-success " value="+ Add New" onclick="window.location='{{url('cms/publishes/create')}}'"/>

 </div>
</main>
@endsection
