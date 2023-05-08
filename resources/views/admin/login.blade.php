@extends('layout.navbar-admin')

@section('content')

<main>
    <div class="page-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3">
            <h2 class="title-section">Log as an admin</h2>
            <div class="divider"></div>

          </div>
          <div class="col-lg-6 py-3">
            <div class="subhead">Create,Innovate!</div>
            <h2 class="title-section">Inspire people!</h2>
            <div class="divider"></div>

            <form action="" method="post" >
                @csrf
              <div class="py-2">
                <label for="email" class="form-label">Email:</label>
                <input type="email" value="admin@gmail.com" name="email" class="form-control" placeholder="Email..">
              </div>
              <div style="height: 10px;"></div>
              <div class="py-2">
                <label for="password" class="form-label">Mot de passe:</label>
                <input type="password" value="admin" name="mdp" class="form-control" placeholder="Mot de passe...">
              </div>

              <button type="submit" class="btn btn-primary rounded-pill mt-4">Log in</button>
            </form>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  </main>

@endsection

