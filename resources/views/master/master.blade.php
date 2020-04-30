
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>{{$title}}</title>
    <script> var BASE_URL="{{url('')}}";</script>
    {{$_GET['succes']=''}}

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/carousel/"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- Favicons -->
<!-- <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c"> -->


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
    <link href="{{asset('css/my_css.css')}}" rel="stylesheet">
  </head>
  <body>
    <header>
  <nav class="navbar navbar-expand-lg navbar-blue fixed-top bg-info">

    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" style="color:#ffccff"  href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="{{url('shop/GoToCart')}}">
          <span id="cart_icon" style="color:#ffccff">
            {{Cart::getTotalQuantity()}}
          </span>
          <i class="fab fa-opencart" style="color:#ffccff"></i>
          </a>
        </li>

      </ul>
      @if(!Session::get('user_id'))
        <a href="{{url('user/login')}}">
         <button class="btn btn-outline-primary my-2 my-sm-0" style="color:#ffccff"  type="submit">Login</button>
        </a>
        <a href="{{url('user/signup')}}">
         <button class="btn btn-outline-primary my-2 my-sm-0" style="color:#ffccff" type="submit">SignUp</button>
        </a>
      @else
        <a href="{{url('user/logout')}}">
          <button class="btn btn-outline-primary my-2 my-sm-0" style="color:#ffccff" type="submit">Log out</button>
        </a>
      @if(Session::get('is_admin')==true)
        <a href="{{url('cms/dashboard')}}">
          <button class="btn btn-outline-primary my-2 my-sm-0" style="color:#ffccff" type="submit">CMS</button>
        </a>
      @endif
      @endif

      @if(!Session::get('user_id'))
        <a href="{{url('/auth/redirect/facebook')}}">
          <input class="btn btn-outline-primary my-2 my-sm-0"  style="color:#ffccff" type="submit" value="facebook">
        </a>
      @endif

    </div>
  </nav>
</header>
@if(Session('sf'))
  <div class ="contianer">
      <div class="alert alert-success text-center sf" role="alert">
         {{Session::get('sf')}}
      </div>
  </div>
@endif
@if(Session('sm'))
  <div class ="contianer">
      <div class="alert alert-success text-center sm " role="alert">
         {{Session::get('sm')}}
      </div>
  </div>
@endif
@if ($errors)
        <div class ="contianer">
          @foreach ($errors->all() as $message)
            <div class="alert alert-danger text-center sm" role="alert">
            {{$message}}
          @endforeach
          </div>
        </div>
@endif
@if (!$errors)
    <div class ="contianer">
    <div class=" text-center" role="">
    </div>
        </div>

@endif


@yield('content')




  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2017-2019 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"   integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="   crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="{{asset('mainjs/myjs.js')}}" type ="text/javascript"></script>

<script src="jquery.tablesort.js"></script>

</body>
</html>
