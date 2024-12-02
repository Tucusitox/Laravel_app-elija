<div>
    @if(session('success'))
        <x-ToastSuccess mensaje="{{ session('success') }}" />
    @endif

    <x-ToastProcesando mensaje="Actualizando preguntas"/>

    <form class="form-horizontal" wire:submit='updateRespuestas'>

        <div class="mb-3">
            <label class="form-label text-primary ">
                {{$questions[0]->question}}
            </label>
            <input type="text" class="form-control text-primary  bg-transparent border border-primary"
                placeholder="Respuesta N1" wire:model='respuestaN1'>
        </div>
        @if ($errors->has('respuestaN1'))
            <x-ToastDanger mensaje="{{ $errors->first('respuestaN1') }}" />
        @endif

        <div class="mb-3">
            <label class="form-label text-primary ">
                {{$questions[1]->question}}
            </label>
            <input type="text" class="form-control text-primary  bg-transparent border border-primary"
                placeholder="Respuesta N2" wire:model='respuestaN2'>
        </div>
        @if ($errors->has('respuestaN2'))
            <x-ToastDanger mensaje="{{ $errors->first('respuestaN2') }}" />
        @endif

        <div class="mb-3">
            <label class="form-label text-primary ">
                {{$questions[2]->question}}
            </label>
            <input type="text" class="form-control text-primary  bg-transparent border border-primary"
                placeholder="Respuesta N3" wire:model='respuestaN3'>
        </div>
        @if ($errors->has('respuestaN3'))
            <x-ToastDanger mensaje="{{ $errors->first('respuestaN3') }}" />
        @endif

        <button type="submit" class="btn btn-primary w-100 mt-2">
            Guardar respuestas
        </button>
    </form>
</div>
