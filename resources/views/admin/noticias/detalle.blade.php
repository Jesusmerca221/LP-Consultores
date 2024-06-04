@extends('layouts.plantilla')

@section('titulo')
    {{ __('Noticias') }}
@endsection

@section('active-noticias')
    {{ __('active') }}
@endsection

@section('tituloPage')
    {{ $noticia->titulo }}
@endsection

@section('menu')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
                <a href="{{ Route('Noticias.index') }}">
                    <i class="fa fa-arrow-alt-circle-left"></i> {{ __('Regresar') }}
                </a>
            </li>
        </ol>
    </div>
@endsection

@section('contenido')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">

                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-12 py-2">
                                    <img src="{{ $noticia->imagen }}" style="padding: 0; width: 60%;" class="col-12"
                                        alt="">
                                </div>
                                <div class="col-12 pb-3">
                                    <span class="text-muted">{{ $noticia->fecha }}</span>
                                </div>
                                <div class="col-12">
                                    <span class="text-muted">{{ $noticia->descripcion }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
