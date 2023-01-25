<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        
        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="/login" method="post">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="email">
                Email:
            </label>
            <input type="email" class="form-control" name="email" placeholder="Type your Email here:">
        </div>

        <div class="form-group">
            <label for="password">
                Password:
            </label>
            <input type="password" class="form-control" name="password" placeholder="Type your Password here:">
        </div>

        <button type="submit" class="btn btn-primary">
            Login
        </button>

    </form>

    </body>
</html>