@extends('layouts.plantilla')

@section('titulo')
    {{ __('Cuentas contables') }}
@endsection

@section('active-cursos')
    {{ __('active') }}
@endsection

@section('active-cursos-add')
    {{ __('active') }}
@endsection

@section('tituloPage')
    {{ __('Agregar Cursos') }}
@endsection

@section('contenido')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ Route('Cursos.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="inputCodigo" class="form-label">{{ __('Código de cuenta contable') }}</label>
                                                <input type="text" name="codigo" value="{{ old('codigo') }}"
                                                    placeholder="Ingrese el código..."
                                                    class="form-control @error('codigo') is-invalid @enderror @if (old('codigo')) is-valid @endif"
                                                    id="inputCodigo" oninput="removeError(this)">
                                                @error('codigo')
                                                    <small id="codigo-error" class="text-danger">
                                                        *{{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="inputNombre"
                                                    class="form-label">{{ __('Nombre de cuenta contable') }}</label>
                                                <input type="text" name="nombre" value="{{ old('nombre') }}"
                                                    placeholder="Ingrese el nombre..."
                                                    class="form-control @error('nombre') is-invalid @enderror @if (old('nombre')) is-valid @endif"
                                                    id="inputNombre" oninput="removeError(this)">
                                                @error('nombre')
                                                    <small id="nombre-error" class="text-danger">
                                                        *{{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputPrecio">{{ __('Precio') }}</label>
                                                    <input type="text" name="precio" value="{{ old('precio') }}"
                                                        placeholder="Ej: 10000"
                                                        class="form-control @error('precio') is-invalid @enderror @if (old('precio')) is-valid @endif"
                                                        id="inputPrecio" oninput="removeError(this)">
                                                    @error('precio')
                                                        <small id="precio-error" class="text-danger">
                                                            *{{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputDuracion">{{ __('Duración') }}</label>
                                                    <input type="text" name="duracion" value="{{ old('duracion') }}"
                                                        placeholder="Ej: 10 minutos"
                                                        class="form-control @error('duracion') is-invalid @enderror @if (old('duracion')) is-valid @endif"
                                                        id="inputDuracion" oninput="removeError(this)">
                                                    @error('duracion')
                                                        <small id="duracion-error" class="text-danger">
                                                            *{{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label>{{ __('Imagen') }}</label>
                                            <div class="col-12 card p-4 align-items-center">
                                                <button type="button" id="btn-quitar"
                                                    style="position: absolute; top:0; right: 0; border: none">X</button>
                                                <img src="#" class="col-10 img-fluid" id="preview"
                                                    alt="Vista previa">
                                            </div>
                                            <div class="form-group">
                                                <input type="file" name="imagen"
                                                    class="form-control @error('imagen') is-invalid @enderror @if (old('imagen')) is-valid @endif"
                                                    id="inputImagen" oninput="removeError(this)">
                                                @error('imagen')
                                                    <small id="imagen-error" class="text-danger">
                                                        *{{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 pt-3 text-right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save" style="margin-right: 7px"></i>{{ __('Guardar') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        function removeError(input) {
            input.classList.remove('is-invalid');
            const errorSpanId = input.getAttribute('name') + '-error';
            const errorSpan = document.getElementById(errorSpanId);
            if (errorSpan) {
                errorSpan.style.display = 'none';
            }
        }

        var input = document.getElementById('inputImagen');
        var btnquitar = document.getElementById('btn-quitar');

        input.addEventListener('change', previewImage);
        btnquitar.addEventListener('click', removePreview);

        function previewImage(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                    document.getElementById('preview').style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removePreview() {
            var previewContainer = document.getElementById('previewContainer');
            var previewImage = document.getElementById('preview');

            input.value = ''; // Limpiar el valor del campo de entrada
            previewImage.src = '#'; // Restablecer la imagen de la vista previa
            previewContainer.style.display = 'none'; // Ocultar la vista previa
        }
    </script>
@endsection
