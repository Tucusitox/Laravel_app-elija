<x-LayoutDashBoard title="Dashboard">

    <div class="content-wrapper bg-black p-3" style="min-height: 1761.5px;">

        <section class="content-header" style="color: #0d6efd;">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Mis Redes Sociales</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><b>Día actual:</b> {{ date('d/m/Y') }}</li>
                        </ol>
                    </div>
                </div>
            </div>

        </section>

        <section class="content">
            @livewire('redes-sociales-user')
        </section>

    </div>


</x-LayoutDashBoard>
