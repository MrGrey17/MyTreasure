<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HomePage</title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
    <form method="post" action="{{ route('articles.update', 57) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input type="text" name="title">
        <input type="text" name="description">
        <input type="file" name="image">
        <button type="submit" class="btn btn-primary">Upload</button>
    
    </form>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
