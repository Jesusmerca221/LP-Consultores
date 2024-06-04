@extends('layouts.plantilla')

@section('titulo')
    {{ __('Noticias') }}
@endsection

@section('active-noticias')
    {{ __('active') }}
@endsection

@section('tituloPage')
    {{ __('Noticias') }}
@endsection

@section('contenido')
    <section class="content">
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">

                    <div class="col-12 pb-3">
                        <button class="btn btn-outline-success" data-toggle="modal" data-target="#modal-lg">
                            <i class="fa fa-plus"></i> {{ __('Agregar') }}
                        </button>
                    </div>

                    @if (count($datos) != 0)
                        @foreach ($datos as $i)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header p-0">
                                        <img src="{{ $i->imagen }}" style="padding: 0; height: 200px;" class="col-12"
                                            alt="">
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="text-muted">{{ $i->fecha }}</span>
                                            </div>
                                            <div class="col-12 py-2">
                                                <h5
                                                    style="overflow: hidden;text-overflow: ellipsis; display:
                                                    -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">
                                                    {{ $i->titulo }} </h5>
                                            </div>
                                            <div class="col-12">
                                                <span class="text-muted"
                                                    style="overflow: hidden;text-overflow: ellipsis; display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;">
                                                    {{ $i->descripcion }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header text-muted border-bottom-0">
                                        <div class="btn-group float-right">
                                            <form action=" {{ Route('Noticias.destroy', $i->id) }} " method="POST"
                                                class="btnEliminar">
                                                @method('delete')
                                                @csrf
                                                <button type="button" class="btn btn-sm bg-danger btn-eliminar"
                                                    onclick="mostrarAlertaEliminar(this)">
                                                    <i class="fas fa-trash-alt"></i> {{ __('Eliminar') }}
                                                </button>
                                            </form>
                                            <a href="{{ Route('Noticias.edit', $i->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i> {{ __('Editar') }}
                                            </a>
                                            <a href="{{ Route('Noticias.show', $i->id) }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-eye"></i> {{ __('Mostrar') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 my-5 text-center">
                            <h4>{{ __('No se ha creado ninguna noticia aun') }}</h4>
                        </div>
                    @endif


                </div>
                <!-- /.row -->
            </div>
        </div>
    </section>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Crear Noticia') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ Route('Noticias.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputTitulo">{{ __('Titulo') }}</label>
                            <input type="text" name="titulo" value="{{ old('titulo') }}"
                                class="form-control @error('titulo') is-invalid @enderror @if (old('titulo')) is-valid @endif"
                                id="inputTitulo" oninput="removeError(this)"
                                placeholder="Ingrese el titulo de la noticia...">
                            @error('titulo')
                                <small id="titulo-error" class="text-danger">
                                    *{{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputDescripcion">{{ __('Descripción') }}</label>
                            <textarea name="descripcion" cols="30" rows="5" placeholder="Ingrese la descripción de la noticia..."
                                id="inputDescripcion" oninput="removeError(this)"
                                class="form-control @error('descripcion') is-invalid @enderror @if (old('descripcion')) is-valid @endif">
                                {{ old('descripcion') }}
                            </textarea>
                            @error('descripcion')
                                <small id="descripcion-error" class="text-danger">
                                    *{{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputImagen">{{ __('Imagen') }}</label>
                            <input type="file" name="imagen" value="{{ old('imagen') }}"
                                class="form-control @error('imagen') is-invalid @enderror @if (old('imagen')) is-valid @endif"
                                id="inputImagen" oninput="removeError(this)" accept="image/*">
                            @error('imagen')
                                <small id="imagen-error" class="text-danger">
                                    *{{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputFecha">{{ __('Fecha') }}</label>
                            <input type="date" name="fecha" value="{{ old('fecha') }}"
                                class="form-control @error('fecha') is-invalid @enderror @if (old('fecha')) is-valid @endif"
                                id="inputFecha" oninput="removeError(this)">
                            @error('fecha')
                                <small id="fecha-error" class="text-danger">
                                    *{{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-rigth">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> {{ __('Guardar') }}</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    @error('imagen')
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El archivo no es una imagen',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @enderror

    @if (session('agregar'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Hecho',
                text: 'Agregado Correctamente',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @endif
    @if (session('actualizar'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Hecho',
                text: 'Actualizado Correctamente',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @endif
    @if (session('eliminar'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Hecho',
                text: 'Eliminado Correctamente',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @endif
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

        function mostrarAlertaEliminar(btn) {
            Swal.fire({
                title: '¿Quieres eliminar esta noticia?',
                text: "Si lo hace, tendra que crearla nuevamente",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, Eliminar',
            }).then((result) => {
                if (result.isConfirmed) {
                    var formulario = btn.closest("form");
                    formulario.submit();
                }
            })
        }
    </script>
@endsection
