@extends('layout.navbar-admin')
@section('content')
<main>
    <div class="page-section">
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col ">
            <div class="mt-3"></div>
            <form action="searching">
                <div class="py-2">
                    <label for="texte">Titre,resume,ou description:</label>
                    <input class="form-control" type="search" name="recherche">
                </div>
                <div class="py-2">
                    <label for="categorie">Categorie:</label>
                    <div>
                    @foreach ($categories as $categorie)

                    {{$categorie->nomcategorie}}<input
                    class="ml-2"
                    type="checkbox"
                    name="categorie[]"
                    value="{{$categorie->id}}">
                    @endforeach
                </div>
                </div>
                <button type="submit" class="btn btn-primary rounded-pill mt-2">Search</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
    @if (isset($articles))

    <div class="row justify-content-center">

        @for ($i=0;$i<count($articles);$i++)
         @if ($i>0 && $i%3==0)
     </div>
     <div class="row justify-content-center">
         @endif
         <div class="col-12 d-flex col-lg-auto py-3 wow {{ $styles[$i%3]}}">
             <div class="card-pricing flex-fill">
               <div class="header">
                 <div class="price-icon">


                     <img  class="card-img-top img-thumbnail"
                      src="{{ $articles[$i]->base_64 }}" alt="{{ $articles[$i]->resumee }}">

                 </div>
                 <div class="price-title text-dark"  >{{ $articles[$i]->titre }}</div>
               </div>
               <div class="body py-3">

                 <div class="price-info h-100">
                   <p>{{ $articles[$i]->resumee }}</p>
                 </div>
               </div>
               <div class="footer">
                 <a href="{{ asset("article-".$articles[$i]->id."-".Str::slug($articles[$i]->titre)) }}"
                     class="btn btn-outline rounded-pill">View more</a>
               </div>
               <div class="divider mx-auto"></div>
               @if (session('admin')!=null)
               <div class="footer">

                 <div class="row">
                     <div class="col">
                         <a href="{{ asset("update-article-".$articles[$i]->id).'-'.Str::slug($articles[$i]->titre) }}"
                             class="btn btn-outline-warning rounded-pill">Update</a>
                     </div>
                     <div class="col">
                         <a href="{{ asset("delete-article-".$articles[$i]->id) }}"
                             class="btn btn-outline-danger rounded-pill">Delete</a>
                     </div>
                 </div>

               </div>
               @endif
             </div>
           </div>
        @endfor
     </div>
     <div style="height: 10px;"></div>
     <div class="row">
         <div class="col"></div>
         <div class="col">
         <div class="d-flex justify-content-center" >
             {!! $articles->links() !!}
         </div>
     </div>
         <div class="col"></div>
     </div>


    @endif




</div>

</div>
</main>
@endsection
