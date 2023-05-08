@extends("layout.navbar-admin")
@section('headplus')
<meta name="description" content="{{ $article->resume }}">
@section('content')
<div class="page-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3">
          <div class="img-fluid text-center"  >
            <img  class="card-img-top img-thumbnail"
             src="{{ $article->base_64 }}" alt={{$article->resumee}}>
          </div>
        </div>
        <div class="col-lg-6 py-3 pr-lg-5">
          <h1 class="title-section ">{{ $article->titre }}</h1>
          <div class="divider"></div>
          <p>Categorie:<span class="badge badge-primary badge-lg">{{ $article->nomcategorie }}</span></p>
          <div class="container">
            {!! $article->contenu !!}

          </div>


        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->


@endsection


