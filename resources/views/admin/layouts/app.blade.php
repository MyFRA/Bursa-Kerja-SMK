<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>{{ $title }} | SMK Bisa Kerja - SMK Negeri 1 Bojongsari</title>

  <link rel="stylesheet" href="{{ asset('app-admin/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('app-admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('app-admin/dist/css/adminlte.min.css') }}">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  @yield('stylesheet')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  @include('admin.layouts.partials.navbar')

  <!-- Main Sidebar Container -->
  @include('admin.layouts.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Page-header -->
    @yield('page-header')

    <!-- Content -->

    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
  </div>

  <!-- Footer -->
  @include('admin.layouts.partials.footer')
</div>

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('app-admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('app-admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('app-admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('app-admin/dist/js/adminlte.js') }}"></script>

@yield('script')

</body>
</html>
