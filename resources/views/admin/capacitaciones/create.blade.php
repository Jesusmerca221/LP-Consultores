@extends('layouts.plantilla')

@section('titulo')
    {{ __('Capacitaciones') }}
@endsection

@section('active-capacitaciones')
    {{ __('active') }}
@endsection

@section('active-capacitaciones-add')
    {{ __('active') }}
@endsection

@section('tituloPage')
    {{ __('Agregar Capacitaciones') }}
@endsection

@section('contenido')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ Route('Capacitaciones.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="inputTitulo" class="form-label">{{ __('Titulo') }}</label>
                                            <input type="text" name="titulo" value="{{ old('titulo') }}"
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
                                            <label for="inputDescripcion" class="form-label">{{ __('Descripcion') }}</label>
                                            <textarea name="descripcion" cols="30" rows="5" placeholder="Ingrese la descripcón de la noticia..."
                                                class="form-control @error('descripcion') is-invalid @enderror @if (old('descripcion')) is-valid @endif"
                                                id="inputDescripcion" oninput="removeError(this)">
                                                </textarea>
                                            @error('descripcion')
                                                <small id="descripcion-error" class="text-danger">
                                                    *{{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputFecha">{{ __('Precio') }}</label>
                                            <input type="text" name="precio" value="{{ old('precio') }}"
                                                placeholder="Ej: 10000"
                                                class="form-control @error('precio') is-invalid @enderror @if (old('precio')) is-valid @endif"
                                                id="inputFecha" oninput="removeError(this)">
                                            @error('precio')
                                                <small id="precio-error" class="text-danger">
                                                    *{{ $message }}
                                                </small>
                                            @enderror
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
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Algo salio mal',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @endif
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
