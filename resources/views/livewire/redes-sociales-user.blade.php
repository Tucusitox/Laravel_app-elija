<div>

    <div class="container-fluid mb-3">

        <div class="row">
            <div class="col-sm-6 mb-3">
                <button class="btn btn-outline-primary" wire:click='openModal'>
                    <i class='bx bxs-add-to-queue'></i>
                    Agregar una nueva red social
                </button>
            </div>
            <div class="col-sm-6">
                <div class="selectOptions d-flex flex-column text-primary">
                    <select class="form-select bg-transparent text-primary rounded border border-primary p-1"
                        wire:model="buscarTipoRed" wire:change="findTypeSocialNetwork">
                        <option value="" selected="">Buscar por tipo de red social (todas)</option>
                        @foreach ($tipoRedSocial as $item)
                            <option value="{{ $item->id_socialNetwork }}">{{ $item->socialNetwork_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

    </div>


    @if ($modal == true)
        <x-ModalNewRedSocial idRedN1='{{ $tipoRedSocial[0]->id_socialNetwork }}'
            idRedN2='{{ $tipoRedSocial[1]->id_socialNetwork }}' idRedN3='{{ $tipoRedSocial[2]->id_socialNetwork }}'
            idRedN4='{{ $tipoRedSocial[3]->id_socialNetwork }}' nameRedN1='{{ $tipoRedSocial[0]->socialNetwork_name }}'
            nameRedN2='{{ $tipoRedSocial[1]->socialNetwork_name }}'
            nameRedN3='{{ $tipoRedSocial[2]->socialNetwork_name }}'
            nameRedN4='{{ $tipoRedSocial[3]->socialNetwork_name }}' />
    @endif

    @if (session('success'))
        <x-ToastSuccess mensaje="{{ session('success') }}" />
    @endif

    <div class="alert rounded border border-info text-info mb-2 p-2 w-100" wire:loading wire:target='findTypeSocialNetwork'>
        <h5><i class="spinner-border" role="status"></i> ¡Buscando por tipos de la red social seleccionada!</h5>
    </div>

    @if ($socialNetUser->isEmpty())
        <x-ToastDanger mensaje="No se encontraron redes sociales por el tipo seleccionado" />
    @endif

    <div class="row">
        @foreach ($socialNetUser as $item)
            <div class="col-md-4 mt-2">
                <div class="card card-widget widget-user-2 border border-primary">
                    <div class="widget-user-header"
                        style="background: url('{{ asset('adminLTE V3 (ASSETS)/dist/img/photo1.png') }}');" center
                        center;>
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2"
                                src="{{ asset('adminLTE V3 (ASSETS)/dist/img/avatar5.png') }}" alt="User Avatar">
                        </div>

                        <h3 class="widget-user-username text-success">{{ $item->socialNetwUser_name }}</h3>
                        <h5 class="widget-user-desc text-primary">{{ $item->socialNetwork_name }}</h5>
                    </div>
                    <div class="card-footer p-0 bg-black">
                        <ul class="nav flex-column">
                            <li class="nav-item" style="background: black; border-bottom-color: #0d6efd;">
                                <a href="#" class="nav-link">
                                    Projects <span class="float-right badge bg-primary">31</span>
                                </a>
                            </li>
                            <li class="nav-item" style="background: black; border-bottom-color: #0d6efd;">
                                <a href="#" class="nav-link">
                                    Tasks <span class="float-right badge bg-info">5</span>
                                </a>
                            </li>
                            <li class="nav-item" style="background: black; border-bottom-color: #0d6efd;">
                                <a href="#" class="nav-link">
                                    Completed Projects <span class="float-right badge bg-success">12</span>
                                </a>
                            </li>
                            <li class="nav-item" style="background: black; border-bottom-color: #0d6efd;">
                                <a href="#" class="nav-link">
                                    Followers <span class="float-right badge bg-danger">842</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
