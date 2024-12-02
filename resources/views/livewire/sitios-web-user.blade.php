<div>
    <div class="container-fluid mx-3">
        <div class="w-100">
            <form wire:submit='newCapture'>
                <label class="form-label">Agregar un nuevo sitio web:</label>
                <div class="input-group formURL mb-2">
                    <div class="input-group-append rounded">
                        <button type="submit" class="btn btn-outline-primary" 
                        style="border-radius: 5px 0 0 5px;">
                            <i class='bx bxs-add-to-queue'></i>
                        </button>
                    </div>
                    <input type="search" class="form-control text-primary bg-transparent border border-primary "
                    placeholder="Ingrese una URL valida" wire:model='newUrl'>

                </div>
                @if ($errors->has('newUrl'))
                    <x-ToastDanger mensaje="{{ $errors->first('newUrl') }}" />
                @endif

                @if (session('success'))
                    <x-ToastSuccess mensaje="{{ session('success') }}"/>
                @elseif (session('danger'))
                    <x-ToastDanger mensaje="{{ session('danger') }}"/>
                @endif
            </form>
            <x-ToastProcesando mensaje="Procesando la URL Ingresada"/>
        </div>
    </div>

    <div class="card card-success bg-black">
        <div class="card-body">
            <div class="row">

                @foreach ($webSiteUser as $item)
                    <div class="col-md-12 col-lg-6 col-xl-4 mb-2">
                        <div class="card mb-2 bg-gradient-dark border border-primary rounded">
                            <img class="card-img-top rounded" src="{{ asset($item->website_img) }}" alt="Dist Photo 1">
                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                <h4 class="card-title text-primary my-2">{{ $item->website_tittle }}</>
                                </h4>
                                <a href="{{ $item->website_url }}" class="btn btn-outline-primary"
                                    target="_blank">Visitar sitio web</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <style>
        .formURL input::placeholder {
            color: #0d6efd;
        }

        .cajaConLasA a:hover {
            background: #0b2c5d;
        }
    </style>
</div>
