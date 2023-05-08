<?php
use Illuminate\Support\Str;

?>
@extends('layout.navbar-admin')
@section('headplus')
<meta name="description" content="Categories">
@endsection
@section('content')
<main>
    <div class="page-section">

        <table class="table table-bordered">
            <th>Category name</th>

            @foreach ($categories as $categorie)
            <tr>
                <td>{{ $categorie->nomcategorie }}</td>
                <td><a
                href="categorie-article-update-{{ $categorie->id."-".Str::slug($categorie->nomcategorie)  }}-"
                class="btn btn-warning rounded-pill"
                    >Update category</a></td>

            </tr>
            @endforeach

            </table>

    </div>
    <div style="height: 10px;"></div>
    <div class="row">
        <div class="col"></div>
        <div class="col">
        <div class="d-flex justify-content-center" >
            {!! $categories->links() !!}
        </div>
    </div>
        <div class="col"></div>
    </div>
</main>


@endsection
