<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ url('/stats/ckeditor/ckeditor.js') }}" ></script>
    <link href="{{url('/stats/ckeditor/contents.css') }}" rel="stylesheet">
</head>
<body>
    <form action="/updatearticle" method="post">
        @csrf
    Titre: <input type="text" value="{{ $article->titre }}" name="titre" />
    <input type="hidden" value="{{ $article->id }}" name="id" />
    Resume:  <input type="text" name="resume" value="{{ $article->resumee }}"/>
    Categorie:<select name="categorie">
        
        @foreach ($categories as $categorie)
       <option value="{{ $categorie->id }}">{{ $categorie->nomcategorie }}</option>
    @endforeach
    </select>
    Contenu:<textarea name="contenu" id="editor">{{ $article->contenu }}</textarea>

<script>
    CKEDITOR.replace('contenu');
</script>


    <button type="submit">Valider</button>
</form>
</body>
</html>

