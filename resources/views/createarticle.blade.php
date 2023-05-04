<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<link href="{{asset('vendor/ckeditor/contents.css') }}" rel="stylesheet"> --}}

<script src="{{ secure_url('/stats/ckeditor/ckeditor.js') }}" ></script>
<link href="{{ secure_url('/stats/ckeditor/contents.css') }}" rel="stylesheet">

</head>
<body>
    <form action="article" method="post">
        @csrf
    Titre: <input type="text" name="titre" />
    Resume:  <input type="text" name="resume" />
    Categorie:<select name="categorie">
        @foreach ($categories as $categorie)
       <option value="{{ $categorie->id }}">{{ $categorie->nomcategorie }}</option>
    @endforeach
    </select>
    Contenu:<textarea name="contenu" id="editor"></textarea>

<script>
    CKEDITOR.replace('contenu');
</script>


    <button type="submit">Valider</button>
</form>
</body>
</html>

