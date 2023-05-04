<?php use Illuminate\Support\Str; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Article</th>
                <th scope="col">Titre</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <td>{{ $article->idarticle }}</td>
                <td>{{ $article->resumee }}</td>
                <td><a href="{{ asset("article-".$article->id."-".Str::slug($article->titre)) }}">Voir article</a> </td>
                <td><a href="{{ asset("update-article-".$article->id) }}">Mettre article</a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ asset("create-article/")}}">Ajouter un nouvel article</a>

</body>
</html>

