@extends('admin.layouts.app')

@section('page-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users Account</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Users Account</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection


@section('content')
<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center mb-4 mt-3">
            <i class="fas fa-user fa-10x"></i>
        </div>
        <h3 class="profile-username text-center">{{ $item->name }}</h3>
        <p class="text-muted text-center">{{ $item->level }}</p>
        <br>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- /.card -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="card">
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active" id="settings">
            <form class="form-horizontal">
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputName" value="{{ $item->name }}" readonly="">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputEmail" value="{{ $item->email }}" readonly="">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName2" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputName2" value="{{ $item->username }}" readonly="">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputExperience" class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputName2" value="{{ $item->level }}" readonly="">
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10 d-flex justify-content-end">
                    <a href="{{ url('/app-admin/users/account/' . encrypt($item->id) . '/edit') }}" class="btn btn-primary mx-1">Ubah Profil</a>
                </div>
              </div>
            </form>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
@endsection

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/sweetalert2/sweetalert2.min.css') }}" />
@endsection

@section('script')
<script src="{{ asset('/app-admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

@if(Session::get('success'))
<script>
Swal.fire(
  'Sukses',
  '{{ Session::get('success') }}',
  'success'
)
</script>
@endif
@endsection
