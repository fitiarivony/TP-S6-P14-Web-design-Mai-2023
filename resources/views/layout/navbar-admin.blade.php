@extends('layout.article')


@section('navbar-admin')
<div class="ml-auto flex">
    @if (session('admin')!=null)
    <a href="/admin/deconnexion"  class="btn btn-outline rounded-pill">Deconnect</a>

    @else
    <a href="/admin/login-admin"  class="btn btn-outline rounded-pill">Log as an admin</a>
    @endif
  </div>
@endsection
