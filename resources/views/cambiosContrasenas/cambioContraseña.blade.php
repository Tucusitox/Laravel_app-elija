<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/logo-icono.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Cambio de contraseña</title>
</head>

<body class="bg-black">

    <main class="container vh-100 d-flex align-items-center justify-content-center">

        <div class="d-flex flex-column justify-content-center rounded border border-primary p-5">

            <div class="text-primary text-center">
                <h2 class="mb-4">
                    ¡Seleccione su método de preferencia para recuperar su contraseña!
                </h2>
                <a href="{{route('cambio.correo')}}" class="btn btn-outline-dark text-primary p-4 mx-3">
                    <i class='bx bxs-envelope fs-1'></i>
                    <h2>Correo electrónico</h2>
                </a>

                <a href="{{route('cambio.preguntas')}}" class="btn btn-outline-dark text-primary p-4 mx-3">
                    <i class='bx bx-question-mark bx-rotate-180 fs-1'></i>
                    <i class='bx bx-question-mark fs-1''></i>
                    <h2>Preguntas de seguridad</h2>
                </a>
            </div>

        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
