<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/logo-icono.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <!-- Estilos extras -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <title>{{ $title ?? 'Laravel' }}</title>
</head>

<body class="sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed bg-black">

    <div class="wrapper w-100">

        @livewire('navbar-users')
        {{-- @livewire('sidebar-dashboard') --}}
        <x-Sidebar />
        <x-AlertaPorInactividad />

        {{ $slot }}

    </div>

    <!-- jQuery -->
    <script src="{{ asset('adminLTE V3 (ASSETS)/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminLTE V3 (ASSETS)/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminLTE V3 (ASSETS)/dist/js/adminlte.min.js') }}"></script>
    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Cerrar sesion por inactividad -->
    <script src="{{ asset('js/cierrePorInactividad.js') }}"></script>

    {{-- ELIMINAR LA LLAVE EN EL LOCAL STORAGE QUE MANEJA EL REFRESCAMIENTO DEL LOGIN DESPUES DE CERRAR SESION POR INACTIVIDAD --}}
    <script>
        window.addEventListener('beforeunload', function(event) {
            if (localStorage.getItem('refreshed')) {
                localStorage.removeItem('refreshed');
            }
        });
    </script>

    <style>
        body::-webkit-scrollbar {
            width: 5px;
        }

        body::-webkit-scrollbar-thumb {
            background: #0d6efd;;
            border-radius: 10px;
        }
    </style>
</body>

</html>
