@extends('layouts.plantilla')

@section('titulo')
    Perfil
@endsection

@section('tituloPage')
    Perfil
@endsection

@section('contenido')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-4">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="dist/img/user4-128x128.jpg"
                                        alt="User profile picture" style="width: 40%">
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-7">
                                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                                    @csrf
                                    @method('patch')
                                    <label for="name">Nombre:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="{{ old('name', $user->name) }}" placeholder="Nombre" required
                                            autocomplete="name" />
                                    </div>

                                    <label for="name">Correo:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="{{ old('email', $user->email) }}" placeholder="Email" required
                                            autocomplete="username" />
                                    </div>

                                    <div>

                                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                            <div>
                                                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                                    {{ __('Your email address is unverified.') }}

                                                    <button form="send-verification"
                                                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                        {{ __('Click here to re-send the verification email.') }}
                                                    </button>
                                                </p>

                                                @if (session('status') === 'verification-link-sent')
                                                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                        {{ __('A new verification link has been sent to your email address.') }}
                                                    </p>
                                                @endif
                                            </div>
                                        @endif
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <button class="btn btn-success float-right">{{ __('Actualizar') }}</button>

                                        @if (session('status') === 'profile-updated')
                                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                        @endif
                                    </div>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
