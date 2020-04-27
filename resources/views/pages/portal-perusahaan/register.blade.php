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
    <title>{{__('Register Perusahaaan | SMK Bisa Kerja - SMK Negeri 1 Bojongsari')}}</title>
</head>

<body>
    <div class="container-register-perusahaan">
        <div class="background">
            <div class="opacity">
                <h2>{{__('BURSA KERJA SMK')}}</h2>
                <a class="pl-5 pr-5 pt-1 pb-1" href="{{ url('/') }}">{{__('SMK Negeri 1 Bojongsari')}}</a>
            </div>
        </div>
        <div class="kotakan-register">
            <div class="njero-kotakan-register pl-lg-5 pr-lg-5">
                <img class="mt-lg-2" src="{{ asset('/images/BOkOCZhd_400x400.jpg') }}" alt="">
                <h2>{{__('Cari karyawan terbaik untuk perusahaan anda?')}}</h2>
                <p class="daftar-temukan">{{__('Daftar dan temukan sekarang.')}}</p>
                <form action="{{ route('perusahaan.register') }}" method="post">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <input type="text" placeholder="Nama Pengguna" name="username" value="{{ old('username') }}" required="" class="@error('username') input-salah @enderror">
                    <input type="text" placeholder="Nama Perusahaan" name="name" value="{{ old('name') }}" required="" class="@error('name') input-salah @enderror">
                    <input type="email" placeholder="Email Perusahaan" name="email" value="{{ old('email') }}" required="" class="@error('email') input-salah @enderror">
                    <input class="password @error('password') input-salah @enderror" type="password" placeholder="Password" name="password" value="{{ old('password') }}" required="">
                    <input class="password second" type="password" placeholder="Ulangi Password" name="password_confirmation" required="">
                    <button type="submit">{{__('Daftar')}}</button>
                </form>
                <p class="sudah-daftar">{{__('Sudah pernah mendaftar?')}} <a href="{{ url('/perusahaan/login') }}">{{__('Masuk')}}</a></p>
            </div>
        </div>
    </div>
</body>
</html>