<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>
        
        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->
        <link rel="stylesheet" href="{{ asset('css/.css') }}">
    </head>
    <body>

    <form action="/register" method="post">
        {{ csrf_field() }}

        <div>
            <label for="name">
                Name:
            </label>
            <input type="text"  name="name" placeholder="Type your Name here:">
        </div>

        <div>
            <label for="email">
                Email:
            </label>
            <input type="email"  name="email" placeholder="Type your Email here:">
        </div>

        <div>
            <label for="password">
                Password:
            </label>
            <input type="password"  name="password" placeholder="Type your Password here:">
        </div>

        <button type="submit">
            Register
        </button>

    </form>

    </body>
</html>