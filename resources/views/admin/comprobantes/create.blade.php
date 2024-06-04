@extends('layouts.plantilla')

@section('titulo', __('Crear Comprobante'))

@section('contenido')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Crear Comprobante') }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('Comprobante.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tipo_comprobante">{{ __('Tipo de Comprobante') }}</label>
                                    <select name="tipo_comprobante" id="tipo_comprobante" required>
                                        <option value="">Selecciona el tipo de comprobante</option>
                                        <option value="Activo">{{ __('Activo') }}</option>
                                        <option value="Patrimonio">{{ __('Patrimonio') }}</option>
                                        <option value="3">{{ __('Opción 3') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="fecha_elaboracion">{{ __('Fecha de Elaboración') }}</label>
                                    <input type="date" name="fecha_elaboracion" id="fecha_elaboracion" class="form-control" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="tipo_cuenta_contable">{{ __('Tipo de Cuenta Contable') }}</label>
                                    <input type="text" name="tipo_cuenta_contable" id="tipo_cuenta_contable" class="form-control" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="tercero">{{ __('Tercero') }}</label>
                                    <input type="text" name="tercero" id="tercero" class="form-control" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="descripcion">{{ __('Descripción') }}</label>
                                    <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="debito">{{ __('Débito') }}</label>
                                    <input type="number" name="debito" id="debito" class="form-control" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="credito">{{ __('Crédito') }}</label>
                                    <input type="number" name="credito" id="credito" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="observaciones">{{ __('Observaciones') }}</label>
                                    <textarea name="observaciones" id="observaciones" class="form-control" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="adjuntar_documento">{{ __('Adjuntar Documento') }}</label>
                                    <input type="file" name="adjuntar_documento" id="adjuntar_documento" class="form-control-file">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                                    <button type="button" id="cancelar" class="btn btn-secondary ml-2" onclick="history.back();">{{ __('Cancelar') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


