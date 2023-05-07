@extends("layout.navbar-admin")
@section('content')
<div class="page-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3">
          <div class="img-fluid text-center">
            @if ($article->link==null && $article->base_64==null)
            <span class="mai-scan-circle"></span>
            @elseif ($article->link!=null
            && File::exists(File::exists(storage_path('app/public/images' . $article->link))))

            <img  class="card-img-top img-thumbnail"
            style="height:200px;" src="{{ url('/'.'sary'.'/'.$article->link)}}" >
            @else
            <img  class="card-img-top img-thumbnail"
            style="height:200px;" src="{{ $article->base_64 }}" >
            @endif

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


