<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
{{-- <link rel="stylesheet" href="{{ url('/stats/template-assets/vendor/animate/animate.css') }}">
  <link rel="stylesheet" href="{{ url('/stats/template-assets/css/bootstrap.css') }}">

  <link rel="stylesheet" href="{{ url('/stats/template-assets/css/maicons.css') }}">

  <link rel="stylesheet" href="{{ url('/stats/template-assets/vendor/owl-carousel/css/owl.carousel.css') }}">

  <link rel="stylesheet" href="{{ url('/stats/template-assets/css/theme.css') }} "> --}}


  <link rel="stylesheet" href="{{ asset('my-vendor/template-assets/vendor/animate/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('my-vendor/template-assets/css/bootstrap.css') }}">

  <link rel="stylesheet" href="{{ asset('my-vendor/template-assets/css/maicons.css') }}">

  <link rel="stylesheet" href="{{ asset('my-vendor/template-assets/vendor/owl-carousel/css/owl.carousel.css') }}">

  <link rel="stylesheet" href="{{ asset('my-vendor/template-assets/css/theme.css') }} ">

  @yield('headplus')
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light navbar-float">
          <div class="container">
            <a href="/" class="navbar-brand">#Talking<span class="text-primary">AI.</span></a>

            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarContent">
              <ul class="navbar-nav ml-lg-4 pt-3 pt-lg-0">
                <li class="nav-item active">
                  <a href="/" class="nav-link">Home</a>
                </li>


                @if (session('admin')!=null)
                <li class="nav-item">
                    <a href="{{ asset("create-article/")}}"
                    class="nav-link btn btn-outline rounded-pill">
                    Register a new article</a>
                  </li>
                  <div class="dropdown">
                    <button class="btn btn-secondary  rounded-pill dropdown-toggle ml-5"
                    type="button" data-toggle="dropdown" aria-expanded="false">
                      Category
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/categorie/create">Create</a>
                      <a class="dropdown-item" href="/categorie/list">List</a>
                    </div>
                  </div>


                @endif
                <li class="nav-item active">
                    <a href="/search" class="nav-link">Search article</a>
                  </li>
              </ul>

              @yield('navbar-admin')
            </div>
          </div>
        </nav>


      </header>

@yield('content')

<footer class="page-footer">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-3 py-3">
          <h3>#Talkin<span class="text-primary">AI.</span></h3>
          <p>Share knowledge and passion! TalkinAI.</p>
        </div>

      </div>


    </div> <!-- .container -->
  </footer> <!-- .page-footer -->

{{-- <script src="{{ url("/stats/template-assets/js/jquery-3.5.1.min.js")}}"></script>

<script src="{{url('/stats/template-assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{ url('/stats/template-assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{ url('/stats/template-assets/vendor/owl-carousel/js/owl.carousel.min.js')}} "></script>

<script src="{{ url('/stats/template-assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>

<script src="{{ url('/stats/template-assets/vendor/animateNumber/jquery.animateNumber.min.js')}}"></script>

<script src="{{ url('/stats/template-assets/js/google-maps.js')}}"></script>

<script src="{{ url('/stats/template-assets/js/theme.js');}}"></script> --}}

<script src="{{ asset("my-vendor/template-assets/js/jquery-3.5.1.min.js")}}"></script>

<script src="{{asset('my-vendor/template-assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{ asset('my-vendor/template-assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{ asset('my-vendor/template-assets/vendor/owl-carousel/js/owl.carousel.min.js')}} "></script>

<script src="{{ asset('my-vendor/template-assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>

<script src="{{ asset('my-vendor/template-assets/vendor/animateNumber/jquery.animateNumber.min.js')}}"></script>

<script src="{{ asset('my-vendor/template-assets/js/google-maps.js')}}"></script>

<script src="{{ asset('my-vendor/template-assets/js/theme.js');}}"></script>

</body>
</html>
