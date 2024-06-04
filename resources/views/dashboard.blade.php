@extends('layouts.plantilla')

@section('titulo')
    {{ __('Dashboard') }}
@endsection

@section('active-inicio')
    {{ __('active') }}
@endsection

@section('tituloPage')
    {{ __('Dashboard') }}
@endsection

@section('contenido')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3> {{ $users }} </h3>
                            <p>{{ __('Usuarios') }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3>{{ $noticias }}</h3>
                            <p>{{ __('Noticias') }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-earth"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3> {{ $cursos }} </h3>
                            <p>{{ __('Cursos') }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-laptop"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3>{{ $capacitaciones }}</h3>
                            <p>{{ __('Capacitaciones') }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ribbon-b"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <section class="content">
        <div class="col-lg-12 col-12 text-center">
            <!-- small box -->
            <img class="col-sm-8" src="{{ asset('dist/img/Logo_L&P2.png') }}" alt="Logo">
        </div>
    </section>
@endsection
