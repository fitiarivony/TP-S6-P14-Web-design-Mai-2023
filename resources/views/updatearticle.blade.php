@extends('layout.navbar-admin')

@section('headplus')
<script src="{{ url('/stats/ckeditor/ckeditor.js') }}" ></script>
<link href="{{url('/stats/ckeditor/contents.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<meta name="description" content="{{ $article->resume }}">
@endsection

@section('content')

<main>
    <div class="page-section">
      <div class="container">

            <h2 class="title-section">Update article!</h2>
            <div class="divider"></div>

            <form action="/updatearticle" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $article->id }}" name="id" />
              <div class="py-2">
                <label for="titre" class="form-label">Titre:</label>
                <input type="text" value="{{ $article->titre }}"
                name="titre" class="form-control">
              </div>

              <div class="py-2">
                <label for="resume" class="form-label">Resume:</label>
                <input type="text" name="resume" value="{{ $article->resumee }}"
                 class="form-control">
              </div>
              <div class="py-2">
                <label for="categorie" class="form-label">Category:</label>

    <select name="categorie" class="form-control">

        @foreach ($categories as $categorie)

       <option value="{{ $categorie->id }}" @if ($categorie->id==$article->idcategorie)
        selected
       @endif>{{ $categorie->nomcategorie }}</option>
    @endforeach
    </select>
              </div>


              <div class="py-2">
                <label for="image" class="form-label">Image:</label>
                <input type="file" name="image" class="form-control">
                @if ($errors->has('image'))
                    <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                @endif
            </div>

              <div style="height: 10px;"></div>
              <div class="py-2">
                <label for="contenu" class="form-label">Content:</label>
                <textarea name="contenu" id="editor">{{ $article->contenu }}</textarea>

                <script>
                    CKEDITOR.replace('contenu');
                </script>
              </div>


              <button type="submit" class="btn btn-outline-warning rounded-pill mt-4">Update article</button>
            </form>


      </div> <!-- .container -->
    </div> <!-- .page-section -->
  </main>

@endsection




