
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login Admin | SMK Bisa Kerja - SMK Negeri 1 Bojongsari</title>

  <link rel="stylesheet" href="{{ asset('app-admin/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('app-admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('app-admin/dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ url('/app-admin/login') }}"><b>ADMIN</b>-APP</a>
  </div>
  
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">LOGIN HALAMAN ADMINISTRATOR</p>

      <form method="POST" action="{{ url('/app-admin/login') }}">
        @csrf

        <div class="{{ old('username') ? '' : 'input-group mb-3' }}">
          <input type="text"
            name="username"
            value="{{ old('username') }}"
            class="form-control @error('username') is-invalid @enderror"
            placeholder="E-Mail atau Username"
            autocomplete="username"
            required
            autofocus 
          />

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        @error('username')
          <span class="invalid-feedback mb-3" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror

        <div class="{{ old('password') ? '' : 'input-group mb-3' }}">
          <input type="password"
            name="password"
            class="form-control @error('password') is-invalid @enderror"
            placeholder="Password"
            autocomplete="current-password"
            required
          />

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        @error('password')
          <span class="invalid-feedback mb-3" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror

        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" <?= old('remember') ? 'checked' : '' ?>>
              <label for="remember">
                {{ __('Remember Me') }}
              </label>
            </div>
          </div>
          
          <div class="col-5 text-right">
            <button type="submit" class="btn btn-primary btn-flat">
              <i class="fas fa-sign-in-alt mr-2"></i>MASUK
            </button>
          </div>
        </div>
      </form>
    </div>

  </div>
</div>

<script src="{{ asset('app-admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('app-admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('app-admin/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
