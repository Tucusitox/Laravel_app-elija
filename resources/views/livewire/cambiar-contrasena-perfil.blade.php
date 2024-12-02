<div>
    @if (session('danger'))
        <x-ToastDanger mensaje="{{session('danger')}}"/>
    @elseif(session('success'))
        <x-ToastSuccess mensaje="{{session('success')}}"/>
    @endif

    <x-ToastProcesando mensaje="Cambiando Contraseña"/>

    <form class="form-horizontal" wire:submit="updatePassword">

        <div class="mb-3">
            <label class="form-label text-primary ">
                Nueva Contraseña:
            </label>
            <input type="text" class="form-control text-primary  bg-transparent border border-primary"
                placeholder="Nueva contraseña" wire:model="newPassword">
        </div>
        @if ($errors->has('newPassword'))
            <x-ToastDanger mensaje="{{ $errors->first('newPassword') }}" />
        @endif

        <div class="mb-3">
            <label class="form-label text-primary ">
                Confirmar Contraseña:
            </label>
            <input type="text" class="form-control text-primary  bg-transparent border border-primary"
                placeholder="Confirmar contraseña" wire:model="confirmPassword">
        </div>
        @if ($errors->has('confirmPassword'))
            <x-ToastDanger mensaje="{{ $errors->first('confirmPassword') }}" />
        @endif
 
        <button type="submit" class="btn btn-primary w-100 mt-2">
            Guardar nueva contraseña
        </button>

    </form>

</div>
