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
        <h1>SIGN UP</h1>     
        <form action="{{ route('user.register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif
            <div>
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" aria-describedby="dni-help" required>
            </div>
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" aria-describedby="email-help" required>
            </div>
            <div>
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" aria-describedby="password-help" required>
            </div>
            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name-help" required>
            </div>
            <div>
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" aria-describedby="address-help" required>
            </div>
            <div>
                <label for="birthdate" class="form-label">Birthdate</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" aria-describedby="birthdate-help" required>
            </div>
            <div>
                <label for="sex" class="form-label">Sex</label>
                <select id="sex" name="sex" aria-describedby="sex-help" class="form-select" aria-label="Specify your sex" required>
                    <option value="false" disabled selected>Select your sex</option>
                    <option value="1">Men</option>
                    <option value="0">Woman</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary text-white">REGISTER</button>
        </form>
        <br>
        <div>
            <div><a href="{{ route('user.index') }}">Sign in</a></div>
        </div>
    </body>
</html>