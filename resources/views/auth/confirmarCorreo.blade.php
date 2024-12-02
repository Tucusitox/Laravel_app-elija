<x-LayoutSingIn title="Confirmación de correo">

    <div class="card card-outline bg-black border border-primary">

        <div class="card-header text-primary text-center">
            <h6>
                <b>¡Revise su correo electrónico para ingresar
                    el código de confirmación y acceder a su cuenta!
                </b>
            </h6>
        </div>

        @if (session('danger'))
            <x-InputError classExtra="mx-3 mb-3 p-2" falla="{{ session('danger') }}"/>
        @elseif(session('success'))
            <x-InputSuccess classExtra="mx-3 mb-3 p-2" mensaje="{{ session('success') }}"/>
        @endif

        @error('codigoCorreo')
            <x-InputError classExtra="mx-3 mb-3 p-2" falla="{{ $message }}" />
        @enderror

        <div class="card-body border border-primary">

            <form action="{{ route('confirm.codigo', $id_user) }}" method="POST" class="formLogin">
                @csrf

                <div class="input-group mb-3">
                    <input type="text" class="form-control bg-transparent border border-primary text-primary"
                        placeholder="Ingrese el código" name="codigoCorreo" id="inputCodigo" value="{{old('codigoCorreo')}}">
                    <div class="input-group-append">
                        <div class="input-group-text bg-transparent border border-primary">
                            <i class='bx bxs-widget text-primary'></i>
                        </div>
                    </div>
                </div>

                <div class="social-auth-links text-center my-3">
                    <button type="submit" href="#" class="btn btn-block btn-primary">
                        Confirmar
                    </button>
                </div>

            </form>

            <form action="{{route('refresh.codigo', $id_user)}}" method="POST">
                @csrf
                <button type="submit" href="#" class="btn  btn-block btn-outline-dark">
                    Enviar un nuevo código
                </button>
            </form>

            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    
    {{-- SCRIPT PARA LA ESCRITURA EN EL INPUT --}}
    <script>
        const input = document.getElementById('inputCodigo');
        input.addEventListener('input', function() {
            this.value = this.value.toUpperCase();
            if (this.value.length >= 8) {
                this.value = this.value.substring(0, 8);
            }
        });
    </script>

    <style>
        .formLogin input::placeholder {
            color: #0d6efd;
        }
    </style>

</x-LayoutSingIn>
