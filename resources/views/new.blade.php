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
        @auth
            <h1>Generalitat de Catalunya</h1>
            <h3>Gestio de casals</h3>
            <h1>NEW CASAL</h1>     
            <form action="{{ route('casal.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nom-help" required>
                </div>
                <div>
                    <label for="data_inici" class="form-label">Data inici</label>
                    <input type="date" class="form-control" id="data_inici" name="data_inici" aria-describedby="data_inici-help" required>
                </div>
                <div>
                    <label for="data_final" class="form-label">Data final</label>
                    <input type="date" class="form-control" id="data_final" name="data_final" aria-describedby="data_final-help" required>
                </div>
                <div>
                    <label for="n_places" class="form-label">Numero de places</label>
                    <input type="number" class="form-control" id="n_places" name="n_places" aria-describedby="n_places-help" required>
                </div>
                <div>
                    <label for="id_ciutat" class="form-label">Ciutat</label>
                    <select id="id_ciutat" name="id_ciutat" aria-describedby="ciutat-help" class="form-select" aria-label="Specify the city" required>
                        <option value="false" disabled selected>Selecciona la ciutat</option>
                        @foreach($ciutats as $ciutat)
                            <option value="{{ $ciutat->id }}">{{ $ciutat->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button type="submit">CREATE</button>
            </form>
            <br>
            <a href="{{ route('user.home') }}">Cancelar</a>
            
            <p>Carrer Almogavers 34, 08034 Barcelona</p>
        @else
            <p>No estas registrado</p>
            <meta http-equiv="refresh" content="3; URL='/'">
        @endauth
    </body>
</html>