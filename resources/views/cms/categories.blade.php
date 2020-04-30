


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

  <div class="album py-5">
    <div class="container">
       <div class="row">


        <table class="table table-bordered text-info text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">category Name</th>
      <th scope="col">Edit Category</th>
      <th scope="col">Delete Category</th>
    </tr>
  </thead>
  <tbody>
  <?php $counter = 1 ;?>
  @foreach($categories as $data)
    <tr>
      <th scope="row">{{$counter++}}</th>
      <th>{{$data["cat_name"]}}</th>
      <th>
        <button id="{{url('cms/categories/'.$data['id'].'/edit')}}" class="btn btn-sm btn-outline-secondary " onclick="window.location='{{url('cms/categories'."/".$data['id']."/".'edit')}}'" >
        <i class="far fa-edit"></i>
        </button>
      </th>
      <th>
        <button id="{{url('cms/categories')."/".$data['id']}}" class="btn btn-sm btn-outline-secondary" onclick="window.location='{{url('cms/categories')."/".$data['id']}}'">
        <i class="fas fa-trash-alt"></i>
        </button>
      </th>

    </tr>
  @endforeach

  </tbody>
  </table>



    <input  type="button" class="btn btn-success " value="+ Add New" onclick="window.location='{{url('cms/categories/create')}}'"/>

 </div>
</main>
@endsection
