<div>
    <nav class="main-header navbar navbar-expand border-bottom border-primary bg-black">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    
        <ul class="navbar-nav ml-auto">
    
            <li class="nav-item dropdown user-menu">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset($usuarioAuth->person_img) }}"
                        class="user-image img-circle elevation-2 border border-primary" alt="User Image">
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right bg-black border border-primary" style="left: inherit; right: 0px; backdrop-filter: blur(1rem);">
                    <!-- User image -->
                    <li class="user-header bg-black border-bottom border-primary">

                        <img src="{{ asset($usuarioAuth->person_img)}}"
                        class="img-circle elevation-2 border border-primary" alt="User Image"">

                        <div class="text-primary my-2">
                            <h6>{{ $usuarioAuth->Nombre_Apellido }}</h6>
                            <p>Fecha de nacimiento: {{ date('d/m/Y', strtotime($usuarioAuth->person_birthDate)) }}</p>
                        </div>
                        
                    </li>
                    <!-- Menu Footer-->
                    <li class="w-100 p-3">
                        <form action="{{ route('user.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    
    </nav>
    
</div>
