@extends('layout.navbar-admin')

@section('headplus')
{{-- <script src="{{ url('/stats/ckeditor/ckeditor.js') }}" ></script>
<link href="{{url('/stats/ckeditor/contents.css') }}" rel="stylesheet"> --}}

<script src="{{ secure_url('my-vendor/ckeditor/ckeditor.js') }}" ></script>
<link href="{{secure_url('my-vendor/ckeditor/contents.css') }}" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<meta name="description" content="Register an article">

@endsection

@section('content')

<main>
    <div class="page-section">
      <div class="container">

            <h2 class="title-section">Register article!</h2>
            <div class="divider"></div>

            <form action="article" method="post"  enctype="multipart/form-data">
                @csrf
              <div class="py-2">
                <label for="titre" class="form-label">Title:</label>
                <input type="text" name="titre" class="form-control"  placeholder="Enter the title...">
              </div>

              <div class="py-2">
                <label for="resume" class="form-label" >Resume:</label>
                <input type="text" name="resume" placeholder="Enter the resume.."
                 class="form-control">
              </div>
              <div class="py-2">
                <label for="categorie" class="form-label">Category:</label>

    <select name="categorie" class="form-control">

        @foreach ($categories as $categorie)

       <option value="{{ $categorie->id }}">{{ $categorie->nomcategorie }}</option>
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
                <textarea name="contenu" id="editor" ></textarea>

                <script>
                    CKEDITOR.replace('contenu');
                </script>
              </div>


              <button type="submit" class="btn btn-outline-success rounded-pill mt-4">Register article</button>
            </form>


      </div> <!-- .container -->
    </div> <!-- .page-section -->
  </main>

@endsection







