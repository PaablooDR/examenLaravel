<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body>
        <h1>LOG IN</h1>
        <form action="{{ route('user.login') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="nick" class="form-label">Nick</label>
                <input type="text" class="form-control" id="nick" name="nick" required>
            </div>
            <div>
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary text-white">LOGIN</button>
        </form>
        <br>
        {{-- <div>
            <div id="route-signup"><a href="{{ route('user.create') }}">Sign up</a></div>
        </div> --}}
    </body>
</html>