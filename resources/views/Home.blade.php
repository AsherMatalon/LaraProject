


@extends('master.master')

@section('content')

    <main role="main">
<!-- {{print_r($categories)}} -->
<!-- <div id="myCarousel" class="carousel slide" data-ride="carousel"> -->


  <br> <h2  style="text-align:center">Welcome to Baby Shop</h2>

  <div >
    <image  class="rounded mx-auto d-block" src="{{asset('img/background/baby sleeping on the.png')}}" width="auto" height="200" style="vertical-align:center" />
  </div>




<!-- </div> -->


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->
<br><br>
<div class="container marketing">

  <!-- Three columns of text below the carousel -->
  <div class="row">
  @foreach ($categories as $DataCat)
  <div class="col-lg-4">
      <image class="bd-placeholder-img rounded-circle" width="140" height="140" src="{{asset('img/categories').'/'.$DataCat['image']}}"/>
      <h2>{{$DataCat['cat_name']}}</h2>
      <p>{{$DataCat['description']}}</p>
      <p><a class="btn btn-secondary" href="{{url('category'.'/'.$DataCat['cat_name'])}}" role="button">View details &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
@endforeach



  </div><!-- /.row -->



  <!-- START THE FEATURETTES -->







  <hr class="featurette-divider">

  <!-- /END THE FEATURETTES -->

</div><!-- /.container -->


@endsection
