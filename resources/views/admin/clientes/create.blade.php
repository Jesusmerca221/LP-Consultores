@extends('layouts.plantilla')

@section('titulo')
    {{ __('Crear Cliente') }}
@endsection

@section('active-clientes')
    {{ __('active') }}
@endsection

@section('tituloPage')
    {{ __('Crear Nuevo Cliente') }}
@endsection

@section('contenido')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Formulario de Creación de Cliente') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('Clientes.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nombre">{{ __('Nombre') }}</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="{{ __('Ingrese el nombre del cliente') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nit">{{ __('NIT') }}</label>
                                    <input type="text" name="nit" id="nit" class="form-control" placeholder="{{ __('Ingrese el NIT del cliente') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="estado">{{ __('Estado') }}</label>
                                    <input type="text" name="estado" id="estado" class="form-control" placeholder="{{ __('Ingrese el estado del cliente') }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                                <a href="{{ route('Clientes.index') }}" class="btn btn-secondary">{{ __('Cancelar') }}</a>
                            </form>
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
@endsection
