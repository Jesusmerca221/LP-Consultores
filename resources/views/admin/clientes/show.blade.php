@extends('layouts.plantilla')

@section('titulo')
    {{ __('Clientes') }}
@endsection

@section('active-clientes')
    {{ __('active') }}
@endsection


@section('contenido')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $cliente->nombre }}</h3>
                            <a href="{{ route('Comprobante.create') }}" class="btn btn-info">
                                <i class="fas fa-eye"></i> {{ __('Crear Comprobante') }}
                            </a>
                        </div>


                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="busqueda_tipo_comprobante">{{ __('Tipo de Comprobante') }}</label>
                                    <select id="busqueda_tipo_comprobante" class="form-control">
                                        <option value="1">{{ __('Opción 1') }}</option>
                                        <option value="2">{{ __('Opción 2') }}</option>
                                        <option value="3">{{ __('Opción 3') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="fecha">{{ __('Fecha') }}</label>
                                    <input type="date" id="fecha" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="mes">{{ __('Mes') }}</label>
                                    <input type="month" id="mes" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="inicio">{{ __('Día de Inicio') }}</label>
                                    <input type="date" id="inicio" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="fin">{{ __('Día de Fin') }}</label>
                                    <input type="date" id="fin" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label>{{ __('¿Está anulada?') }}</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="anulado" id="anulado_si" value="1">
                                        <label class="form-check-label" for="anulado_si">{{ __('Sí') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="anulado" id="anulado_no" value="0" checked>
                                        <label class="form-check-label" for="anulado_no">{{ __('No') }}</label>
                                    </div>


                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <button id="buscarComprobantes" class="btn btn-primary">{{ __('Buscar Comprobantes') }}</button>
                                </div>
                            </div>

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

