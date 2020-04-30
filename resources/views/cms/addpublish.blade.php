


@extends('cms.master')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div <class="container">

        <h1>Here you can add new Publish </h1>

</div>

  <div class="album py-5 bg-light ">
    <div class="container">
      <div class="row">
        <div class= align-self-center>
          <form class="form-signin" action="{{url('cms/publishes')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label  class="sr-only">Where do you want to publish your Advertise</label>
            <input type="checkbox"  id="1" name="cat_id[]"  >Home Web page  </br>
            <input type="checkbox"  id="2" name="cat_id[]"  >Categotries web Page  </br>
            <input type="checkbox"  id="3" name="cat_id[]"  >Products web Page  </br>

            <label  class="sr-only">Advertising Name</label>
            <input type="text" name="AdvertisingName" class="form-control" placeholder="Advertising Name" >
            <label  class="sr-only">Image</label>
            <input  type="file" name="AdvertisingFile" class="form-control"  placeholder="Image">

            <input  type="submit"  class="btn btn-lg btn-primary btn-block"  value="Save">
          </form>
          </div>

          </div>
    </div>
  </div>
</main>

@endsection
