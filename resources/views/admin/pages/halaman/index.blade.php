@extends('admin.layouts.app')

@section('page-header')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    {{__('HALAMAN')}}
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href=""  onclick="onHapusMassal('<?= url('/app-admin/halaman/hapus/semua-halaman') ?>')" class="btn btn-danger rounded-0">
                    <i class="fas fa-trash mr-1"></i> {{__('Hapus Masal')}}
                </a>
                <a href="{{ url('/app-admin/halaman/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> {{__('Halaman Baru')}}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-sm datatable">
            <thead>
                <tr>
                    <th width="8px"></th>
                    <th width="8%"></th>
                    <th>{{__('JUDUL')}}</th>
                    <th width="20%">{{__('STATUS')}}</th>
                    <th width="20%">{{__('DIPERBARUI PADA')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $val)
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-center">
                            <a href="{{ url('/app-admin/halaman/'.encrypt($val->id).'/edit') }}" class="mx-1 text-dark">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" onclick="onDestroy('<?= url('/app-admin/halaman/' . encrypt($val->id)) ?>', '{{ $val->judul }}')" class="mx-1 text-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                        <td>{{ $val->judul }}</td>
                        <td>
                            <span class="label">{{ $val->status }}</span>
                        </td>
                        <td>{{ Carbon\Carbon::parse($val->updated_at)->format('d M Y H:i:s') }}</td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/datatables-select/css/select.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/sweetalert2/sweetalert2.min.css') }}" />
@endsection

@section('script')
<form id="deleted-form" action="" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<script src="{{ asset('/app-admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/app-admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('/app-admin/plugins/datatables-select/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('/app-admin/plugins/datatables-select/js/select.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/app-admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('/app-admin/dist/js/demo.js') }}"></script>
<script>
    var items = [];
    $(function () {
        var table = $(".datatable").DataTable({
            "ordering": false,
            "columnDefs": [{
                "orderable": false,
                "className": 'select-checkbox',
                "targets":   0
            }],
            "select": {
                "style": 'multi',
                "selector": 'td:first-child'
            }
        })
        .on('select', function(e, dt, type, indexes) {
            
        })
        .on('deselect', function(e, dt, type, indexes) {
            console.log(indexes);
        });
    });

    function onDestroy(url, nama) {
        Swal.fire({
            title: 'KONFIRMASI',
            text: 'Apakah anda yakin akan menghapus Halaman ' + nama + '?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    $("#deleted-form").attr('action', url);

                    event.preventDefault();
                    document.getElementById('deleted-form').submit();
                }
            })
    }

    function onHapusMassal(url) {
        event.preventDefault();
        Swal.fire({
            title: 'KONFIRMASI',
            text: 'Apakah anda yakin akan menghapus massal ?, semua Halaman akan terhapus secara permanen !',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    $("#deleted-form").attr('action', url);

                    document.getElementById('deleted-form').submit();
                }
            }
        )
    }

</script>

@if(Session::get('success'))
<script>
Swal.fire(
  'Berhasil',
  '{{ Session::get('success') }}',
  'success'
)
</script>
@endif
@endsection