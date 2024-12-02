<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/logo-icono.ico') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="adminLTE V3 (ASSETS)/plugins/fontawesome-free/css/all.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="adminLTE V3 (ASSETS)/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="adminLTE V3 (ASSETS)/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="adminLTE V3 (ASSETS)/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="adminLTE V3 (ASSETS)/dist/css/adminlte.min.css">
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Estilos extras -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <title>{{ $title ?? 'Laravel' }}</title>
</head>

<body class="bg-black" style="height: auto;">

    <div class="row align-items-center justify-content-center vh-100 container-fluid">
        {{ $slot }}
    </div>
    {{-- PARA CUANDO SE ENVIE EL FORMULARIO CON LA INFORMACION --}}
    <x-ModalDeCarga/> 

    <!-- jQuery -->
    <script src="adminLTE V3 (ASSETS)//plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="adminLTE V3 (ASSETS)//plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="adminLTE V3 (ASSETS)//plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="adminLTE V3 (ASSETS)//plugins/moment/moment.min.js"></script>
    <script src="adminLTE V3 (ASSETS)//plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="adminLTE V3 (ASSETS)//plugins/daterangepicker/daterangepicker.js"></script>
    <!-- BS-Stepper -->
    <script src="adminLTE V3 (ASSETS)//plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- Logica jsQuery-->
    <script src="{{ asset('js/logicaJquery.js') }}"></script>
    <!-- Previsualizar Imagen de formualario de registro-->
    <script src="{{ asset('js/previsualizarImg.js') }}"></script>
    <!-- SweetAlert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Validar Idenfiicación desde el cliente -->
    <script src="{{asset('js/validarIdentificacion.js')}}"></script>

    {{-- ESTILOS PARA SWEET-ALERT2 --}}
    <style>
        .swal2-modal{
            background: black;
            border: 2px solid #0d6efd;
            padding: 10px;
        }
        .swal2-modal h2{
            text-align: center;
            font-size: 23px;
            color: #dc3545;
        }
        .swal2-confirm{
            color: #dc3545;
            background: transparent;
            border: 2px solid #dc3545;
        }
    </style>
    
</body>

</html>
