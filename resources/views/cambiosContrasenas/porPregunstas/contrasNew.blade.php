<x-LayoutSingIn title="Cambiar Contraseña">

    <div class="card card-outline bg-black border border-primary">

        <div class="card-header text-center">
            <h4 class="text-primary">
                <b>Genere su nueva contraseña de usuario
                </b>
            </h4>
        </div>

        @if (session('danger'))
            <x-InputError classExtra="mx-3 mb-3 p-2" falla="{{ session('danger') }}" />
        @endif

        <div class="card-body border border-primary">

            <form action="{{ route('userPass.update', $id_user) }}" method="POST" class="formLogin">
                @method('PUT')
                @csrf

                <div class="input-group mb-3">
                    <input type="password" class="form-control bg-transparent border border-primary text-primary"
                        placeholder="Nueva contraseña" id="clave-login-1" name="newPassword" value="{{old('newPassword')}}">
                    <div class="input-group-append">
                        <div class="input-group-text bg-transparent border border-primary">
                            <span onclick="revelarContraseña('clave-login-1', 'loginClave-Icono-1')"
                                id="loginClave-Icono-1" class='bx bx-show text-primary'></span>
                        </div>
                    </div>
                </div>
                @error('newPassword')
                    <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                @enderror

                <div class="input-group mb-3">
                    <input type="password" class="form-control bg-transparent border border-primary text-primary"
                        placeholder="Confirmar contraseña" id="clave-login-2" name="passwordConfirmation" 
                        value="{{old('passwordConfirmation')}}">
                    <div class="input-group-append">
                        <div class="input-group-text bg-transparent border border-primary">
                            <span onclick="revelarContraseña('clave-login-2', 'loginClave-Icono-2')"
                                id="loginClave-Icono-2" class='bx bx-show text-primary'></span>
                        </div>
                    </div>
                </div>
                @error('passwordConfirmation')
                    <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                @enderror

                <div class="social-auth-links text-center my-3">
                    <button type="submit" href="#" class="btn btn-block btn-primary">
                        Guardar
                    </button>
                </div>
            </form>

        </div>

    </div>

    {{-- MOSTRAR Y OCULTAR CONTRASEÑA DEL FORMULARIO INICIO --}}
    <script>
        function revelarContraseña(inputId, iconId) {
            let claveEntrada = document.getElementById(inputId);
            let ocultarClave = document.getElementById(iconId);

            if (claveEntrada.type === "password") {
                claveEntrada.type = "text";
                ocultarClave.className = 'bx bx-low-vision text-primary';
            } else {
                claveEntrada.type = "password";
                ocultarClave.className = 'bx bx-show text-primary';
            }
        }
    </script>

    <style>
        #loginClave-Icono-1 {
            cursor: pointer;
        }
        #loginClave-Icono-2 {
            cursor: pointer;
        }
        .formLogin input::placeholder {
            color: #0d6efd;
        }
    </style>

</x-LayoutSingIn>
