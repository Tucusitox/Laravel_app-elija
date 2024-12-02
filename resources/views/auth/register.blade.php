<x-LayoutRegister title="Registrate">

    <div class="row">
        <div class="col-md-12">
            <div class="card bg-black border border-primary my-2">

                <div class="border-bottom border-primary d-flex justify-content-between align-items-center p-3">
                    <h1 class="text-primary" style="margin-right: 20px;"><b>Completa los Datos para registrarte</b></h1>
                    <a class="btn btn-outline-danger" href="{{ route('login') }}">Cancelar</a>
                </div>

                <div class="card-body p-3">

                    @if ($errors->any())
                        <x-InputError classExtra="p-2" falla="!Existe un error en alguno de los campos¡" />
                    @endif

                    <div class="bs-stepper linear">

                        <x-SeccionesRegister />

                        <div class="bs-stepper-content">

                            <form action="{{ route('registrar.store') }}" method="POST" enctype="multipart/form-data" id="formRegister">
                                @csrf
                                {{-- SECCION-1 --}}
                                <div id="seccion-1" class="content active dstepper-block" role="tabpanel"
                                    aria-labelledby="information-part-trigger">
                                    {{-- SELECTOR CON LAS NACIONALIDADES DE LA BD --}}
                                    <div class="selectOptions d-flex flex-column text-primary mb-3">
                                        <label class="form-label"><b>Indique su Nacionalidad :</b></label>
                                        <select
                                            class="form-select bg-transparent text-primary rounded border border-primary p-1"
                                            name="tiposNaci">
                                            <option value="" {{ old('tiposNaci') == '' ? 'selected' : '' }}>
                                                Selecciona Uno</option>
                                            @foreach ($tiposNaci as $item)
                                                <option value="{{ $item->id_nationality }}"
                                                    {{ old('tiposNaci') == $item->id_nationality ? 'selected' : '' }}>
                                                    {{ $item->nationality_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('tiposNaci')
                                        <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                                    @enderror
                                    {{-- INPUT PARA LA IDENTIFICACION --}}
                                    <div class="form-group text-primary">
                                        <label for="exampleInputEmail1">Indique su Identificación</label>
                                        <input name="identificacion" value="{{ old('identificacion') }}"
                                            class="form-control bg-transparent border border-primary text-primary"
                                            placeholder="Ingresa tú indentificación">
                                    </div>
                                    @error('identificacion')
                                        <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                                    @enderror
                                    {{-- INPUT PARA LA DIRECCION --}}
                                    <div class="form-group text-primary">
                                        <label>Ingrese su dirección</label>
                                        <textarea name="direccion" class="form-control bg-transparent border border-primary text-primary" 
                                            rows="3" maxlength="150" placeholder="Máximo 100 caracteres">{{ old('direccion') }}</textarea>
                                    </div>
                                    @error('direccion')
                                        <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                                    @enderror

                                    <div class="mt-4">
                                        <a class="btn btn-primary" onclick="stepper.next()">Siguiente</a>
                                    </div>

                                </div>
                                {{-- SECCION-2 --}}
                                <div id="seccion-2" class="content" role="tabpanel"
                                    aria-labelledby="logins-part-trigger">

                                    <div class="d-flex justify-content-center align-items-center">
                                        {{-- INPUT PARA EL GENERO --}}
                                        <div class="checkBox p-2">
                                            <h4 class="form-label text-primary text-center"><b>Indique su Género:</b>
                                            </h4>
                                            <div class="d-flex justify-content-start radio">
                                                <input type="radio" name="genero" id="masculino"
                                                    value="{{ $generos[0]->id_gender }}"
                                                    {{ old('genero') == $generos[0]->id_gender ? 'checked' : '' }}>
                                                <label for="masculino">{{ $generos[0]->gender_name }}</label>

                                                <input type="radio" name="genero" id="femenino"
                                                    value="{{ $generos[1]->id_gender }}"
                                                    {{ old('genero') == $generos[1]->id_gender ? 'checked' : '' }}>
                                                <label for="femenino">{{ $generos[1]->gender_name }}</label>
                                            </div>
                                            @error('genero')
                                                <x-InputError classExtra="p-2 mx-3" falla="{{ $message }}" />
                                            @enderror
                                        </div>
                                        {{-- INPUT PARA LA IMAGEN --}}
                                        <div
                                            class="d-flex justify-content-center align-items-center bordeado contenedor-btn-file">
                                            <label class="form-label text-center" for="foto">
                                                <img src="{{ asset('img/imgUsers/avatarDefault.jpeg') }}"
                                                    style="max-width: 100px; max-height: 100px; border-radius: 10px; border: 1px solid #0d6efd;"
                                                    id="img" />
                                                <input type="file" name="foto" id="foto">
                                                @error('foto')
                                                    <x-InputError classExtra="p-2 mt-3" falla="{{ $message }}" />
                                                @enderror
                                            </label>
                                        </div>
                                    </div>
                                    {{-- INPUT PARA LA FECHA DE NACIMIENTO --}}
                                    <div class="inputDate mb-3 text-primary w-100">
                                        <label class="form-label"><b>Indique su fecha de nacimiento:</b></label>
                                        <input type="date"
                                            class="form-control bg-black text-primary border border-primary"
                                            name="fechaNaci" value="{{ old('fechaNaci') }}">
                                    </div>
                                    @error('fechaNaci')
                                        <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                                    @enderror

                                    <div class="mt-4">
                                        <a class="btn btn-outline-primary" onclick="stepper.previous()">Anterior</a>
                                        <a class="btn btn-primary mx-2" onclick="stepper.next()">Siguiente</a>
                                    </div>
                                </div>
                                {{-- SECCION-3 --}}
                                <div id="seccion-3" class="content" role="tabpanel"
                                    aria-labelledby="information-part-trigger">
                                    {{-- INPUT PARA EL NOMBRE --}}
                                    <div class="form-group text-primary">
                                        <label for="exampleInputEmail1">Indique su nombre completo</label>
                                        <input name="nombres" value="{{ old('nombres') }}"
                                            class="form-control bg-transparent border border-primary text-primary"
                                            placeholder="Ingresa su nombre">
                                    </div>
                                    @error('nombres')
                                        <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                                    @enderror
                                    {{-- INPUT PARA EL NOMBRE --}}
                                    <div class="form-group text-primary">
                                        <label for="exampleInputEmail1">Indique su apellido completo</label>
                                        <input name="apellidos" value="{{ old('apellidos') }}"
                                            class="form-control bg-transparent border border-primary text-primary"
                                            placeholder="Ingresa su apellido">
                                    </div>
                                    @error('apellidos')
                                        <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                                    @enderror
                                    {{-- INPUT PARA LA DESCRIPCION --}}
                                    <div class="form-group text-primary">
                                        <label>De una breve descripción</label>
                                        <textarea name="descripcion" class="form-control bg-transparent border border-primary text-primary" 
                                        rows="3" maxlength="150" placeholder="Máximo 200 caracteres">{{ old('descripcion') }}</textarea>
                                    </div>
                                    @error('descripcion')
                                        <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                                    @enderror

                                    <div class="mt-4">
                                        <a class="btn btn-outline-primary" onclick="stepper.previous()">Anterior</a>
                                        <a class="btn btn-primary mx-2" onclick="stepper.next()">Siguiente</a>
                                    </div>

                                </div>
                                {{-- SECCION-4 --}}
                                <div id="seccion-4" class="content" role="tabpanel"
                                    aria-labelledby="information-part-trigger">
                                    {{-- INPUT PARA EL CORREO --}}
                                    <div class="form-group text-primary">
                                        <label for="exampleInputEmail1">Indique su correo electrónico</label>
                                        <input name="correo" value="{{ old('correo') }}"
                                            class="form-control bg-transparent border border-primary text-primary"
                                            placeholder="Ingresa su correo">
                                    </div>
                                    @error('correo')
                                        <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                                    @enderror

                                    {{-- INPUT PARA LA CONTRASEÑA --}}
                                    <div class="form-group text-primary">
                                        <label for="exampleInputEmail1">Indique su contraseña</label>
                                        <input name="contraseña" value="{{ old('contraseña') }}"
                                            class="form-control bg-transparent border border-primary text-primary"
                                            placeholder="Mínimo 8 caracteres con números y letras">
                                    </div>
                                    @error('contraseña')
                                        <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                                    @enderror

                                    <div class="mt-4">
                                        <a class="btn btn-outline-primary" onclick="stepper.previous()">Anterior</a>
                                        <a class="btn btn-primary mx-2" onclick="stepper.next()">Siguiente</a>
                                    </div>

                                </div>
                                {{-- SECCION-5 --}}
                                <div id="seccion-5" class="content" role="tabpanel"
                                    aria-labelledby="information-part-trigger">
                                    {{-- CHECKBOX CON LAS REDES SOCIALES DE LA BD --}}
                                    <div class="checkBox mb-2 p-1">
                                        <h5 class="text-primary text-center"><b>Seleccione una red social:</b></h5>
                                        <div class="d-flex justify-content-center radio">
                                            <input type="radio" name="tipoRedSocial" id="facebook"
                                                value="{{ $socialesRedes[0]->id_socialNetwork }}"
                                                {{ old('tipoRedSocial') == $socialesRedes[0]->id_socialNetwork ? 'checked' : '' }}>
                                            <label for="facebook">{{ $socialesRedes[0]->socialNetwork_name }}</label>

                                            <input type="radio" name="tipoRedSocial" id="instagram"
                                                value="{{ $socialesRedes[1]->id_socialNetwork }}"
                                                {{ old('tipoRedSocial') == $socialesRedes[1]->id_socialNetwork ? 'checked' : '' }}>
                                            <label for="instagram">{{ $socialesRedes[1]->socialNetwork_name }}</label>

                                            <input type="radio" name="tipoRedSocial" id="twitter"
                                                value="{{ $socialesRedes[2]->id_socialNetwork }}"
                                                {{ old('tipoRedSocial') == $socialesRedes[2]->id_socialNetwork ? 'checked' : '' }}>
                                            <label for="twitter">{{ $socialesRedes[2]->socialNetwork_name }}</label>

                                            <input type="radio" name="tipoRedSocial" id="tiktok"
                                                value="{{ $socialesRedes[3]->id_socialNetwork }}"
                                                {{ old('tipoRedSocial') == $socialesRedes[3]->id_socialNetwork ? 'checked' : '' }}>
                                            <label for="tiktok">{{ $socialesRedes[3]->socialNetwork_name }}</label>
                                        </div>
                                    </div>
                                    @error('tipoRedSocial')
                                        <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                                    @enderror

                                    {{-- INPUT PARA INGRESAR SU USUARIO DE RED SOCIAL --}}
                                    <label class="text-primary">Indique su usuario de la red social
                                        seleccionada:</label>
                                    <div class="form-group text-primary">
                                        <input name="socialRedUser" value="{{ old('socialRedUser') }}"
                                            class="form-control bg-transparent border border-primary text-primary"
                                            placeholder="Ingresa tú usuario de la red social seleccionada">
                                    </div>
                                    @error('socialRedUser')
                                        <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                                    @enderror
                                    {{-- INPUT PARA EL SITIO WEB --}}
                                    <div class="form-group text-primary">
                                        <label for="exampleInputEmail1">Indique su sitio web (opcional):</label>
                                        <input name="sitioWeb" value="{{ old('sitioWeb') }}" id="inputUrl"
                                            class="form-control bg-transparent border border-primary text-primary"
                                            placeholder="Ingresa la url de su sitio web">
                                    </div>
                                    @error('sitioWeb')
                                        <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                                    @enderror

                                    <div class="mt-4">
                                        <a class="btn btn-outline-primary" onclick="stepper.previous()">Anterior</a>
                                        <a class="btn btn-primary mx-2" onclick="stepper.next()">Siguiente</a>
                                    </div>

                                </div>
                                {{-- SECCION-6 --}}
                                <div id="seccion-6" class="content" role="tabpanel"
                                    aria-labelledby="information-part-trigger">
                                    <h5 class="text-center text-primary"><b>¡Ingresa las preguntas de seguridad para la
                                            cuenta!</b></h5>
                                    <div class="line my-3" style="background-color: #0d6efd"></div>
                                    {{-- INPUT PARA LA PREGUNTA N1 --}}
                                    <div class="form-group text-primary">
                                        <label for="exampleInputEmail1">1- {{ $preguntasSeg[0]->question }}</label>
                                        <input name="preguntaN1" value="{{ old('preguntaN1') }}"
                                            class="form-control bg-transparent border border-primary text-primary"
                                            placeholder="Ingresa la respuesta">
                                    </div>
                                    @error('preguntaN1')
                                        <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                                    @enderror

                                    {{-- INPUT PARA LA PREGUNTA N2 --}}
                                    <div class="form-group text-primary">
                                        <label for="exampleInputEmail1">2- {{ $preguntasSeg[1]->question }}</label>
                                        <input name="preguntaN2" value="{{ old('preguntaN2') }}"
                                            class="form-control bg-transparent border border-primary text-primary"
                                            placeholder="Ingresa la respuesta">
                                    </div>
                                    @error('preguntaN2')
                                        <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                                    @enderror

                                    {{-- INPUT PARA LA PREGUNTA N3 --}}
                                    <div class="form-group text-primary">
                                        <label for="exampleInputEmail1">3- {{ $preguntasSeg[2]->question }}</label>
                                        <input name="preguntaN3" value="{{ old('preguntaN3') }}"
                                            class="form-control bg-transparent border border-primary text-primary"
                                            placeholder="Ingresa la respuesta">
                                    </div>
                                    @error('preguntaN3')
                                        <x-InputError classExtra="p-2 my-3" falla="{{ $message }}" />
                                    @enderror

                                    <div class="mt-4">
                                        <a class="btn btn-outline-primary" onclick="stepper.previous()">Anterior</a>
                                        <button type="submit" class="btn btn-primary mx-2"
                                            onclick="stepper.next()">Registrar</button>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

</x-LayoutRegister>
