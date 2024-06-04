@extends('layouts.plantilla')

@section('titulo')
    {{ __('Usuarios') }}
@endsection

@section('active-usuarios')
    {{ __('active') }}
@endsection

@section('tituloPage')
    {{ __('Editar Usuarios') }}
@endsection

@section('contenido')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 pb-3">
                                <button class="btn btn-outline-success" id="btn-modal" data-toggle="modal"
                                    data-target="#modal-lg">
                                    <i class="fa fa-user-plus" style="margin-right: 7px"></i> {{ __('Agregar') }}
                                </button>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5px;"><i class="fa fa-list-ol"></i></th>
                                        <th><i class="fa fa-id-card"></i>&nbsp; {{ __('Nombre Completo') }}</th>
                                        <th><i class="fa fa-envelope"></i>&nbsp; {{ __('Correo') }}</th>
                                        <th><i class="fa fa-phone-alt"></i>&nbsp;{{ __('Telefono') }}</th>
                                        <th><i class="fa fa-cogs"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datos as $i => $data)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $data->nombres . ' ' . $data->apellidos }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->telefono }}</td>
                                            <td>
                                                <a class="nav-link text-muted" data-toggle="dropdown" href="#">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{ Route('Usuarios.edit', $data->id) }}"
                                                        class="dropdown-item">
                                                        <i class="fa fa-user-edit" style="margin-right: 7px"></i>
                                                        {{ __('Editar') }}
                                                    </a>
                                                    <div class="dropdown-divider"></div>

                                                    <form action="{{ Route('Usuarios.destroy', $data->id) }}"
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
                                        <th><i class="fa fa-id-card"></i>&nbsp; {{ __('Nombre Completo') }}</th>
                                        <th><i class="fa fa-envelope"></i>&nbsp; {{ __('Correo') }}</th>
                                        <th><i class="fa fa-phone-alt"></i>&nbsp;{{ __('Telefono') }}</th>
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

    @if ($errors->has('nombres'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ya se encuentra ese email registrado',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @endif

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Crear Usuario') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ Route('Usuarios.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputNombre" class="form-label">{{ __('Nombres') }}</label>
                                <input type="text" name="nombres" value="{{ old('nombres') }}"
                                    class="form-control @error('nombres') is-invalid @enderror @if (old('nombres')) is-valid @endif"
                                    id="inputNombre" oninput="removeError(this)" placeholder="Ingrese el nombre...">
                                @error('nombres')
                                    <small id="nombres-error" class="text-danger">
                                        *{{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputApellidos" class="form-label">{{ __('Apellidos') }}</label>
                                <input type="text" name="apellidos" value="{{ old('apellidos') }}"
                                    class="form-control @error('apellidos') is-invalid @enderror @if (old('apellidos')) is-valid @endif"
                                    id="inputApellidos" oninput="removeError(this)" placeholder="Ingrese los apellidos...">
                                @error('apellidos')
                                    <small id="apellidos-error" class="text-danger">
                                        *{{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">{{ __('Correo') }}</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror @if (old('email')) is-valid @endif"
                                id="inputEmail" oninput="removeError(this)" placeholder="Ingrese el correo..." required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">{{ __('Password') }}</label>
                                <input type="password" name="password" value="{{ old('password') }}"
                                    class="form-control @error('password') is-invalid @enderror @if (old('password')) is-valid @endif"
                                    id="inputEmail4" oninput="removeError(this)" placeholder="Digite la clave...">
                                @error('password')
                                    <small id="password-error" class="text-danger">
                                        *{{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">{{ __('Telefono') }}</label>
                                <input type="text" name="telefono" value="{{ old('telefono') }}"
                                    class="form-control @error('telefono') is-invalid @enderror @if (old('telefono')) is-valid @endif"
                                    id="inputPassword4" oninput="removeError(this)"
                                    placeholder="Ingrese el numero de telefono...">
                                @error('telefono')
                                    <small id="telefono-error" class="text-danger">
                                        *{{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-rigth">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                            {{ __('Guardar') }}</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    {{-- @error('email')
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ya se encuentra ese email registrado',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @enderror --}}
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
                title: '¿Quieres eliminar este usuario?',
                text: "Si lo hace, tendras que crearlo nuevamente",
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
