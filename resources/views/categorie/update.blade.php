@extends('layout.navbar-admin')
@section('headplus')
<meta name="description" content="Update category {{ $categorie->nomcategorie }}">
@endsection
@section('content')
<div style="height: 100px"></div>
<main>
    <div class="page-section">
      <div class="container">

            <h2 class="title-section">Register category!</h2>
            <div class="divider"></div>

            <form action="/categorie/update" method="post"  enctype="multipart/form-data">
                @csrf
              <div class="py-2">
                <label for="titre" class="form-label">Category name:</label>
                <input type="text" name="nomcategorie"
                value="{{ $categorie->nomcategorie }}" class="form-control"  placeholder="Enter the name...">
                <input type="hidden" name="id" value="{{ $categorie->id }}">
              </div>
              <button type="submit" class="btn btn-outline-warning rounded-pill mt-4">Update category</button>
            </form>


      </div> <!-- .container -->
    </div> <!-- .page-section -->
  </main>

@endsection
