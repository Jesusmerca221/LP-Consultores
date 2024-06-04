@extends('layouts.plantilla')

@section('titulo')
    {{ __('Cursos') }}
@endsection

@section('active-cursos')
    {{ __('active') }}
@endsection

@section('active-cursos-show')
    {{ __('active') }}
@endsection

@section('tituloPage')
    {{ __('Listado de Cursos') }}
@endsection

@section('contenido')
    <section class="content">
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">

                    @if (count($cursos) != 0)
                        @foreach ($cursos as $i => $curso)
                            <div class="col-12 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header p-0">
                                        <img src="{{ $curso->imagen }}" style="padding: 0; height: 200px;" class="col-12" alt="">
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5> {{ $curso->titulo }} </h5>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted"><i class="fa fa-dollar-sign"></i>
                                                    {{ $curso->precio }}
                                                </span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted"><i class="fa fa-clock"></i> {{ $curso->duracion }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header text-muted border-bottom-0">
                                        <div class="btn-group float-right">
                                            <form action=" {{ Route('Cursos.destroy', $curso->id) }} " method="POST"
                                                class="btnEliminar">
                                                @method('delete')
                                                @csrf
                                                <button type="button" class="btn btn-sm bg-danger btn-eliminar"
                                                    onclick="mostrarAlertaEliminar(this)">
                                                    <i class="fas fa-trash-alt"></i> {{ __('Eliminar') }}
                                                </button>
                                            </form>
                                            <a href="{{ Route('Cursos.edit', $curso->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i> {{ __('Editar') }}
                                            </a>
                                            <a href="{{ Route('Cursos.show', $curso->id) }}"
                                                class="btn btn-sm btn-success">
                                                <i class="fas fa-eye"></i> {{ __('Mostrar') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 my-5 text-center">
                            <h4>{{ __('No se ha creado ningun diplomado aun') }}</h4>
                        </div>
                    @endif
                </div>
                <!-- /.row -->
            </div>
        </div>
    </section>

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
        function mostrarAlertaEliminar(btn) {
            Swal.fire({
                title: '¿Quieres eliminar este curso?',
                text: "Si lo hace, tendra que crearlo nuevamente",
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
