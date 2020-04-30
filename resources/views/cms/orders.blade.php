


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

      <th scope="col">No. order</th>
      <th scope="col">User Id</th>
      <th scope="col">Content</th>
      <th scope="col">SubTotal</th>
      <th scope="col">Creat date</th>
    </tr>
  </thead>
  <tbody>
  <?php $counter = 1 ;?>
  @foreach($orders as $data)
    <tr>
      <th scope="row">{{$data->id}}</th>
      <th scope="row">{{$data->user_id}}</th>
      <th scope="row">{{$data->content}}</th>
      <th scope="row">{{$data->subtotal}}</th>
      <th scope="row">{{$data->created_at}}</th>

    </tr>
  @endforeach

  </tbody>
  </table>


 </div>
</main>
@endsection
