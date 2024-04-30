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
            <a href="{{ route('casal.new') }}"><button>Afegir</button></a>
            <br> <br>
            <table style="border-collapse: collapse;">
                <tr>
                    <td style="padding: 10px; border: 1px solid black;">Nom</td>
                    <td style="padding: 10px; border: 1px solid black;">Data inici</td>
                    <td style="padding: 10px; border: 1px solid black;">Data final</td>
                    <td style="padding: 10px; border: 1px solid black;">Num places</td>
                    <td style="padding: 10px; border: 1px solid black;">Ciutat</td>
                    <td style="padding: 10px; border: 1px solid black;">Editar</td>
                    <td style="padding: 10px; border: 1px solid black;">Eliminar</td>
                </tr>
                @foreach ($casals as $casal)
                    <tr>
                        <td style="padding: 10px; border: 1px solid black;">{{ $casal->nom }}</td>
                        <td style="padding: 10px; border: 1px solid black;">{{ $casal->data_inici }}</td>
                        <td style="padding: 10px; border: 1px solid black;">{{ $casal->data_final }}</td>
                        <td style="padding: 10px; border: 1px solid black;">{{ $casal->n_places }}</td>
                        <td style="padding: 10px; border: 1px solid black;">{{ $casal->id_ciutat }}</td>
                        <td style="padding: 10px; border: 1px solid black;"><a href="{{ route('casal.edit', ['casal' => $casal]) }}">Edit</a></td>
                        <td style="padding: 10px; border: 1px solid black;"><a href="{{ route('casal.delete', ['casal' => $casal]) }}">Delete</a></td>
                    </tr>
                    @endforeach
            </table>
            <br>
            <a href="{{ route('user.logout') }}">Sign out</a>

            <p>Carrer Almogavers 34, 08034 Barcelona</p>
        @else
            <p>No estas registrado</p>
            <meta http-equiv="refresh" content="3; URL='/'">
        @endauth
    </body>
</html>