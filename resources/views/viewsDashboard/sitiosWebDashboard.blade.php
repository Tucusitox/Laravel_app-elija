<x-LayoutDashBoard title="Dashboard">

    <div class="content-wrapper bg-black p-2" style="min-height: 1761.5px;">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="color: #0d6efd;">

            <div class="container-fluid mx-3">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Mis Sitios web</h1>
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
            @livewire('sitios-web-user')
        </section>

    </div>

</x-LayoutDashBoard>
