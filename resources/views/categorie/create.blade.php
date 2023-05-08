@extends('layout.navbar-admin')
@section('headplus')
<meta name="description" content="Create a category of article">
@endsection
@section('content')
<div style="height: 100px"></div>
<main>
    <div class="page-section">
      <div class="container">

            <h2 class="title-section">Register category!</h2>
            <div class="divider"></div>

            <form action="/categorie" method="post"  >
                @csrf
              <div class="py-2">
                <label for="titre" class="form-label">Category name:</label>
                <input type="text" name="nomcategorie" class="form-control"  placeholder="Enter the name...">
              </div>
              <button type="submit" class="btn btn-outline-success rounded-pill mt-4">Register category</button>
            </form>


      </div> <!-- .container -->
    </div> <!-- .page-section -->
  </main>

@endsection
