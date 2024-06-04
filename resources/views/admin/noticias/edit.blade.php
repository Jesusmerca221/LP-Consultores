@extends('layouts.plantilla')

@section('titulo')
    {{ __('Noticias') }}
@endsection

@section('active-noticias')
    {{ __('active') }}
@endsection

@section('tituloPage')
    {{ __('Editar Noticias') }}
@endsection

@section('menu')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ Route('Noticias.index') }}"> <i class="fa fa-arrow-alt-circle-left"></i>
                    {{ __('Regresar') }} </a></li>
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
                            <form action="{{ Route('Noticias.update', $datos->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="inputEmail4" class="form-label">{{ __('Titulo') }}</label>
                                                <input type="text" name="titulo" value="{{ $datos->titulo }}"
                                                    class="form-control @error('titulo') is-invalid @enderror @if (old('titulo')) is-valid @endif"
                                                    id="inputEmail4" oninput="removeError(this)">
                                                @error('titulo')
                                                    <small id="titulo-error" class="text-danger">
                                                        *{{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="inputDescripcion"
                                                    class="form-label">{{ __('Descripcion') }}</label>
                                                <textarea name="descripcion" cols="30" rows="5" placeholder="Ingrese la descripcón de la noticia"
                                                    class="form-control @error('descripcion') is-invalid @enderror @if (old('descripcion')) is-valid @endif"
                                                    id="inputDescripcion" oninput="removeError(this)">
                                                    {{ $datos->descripcion }}
                                                </textarea>
                                                @error('descripcion')
                                                    <small id="descripcion-error" class="text-danger">
                                                        *{{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">{{ __('Fecha') }}</label>
                                                <input type="date" name="fecha" value="{{ $datos->fecha }}"
                                                    class="form-control @error('fecha') is-invalid @enderror @if (old('fecha')) is-valid @endif"
                                                    id="exampleInputEmail1" oninput="removeError(this)">
                                                @error('fecha')
                                                    <small id="fecha-error" class="text-danger">
                                                        *{{ $message }}
                                                    </small>
                                                @enderror
                                            </div>

                                            <input type="hidden" name="id" value="{{ $datos->id }}">
                                        </div>
                                        <div class="col-4">
                                            <label>{{ __('Imagen') }}</label>
                                            <div class="col-12 card p-4 align-items-center">
                                                <button type="button" id="btn-quitar"
                                                    style="position: absolute; top:0; right: 0; border: none">X</button>
                                                <img src="{{ asset($datos->imagen) }}" class="col-10 img-fluid" id="preview"
                                                    alt="">
                                            </div>
                                            <div class="form-group">
                                                <input type="file" name="imagen" value="{{ $datos->imagen }}"
                                                    class="form-control @error('imagen') is-invalid @enderror @if (old('imagen')) is-valid @endif"
                                                    id="inputImagen" oninput="removeError(this)">
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
