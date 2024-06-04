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

@section('menu')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ Route('Usuarios.index') }}"> <i class="fa fa-arrow-alt-circle-left"></i> {{ __('Regresar') }} </a></li>
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
                            <form action="{{ Route('Usuarios.update', $user->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">{{ __('Nombres') }}</label>
                                            <input type="text" name="nombres" value="{{ $user->nombres }}"
                                                class="form-control @error('nombres') is-invalid @enderror @if (old('nombres')) is-valid @endif"
                                                id="inputEmail4" oninput="removeError(this)">
                                            @error('nombres')
                                                <small id="nombres-error" class="text-danger">
                                                    *{{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword4" class="form-label">{{ __('Apellidos') }}</label>
                                            <input type="text" name="apellidos" value="{{ $user->apellidos }}"
                                                class="form-control @error('apellidos') is-invalid @enderror @if (old('apellidos')) is-valid @endif"
                                                id="inputPassword4" oninput="removeError(this)">
                                            @error('apellidos')
                                                <small id="apellidos-error" class="text-danger">
                                                    *{{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ __('Correo') }}</label>
                                        <input type="email" name="email" value="{{ $user->email }}"
                                            class="form-control @error('email') is-invalid @enderror @if (old('email')) is-valid @endif"
                                            id="exampleInputEmail1" oninput="removeError(this)" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4" class="form-label">{{ __('Telefono') }}</label>
                                        <input type="text" name="telefono" value="{{ $user->telefono }}"
                                            class="form-control @error('telefono') is-invalid @enderror @if (old('telefono')) is-valid @endif"
                                            id="inputPassword4" oninput="removeError(this)">
                                        @error('telefono')
                                            <small id="telefono-error" class="text-danger">
                                                *{{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="id" value="{{ $user->id }}">
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

    @error('email')
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ya se encuentra ese email registrado',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @enderror
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
    </script>
@endsection
