<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    {{-- Test Form --}}
        <form action="api/articles/60" method="post">
            <input type="hidden" name="_method" value="delete">
            <input type="text" name="title" value="fucking title">
            <input type="text" name="description" value="test description">
            <button type="submit"></button>
        </form>
    </body>
</html>
