<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 bg-black" style="border-right: 1px solid #0d6efd;">
    <!-- Brand Logo -->
    <a class="brand-link border-bottom border-primary">
        <img src="{{ asset('img/invasor_logo.jpeg') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>App Elija</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{route('user.dashboard')}}" class="nav-link text-primary" style="font-size: 20px;">
                        <i class='bx bxs-user-detail'></i>
                        <p>Perfil</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{route('user.sitiosWeb')}}" class="nav-link text-primary" style="font-size: 20px;">
                        <i class='bx bxs-widget'></i>
                        <p>Sitios webs</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('user.redesSociles')}}" class="nav-link text-primary" style="font-size: 20px;">
                        <i class='bx bxl-meta'></i>
                        <p>Redes sociales</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<style>
    .nav-item {
        cursor: pointer;
    }
</style>
