<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="icon" href="{{ asset('dist/img/favicon.png') }}" type="image/png" />
    <link rel="stylesheet" href="{{ asset('dist/css/login.css') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <img class="wave" src="{{ asset('dist/img/wave.png') }}">
    <div class="container">
        <div class="img">
            <img src="{{ asset('dist/img/Logo_L&P2.png') }}">
        </div>
        <div class="login-content">

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <img src="{{ asset('dist/img/avatar.svg') }}">
                <h2 class="title">{{ __('Iniciar Sesión') }}</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>{{ __('Correo') }}</h5>
                        <input type="email" class="input" name="email" :value="old('email')" id="email"
                            required autofocus autocomplete="username" />
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>{{ __('Password') }}</h5>
                        <input type="password" id="password" class="input" name="password" required
                            autocomplete="current-password">
                    </div>
                </div>
                <input type="submit" class="btn" value="{{ __('Log in') }}">
                <br>
                <a href="#"><i class="fas fa-reply"></i>&nbsp; Volver a la plataforma</a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="dist/js/main.js"></script>
</body>

</html>
