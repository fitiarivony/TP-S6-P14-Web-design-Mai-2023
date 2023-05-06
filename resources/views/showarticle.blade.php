@extends("layout.navbar-admin")
@section('content')
<div class="page-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3">
          <div class="img-fluid text-center">
            <?php $url='/stats/images/'.$article->link ?>
            <img src="{{url($url)}}" alt="">
          </div>
        </div>
        <div class="col-lg-6 py-3 pr-lg-5">
          <h2 class="title-section ">{{ $article->titre }}</h2>
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


