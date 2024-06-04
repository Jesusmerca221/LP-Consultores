@extends('layouts.plantilla')

@section('titulo')
    {{ __('Cuentas contables') }}
@endsection

@section('active-cursos')
    {{ __('active') }}
@endsection

@section('active-cursos-add')
    {{ __('active') }}
@endsection

@section('tituloPage')
    {{ __('Cuenta Contable') }}
@endsection

@section('contenido')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Tipo</th>
                                <!-- Add other relevant headers here -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cuentas as $cuenta)
                                <tr class="cuenta-row" data-codigo="{{ $cuenta->codigo }}">
                                    <td>{{ $cuenta->codigo }}</td>
                                    <td>{{ $cuenta->tipo }}</td>
                                    <!-- Add other relevant data cells here -->
                                </tr>
                                <tr class="detalle-row" style="display: none;">
                                <td>{{ $cuenta->codigo }}</td>
                                <td>{{ $cuenta->tipo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.cuenta-row').click(function() {
            var codigo = $(this).data('codigo');
            $('.detalle-row').hide(); // Oculta todos los detalles
            $(this).next('.detalle-row').toggle(); // Muestra el detalle correspondiente
            // Aquí puedes realizar una petición AJAX para obtener y mostrar más información sobre la cuenta contable
        });
    });
</script>
@endsection
