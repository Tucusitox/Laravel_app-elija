<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/logo-icono.ico') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans-Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminLTE V3 (ASSETS)/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminLTE V3 (ASSETS)/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminLTE V3 (ASSETS)/dist/css/adminlte.min.css') }}">

    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>{{ $title ?? 'Laravel' }}</title>
</head>

<body class="hold-transition login-page bg-black">

    <div class="login-box">
        {{ $slot }}
    </div>

    <!-- jQuery -->
    <script src="{{ asset('adminLTE V3 (ASSETS)/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminLTE V3 (ASSETS)/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminLTE V3 (ASSETS)/dist/js/adminlte.min.js') }}"></script>

    {{-- CREAR EN EL LOCAL STORAGE PARA MANEJAR EL REFRESCAMIENTO DEL LOGIN DESPUES DE CERRAR SESION POR INACTIVIDAD --}}
    <script>
        if (!localStorage.getItem('refreshed')) {
            localStorage.setItem('refreshed', 'true');
            location.reload();
        }
    </script>

</body>

</html>
