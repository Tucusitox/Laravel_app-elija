<x-LayoutSingIn title="Inicia sesión">

    <div class="card card-outline bg-black border border-primary">

        <div class="card-header text-center">
            <h3 class="text-primary"><b>Inicia sesión</b></h3>
        </div>

        @if (session('danger'))
            <x-InputError classExtra="mx-3 mb-3 p-2" falla="{{ session('danger') }}"/>
        @elseif(session('success'))
            <x-InputSuccess classExtra="mx-3 mb-3 p-2" mensaje="{{ session('success') }}"/>
        @endif

        <div class="card-body border border-primary">

            <form action="{{ route('autenticar.index') }}" method="POST" class="formLogin">
                @csrf

                <div class="input-group mb-3">
                    <input type="email" class="form-control bg-transparent border border-primary text-primary"
                        placeholder="Correo" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text bg-transparent border border-primary">
                            <span class="fas fa-envelope text-primary"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                    <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                @enderror

                <div class="input-group mb-3">
                    <input type="password" class="form-control bg-transparent border border-primary text-primary"
                        placeholder="Contraseña" id="clave-login" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text bg-transparent border border-primary">
                            <span onclick="revelarContraseña('clave-login', 'loginClave-Icono')" id="loginClave-Icono"
                                class='bx bx-show text-primary'></span>
                        </div>
                    </div>
                </div>
                @error('password')
                    <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                @enderror

                <div class="social-auth-links text-center my-3">
                    <button type="submit" href="#" class="btn btn-block btn-primary">
                        Ingresar
                    </button>
                </div>

            </form>

            <div class="d-flex align-items-center">
                <a href="{{route('cambio.contras')}}" class="btn btn-outline-dark">
                    Olvidé mi contraseña
                </a>

                <a href="{{ route('registrar.index') }}" class="btn btn-outline-primary mx-2">Registrate</a>
            </div>

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
