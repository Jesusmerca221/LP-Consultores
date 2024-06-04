@extends('layouts.plantilla')

@section('titulo')
    {{ __('Cursos') }}
@endsection

@section('active-cursos')
    {{ __('active') }}
@endsection

@section('tituloPage')
    {{ __('Editar Curso') }}
@endsection

@section('menu')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
                <a href="{{ Route('Cursos.index') }}">
                    <i class="fa fa-arrow-alt-circle-left">
                    </i> {{ __('Regresar') }}
                </a>
            </li>
        </ol>
    </div>
@endsection

@section('contenido')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ Route('Cursos.update', $curso->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="inputTitulo" class="form-label">{{ __('Titulo') }}</label>
                                                <input type="text" name="titulo" value="{{ $curso->titulo }}"
                                                    placeholder="Ingrese el titulo..."
                                                    class="form-control @error('titulo') is-invalid @enderror @if (old('titulo')) is-valid @endif"
                                                    id="inputTitulo" oninput="removeError(this)">
                                                @error('titulo')
                                                    <small id="titulo-error" class="text-danger">
                                                        *{{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="inputDescripcion"
                                                    class="form-label">{{ __('Descripcion') }}</label>
                                                <textarea name="descripcion" cols="30" rows="5" placeholder="Ingrese la descripcón de la noticia..."
                                                    class="form-control @error('descripcion') is-invalid @enderror @if (old('descripcion')) is-valid @endif"
                                                    id="inputDescripcion" oninput="removeError(this)">
                                                    {{ $curso->descripcion }}
                                                </textarea>
                                                @error('descripcion')
                                                    <small id="descripcion-error" class="text-danger">
                                                        *{{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputFecha">{{ __('Precio') }}</label>
                                                    <input type="text" name="precio" value="{{ $curso->precio }}"
                                                        placeholder="Ej: 10000"
                                                        class="form-control @error('precio') is-invalid @enderror @if (old('precio')) is-valid @endif"
                                                        id="inputFecha" oninput="removeError(this)">
                                                    @error('precio')
                                                        <small id="precio-error" class="text-danger">
                                                            *{{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputFecha">{{ __('Duracion') }}</label>
                                                    <input type="text" name="duracion" value="{{ $curso->duracion }}"
                                                        placeholder="Ej: 10: minutos"
                                                        class="form-control @error('duracion') is-invalid @enderror @if (old('duracion')) is-valid @endif"
                                                        id="inputFecha" oninput="removeError(this)">
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
                                                <img src="{{ $curso->imagen }}" class="col-10 img-fluid" id="preview"
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
                                        <i class="fa fa-save" style="margin-right: 7px"></i>{{ __('Actualizar') }}
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
