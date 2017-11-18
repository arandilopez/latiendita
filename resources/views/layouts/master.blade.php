<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('titulo', 'Bienvenido') - La Tiendita</title>
        <style media="screen">
            table {
                background-color: red;
            }
        </style>
    </head>
    <body>
        <h1>Hola!</h1>
        @yield('contenido')
    </body>
</html>
