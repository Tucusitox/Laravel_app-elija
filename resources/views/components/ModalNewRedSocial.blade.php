<div class="modal fade show" style="display: block; padding-right: 15px; backdrop-filter: blur(0.4rem);" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-black border border-primary p-5">

            <div class="text-primary text-center border-bottom border-primary mb-2">
                <h4 class="mb-3">¡Agregue su nueva red social!</h4>
            </div>

            @if (session('danger'))
                <x-ToastDanger mensaje="{{ session('danger') }}" />
            @endif

            {{-- TOAST PROCESANDO --}}
            <div class="alert rounded border border-info text-info my-2 p-2" wire:loading wire:target='addSocialNetwork'>
                <h5><i class="spinner-border" role="status"></i> ¡Agregando nueva red social!</h5>
            </div>

            <form class="formRedSocial" wire:submit="addSocialNetwork">

                {{-- CHECKBOX CON LAS REDES SOCIALES DE LA BD --}}
                <div class="checkBox my-2">
                    <h5 class="text-primary text-center"><b>Tipo de red social:</b></h5>
                    <div class="d-flex justify-content-center radio">

                        <div class="d-flex flex-column">
                            <input type="radio" name="tipoRedSocial" id="facebook" value="{{ $idRedN1 }}"
                                {{ old('tipoRedSocial') == $idRedN1 ? 'checked' : '' }} wire:model="redSocialTipo">
                            <label for="facebook" class="text-center">
                                {{ $nameRedN1 }}
                            </label>

                            <input type="radio" name="tipoRedSocial" id="instagram" value="{{ $idRedN2 }}"
                                {{ old('tipoRedSocial') }} wire:model="redSocialTipo">
                            <label for="instagram" class="text-center">
                                {{ $nameRedN2 }}
                            </label>
                        </div>

                        <div class="d-flex flex-column">
                            <input type="radio" name="tipoRedSocial" id="twitter" value="{{ $idRedN3 }}"
                                {{ old('tipoRedSocial') }} wire:model="redSocialTipo">
                            <label for="twitter" class="text-center">
                                {{ $nameRedN3 }}
                            </label>

                            <input type="radio" name="tipoRedSocial" id="tiktok" value="{{ $idRedN4 }}"
                                {{ old('tipoRedSocial') }} wire:model="redSocialTipo">
                            <label for="tiktok" class="text-center">
                                {{ $nameRedN4 }}
                            </label>
                        </div>

                    </div>
                </div>
                @if ($errors->has('redSocialTipo') && $this->errorValidate == false)
                    <x-ToastDanger mensaje="{{ $errors->first('redSocialTipo') }}" />
                @endif

                <div class="mb-3">
                    <label class="form-label text-primary ">
                        Usuario de la red social:
                    </label>
                    <input type="text" class="form-control text-primary  bg-transparent border border-primary"
                        placeholder="Nombre de usuario" wire:model="nameRedSocialUser">
                </div>
                @if ($errors->has('nameRedSocialUser') && $this->errorValidate == false)
                    <x-ToastDanger mensaje="{{ $errors->first('nameRedSocialUser') }}" />
                @endif

                <div class="d-flex align-items-center">
                    <a class="btn btn-outline-danger w-100 mt-2" wire:click='closeModal'>
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-outline-primary w-100 mt-2 mx-2">
                        Guardar
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<style>
    .formRedSocial input::placeholder {
        color: #0d6efd;
    }
</style>
