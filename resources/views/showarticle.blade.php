<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ $article->resumee }}">
        <title>{{ $article->slugtitre }}</title>
</head>
<body>

    <h1>{{ $article->titre }}</h1>
    <div id="my_text">{!! $article->contenu !!}</div>


</body>
</html>
