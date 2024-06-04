@extends('layouts.plantilla')

@section('titulo')
    {{ __('Clientes') }}
@endsection

@section('active-clientes')
    {{ __('active') }}
@endsection

@section('tituloPage')
    {{ __('Gestión de clientes') }}
@endsection

@section('contenido')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Listado de Clientes') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('Clientes.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> {{ __('Agregar Cliente') }}
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5px;">#</th>
                                        <th>{{ __('Nombre') }}</th>
                                        <th>{{ __('NIT') }}</th>
                                        <th>{{ __('Estado') }}</th>
                                        <th>{{ __('Acciones') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td>{{ $cliente->id }}</td>
                                            <td>{{ $cliente->nombre }}</td>
                                            <td>{{ $cliente->NIT }}</td>
                                            <td>{{ $cliente->estado }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('Clientes.show', $cliente->id) }}" class="btn btn-info">
                                                        <i class="fas fa-eye"></i> {{ __('Ingresar') }}
                                                    </a>
                                                    <form action="{{ route('Clientes.destroy', $cliente->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este cliente?')">
                                                            <i class="fas fa-trash"></i> {{ __('Eliminar') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('Nombre') }}</th>
                                        <th>{{ __('NIT') }}</th>
                                        <th>{{ __('Estado') }}</th>
                                        <th>{{ __('Acciones') }}</th>
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
@endsection
