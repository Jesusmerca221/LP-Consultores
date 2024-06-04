@extends('layouts.plantilla')

@section('titulo')
    {{ __('Capacitaciones') }}
@endsection

@section('active-capacitaciones')
    {{ __('active') }}
@endsection

@section('active-capacitaciones-show')
    {{ __('active') }}
@endsection

@section('tituloPage')
    {{ __('Capacitaciones') }}
@endsection

@section('contenido')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5px;"><i class="fa fa-list-ol"></i></th>
                                        <th>{{ __('Titulo') }}</th>
                                        <th>{{ __('Descripcion') }}</th>
                                        <th>{{ __('Precio') }}</th>
                                        <th><i class="fa fa-cogs"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($capacitaciones as $i => $capacitacion)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $capacitacion->titulo }}</td>
                                            <td>{{ $capacitacion->descripcion }}</td>
                                            <td>${{ $capacitacion->precio }}</td>
                                            <td>
                                                <a class="nav-link text-muted" data-toggle="dropdown" href="#">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{ Route('Capacitaciones.edit', $capacitacion->id) }}"
                                                        class="dropdown-item">
                                                        <i class="fa fa-user-edit" style="margin-right: 7px"></i>
                                                        {{ __('Editar') }}
                                                    </a>
                                                    <div class="dropdown-divider"></div>

                                                    <form action="{{ Route('Capacitaciones.destroy', $capacitacion->id) }}"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="button" class="dropdown-item btn-eliminar"
                                                            onclick="mostrarAlertaEliminar(this)">
                                                            <i class="fa fa-user-minus" style="margin-right: 7px"></i>
                                                            {{ __('Eliminar') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="width: 5px;"><i class="fa fa-list-ol"></i></th>
                                        <th>{{ __('Titulo') }}</th>
                                        <th>{{ __('Descripcion') }}</th>
                                        <th>{{ __('Precio') }}</th>
                                        <th><i class="fa fa-cogs"></i></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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
                title: '¿Quieres eliminar esta capacitación?',
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
