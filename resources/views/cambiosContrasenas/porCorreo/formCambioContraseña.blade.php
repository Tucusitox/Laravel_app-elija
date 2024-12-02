<x-LayoutSingIn title="Cambiar contraseña">

    <div class="card card-outline bg-black border border-primary">

        <div class="card-header text-center">
            <h5 class="text-primary">
                <b>
                    Ingrese el código de recuperación enviado 
                    a su correo para cambiar su contraseña
                </b>    
            </h5>
        </div>

        @if (session('danger'))
            <x-InputError classExtra="mx-3 mb-3 p-2" falla="{{ session('danger') }}" />
        @endif

        <div class="card-body border border-primary">

            <form action="{{ route('recuperar.contras', $id_user) }}" method="POST" class="formLogin">
                @csrf

                <div class="input-group mb-3">
                    <input type="text" class="form-control bg-transparent border border-primary text-primary"
                        placeholder="Código de recuperación" name="codigoRecuperacion" id="inputCodigo" value="{{old('codigoRecuperacion')}}">
                    <div class="input-group-append">
                        <div class="input-group-text bg-transparent border border-primary">
                            <i class='bx bxs-widget text-primary'></i>
                        </div>
                    </div>
                </div>
                @error('codigoRecuperacion')
                    <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                @enderror

                <div class="input-group mb-3">
                    <input type="password" class="form-control bg-transparent border border-primary text-primary"
                        placeholder="Nueva Contraseña" id="clave-login" name="contraseña" value="{{old('contraseña')}}">
                    <div class="input-group-append">
                        <div class="input-group-text bg-transparent border border-primary">
                            <span onclick="revelarContraseña('clave-login', 'loginClave-Icono')" id="loginClave-Icono"
                                class='bx bx-show text-primary'></span>
                        </div>
                    </div>
                </div>
                @error('contraseña')
                    <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                @enderror

                <div class="social-auth-links text-center my-3">
                    <button type="submit" class="btn btn-block btn-primary">
                        Cambiar la contraseña
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

            if (claveEntrada.type == "password") {
                claveEntrada.type = "text";
                ocultarClave.className = 'bx bx-low-vision text-primary';
            } else {
                claveEntrada.type = "password";
                ocultarClave.className = 'bx bx-show text-primary';
            }
        };

        const input = document.getElementById('inputCodigo');
        input.addEventListener('input', function() {
            this.value = this.value.toUpperCase();
            if (this.value.length >= 8) {
                this.value = this.value.substring(0, 8);
            }
        });
    </script>

    <style>
        #loginClave-Icono {
            cursor: pointer;
        }

        .formLogin input::placeholder {
            color: #0d6efd;
        }
    </style>

</x-LayoutSingIn>
