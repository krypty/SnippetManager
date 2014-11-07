<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>@yield('titre')</title>
    </head>
    <body>
        <table>
            <tr>
                <th>Pseudo</th>
                <th>Adresse mail</th>
            </tr>
            @yield('users')
        </table>
    </body>
</html>