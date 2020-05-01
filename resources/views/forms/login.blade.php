


@extends('master.master')

@section('content')
<div <class="container">
  <div class="row pt-2">
        <h1> Please Sign In </h1>
  </div>
</div>




  <div class="album py-5 bg-light ">
    <div class="container ">
      <div class="row">
        <div class= align-self-center>
          <form class="form-signin" action="{{url('user/login')}}" method="post">
            @csrf
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
            @error('email')
            <span class="text-danger">{{$message}} </span>
            @enderror
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            @error('password')
              <span class="text-danger">{{$message}}</span>
              @enderror
            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in">
          </form>
          </div>

          </div>
    </div>
  </div>

@endsection
