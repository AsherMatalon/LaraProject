


@extends('master.master')

@section('content')
<div <class="container">
  <div class="row pt-3">
        <h1>Please Sign Up </h1>
  </div>
</div>

  
    <div class="container ">
      <div class="row">
      <div class="col-3"></div>
        <div class= "col-6">
          <form class="form-signin" action="{{url('user/signup')}}" method="post">
            @csrf

            <label for="inputEmail" class="sr-only">Full Name</label>
            <input type="text" name="name" class="form-control" placeholder="Full Name" required autofocus>

            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
            @if($errors->has('email')) 
            <span class="text-danger">{{$errors->first('email')}} </span>
            @endif
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            
            @if($errors->has('password'))
              <span class="text-danger">{{$errors->first('password')}}</span>
            @endif

            <label for="inputPassword" class="sr-only">re_Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Re Password" required>

            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign Up">
          </form>
        </div>
            
          </div>
    </div>
  

@endsection