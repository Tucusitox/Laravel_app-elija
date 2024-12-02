<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/logo-icono.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Preguntas de seguridad</title>
</head>

<body class="bg-black">

    <main class="container vh-100 d-flex align-items-center justify-content-center">

        <div class="w-75 rounded border border-primary p-5 formLogin">
            <div class="text-primary">
                <h5>
                    <b class="text-success">{{ $userEmail->email }}</b> responda las preguntas
                    de seguridad para recuperar su contraseña
                </h5>
            </div>
            <hr style="border: 2px solid #0d6efd">

            @if (session('danger'))
                <x-InputError classExtra="mb-3 p-2" falla="{{ session('danger') }}" />
            @endif

            <form action="{{ route('user.respuestas', ['id_user' => $userEmail->user_id]) }}" method="POST">
                @csrf
                <div class="text-primary mb-3">
                    <label
                        class="form-label">{{ $questionsUser[0]->fk_question }}.-{{ $questionsUser[0]->question }}</label>
                    <input type="text" class="form-control bg-black border border-primary text-primary"
                        placeholder="Respuesta N1" name="respuestaN1" value="{{ old('respuestaN1') }}">
                </div>
                @error('respuestaN1')
                    <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                @enderror

                <div class="text-primary mb-3">
                    <label
                        class="form-label">{{ $questionsUser[1]->fk_question }}.-{{ $questionsUser[1]->question }}</label>
                    <input type="text" class="form-control bg-black border border-primary text-primary"
                        placeholder="Respuesta N2" name="respuestaN2" value="{{ old('respuestaN2') }}">
                </div>
                @error('respuestaN2')
                    <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                @enderror

                <div class="text-primary mb-3">
                    <label
                        class="form-label">{{ $questionsUser[2]->fk_question }}.-{{ $questionsUser[2]->question }}</label>
                    <input type="text" class="form-control bg-black border border-primary text-primary"
                        placeholder="Respuesta N3" name="respuestaN3" value="{{ old('respuestaN3') }}">
                </div>
                @error('respuestaN3')
                    <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                @enderror

                <button type="submit" class="btn btn-primary w-100 mt-3">Recuperar contraseña</button>

            </form>
        </div>

    </main>

    <style>
        .formLogin input::placeholder {
            color: #0d6efd;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
