<x-LayoutDashBoard title="Dashboard">

    <div class="content-wrapper bg-black p-2" style="min-height: 1761.5px;">

        <section class="content-header" style="color: #0d6efd;">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Mi Perfil</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><b>Día actual:</b> {{date('d/m/Y')}}</li>
                        </ol>
                    </div>
                </div>
            </div>

        </section>

        <section class="content text-primary">
            <div class="container-fluid">

                <div class="row cajaConLasA">

                    <div class="col-md-3">

                        <div class="card card-black card-outline">

                            <div class="card-body box-profile bg-black rounded border border-primary">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle border border-primary"
                                        src="{{ asset($userDetalles->person_img) }}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-primary text-center">
                                    {{ $userDetalles->Nombre_Apellido }}</h3>

                                <ul class="list-group list-group-unbordered text-primary text-center mb-3">
                                    <li class="list-group-item" style="background: black; border-color: #0d6efd;">
                                        <b>Edad:</b> {{ $userDetalles->person_age }} años
                                    </li>
                                    <li class="list-group-item"
                                        style="background: black; border-bottom-color: #0d6efd;">
                                        <b>Identificación:</b><br>
                                        {{ $userDetalles->person_identification }}
                                    </li>
                                    <li class="list-group-item"
                                        style="background: black; border-bottom-color: #0d6efd;">
                                        <b>Correo Electrónico:</b> {{ $userDetalles->email }}
                                    </li>
                                </ul>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-9">

                        <div class="card bg-black rounded border border-primary p-2">
                            <div class="card-header border-bottom border-primary p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link text-white active mx-2" href="#preguntasSesuridad"
                                            data-toggle="tab">
                                            Actualizar preguntas de seguridad
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="#cambioContrasena" data-toggle="tab">
                                            Cambiar contraseña
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">

                                <div class="tab-content">

                                    <div class="tab-pane active" id="preguntasSesuridad">
                                        {{-- LIVEWIRE COMPONENT --}}
                                        @livewire('cambiar-respuestas-seguridad')
                                    </div>

                                    <div class="tab-pane" id="cambioContrasena">
                                        {{-- LIVEWIRE COMPONENT --}}
                                        @livewire('cambiar-contrasena-perfil')
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="w-100 m-2">
                        <div class="card bg-black border border-primary">
                            <div class="card-header border-bottom border-primary p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link text-white active" href="#descripcion" data-toggle="tab">
                                            Descripción
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white mx-2" href="#direccion" data-toggle="tab">
                                            Dirección
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body text-primary">

                                <div class="tab-content">
                                    <div class="tab-pane active" id="descripcion">
                                        {{ $userDetalles->person_description }}
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="direccion">
                                        {{ $userDetalles->person_address }}
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>

            </div>

        </section>

    </div>

    <style>
        .form-horizontal input::placeholder {
            color: #0d6efd;
        }

        .cajaConLasA a:hover {
            background: #0b2c5d;
        }
    </style>


</x-LayoutDashBoard>
