<x-LayoutSingIn title="Recuperar Contraseña">

    <div class="card card-outline bg-black border border-primary">

        <div class="card-header text-center">
            <h5 class="text-primary">
                <b>¡Ingrese el correo de la
                    cuenta que desea recuperar!
                </b>
            </h5>
        </div>

        @error('email')
            <x-InputError classExtra="mx-3 mb-3 p-2" falla="{{ $message }}" />
        @enderror

        <div class="card-body border border-primary">

            <form action="{{ route('preguntas.findCorreo') }}" method="POST" class="formLogin">
                @csrf

                <div class="input-group mb-3">
                    <input type="email" class="form-control bg-transparent border border-primary text-primary"
                        placeholder="Correo" name="email" value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text bg-transparent border border-primary">
                            <span class="fas fa-envelope text-primary"></span>
                        </div>
                    </div>
                </div>

                <div class="social-auth-links text-center my-3">
                    <button type="submit" href="#" class="btn btn-block btn-primary">
                        Enviar
                    </button>
                </div>

            </form>

        </div>

    </div>

</x-LayoutSingIn>
