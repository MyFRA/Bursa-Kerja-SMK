<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO -->
    {{-- {!! SEO::generate() !!} --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>{{__('Login Perusahaaan | SMK Bisa Kerja - SMK Negeri 1 Bojongsari')}}</title>
</head>

<body class="body-halaman-login">

    <div class="container halaman-login-perusahaan d-flex align-items-center justify-content-center">
        <div class="card box-login p-5">
            <a href="{{ url('/') }}"  class="mx-auto" >
                <img src="{{ asset('/images/logo-smk-n-1-bojongsari.jpg') }}" alt="">
            </a>
            <h3 class="mt-4 text-center">{{__('Masuk Perusahaan')}}</h3>
            <form class="mt-3" method="POST" action="{{ url('/perusahaan/login') }}">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger pb-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="email" placeholder="E-Mail atau Username" value="{{ old('username') }}" autocomplete="username" >
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="password" placeholder="password" autocomplete="current-password">
                </div>
                <div class="form-check">
                    <label class="form-check-label mt-4">
                    <input type="checkbox" name="remember" class="form-check-input" <?= old('remember') ? 'checked' : '' ?>>
                        {{__('Ingat Saya')}}
                    </label>
                </div>
                <button type="submit" class="mt-3 btn btn-primary">Masuk</button>
            </form>
            <span class="text-muted pertama">{{__('Belum mempunyai akun? ')}}<a href="{{ url('/perusahaan/register') }}">{{__('Mendaftar')}}</a></span>
            <span class="text-muted">{{__('Lupa Password? ')}}<a href="{{ url('/password/reset') }}">{{__('Reset')}}</a></span>
            <span class="text-muted mt-4"><i class="fa fa-arrow-right"></i>{{__(' Back to')}} <a href="{{ url('/') }}">Home</a></span>
        </div>
    </div>

</body>
</html>
