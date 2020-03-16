@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    Artikel
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/artikel') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> Daftar Artikel
                </a>
                <a href="{{ url('/app-admin/artikel/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> Artikel Baru
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ url('/app-admin/artikel/' . encrypt($item->id)) }}" method="post" class="row" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" value="{{old('judul') ? old('judul') : $item->judul }}" name="judul" class="form-control form-control-lg @error('judul') is-invalid @enderror" placeholder="Masukan judul artikel disini" />
                </div>
                <div class="form-group">
                    <textarea name="konten" rows="15" class="form-control summernote">{{ $item->konten }}</textarea>
                </div>

            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header p-2">
                        <h5 class="card-title">Publikasi</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <small class="p-0 m-0 d-block">
                            STATUS: 
                            <span class="font-weight-bold mr-1">{{ $item->status }}</span> 
                            <a href="" data-toggle="modal" data-target="#modal-status"><i class="fas fa-edit"></i></a>
                        </small>
                        <small class="p-0 m-0 d-block">
                            PENGUNJUNG: 
                            <span class="font-weight-bold mr-1">{{ $item->counter }}</span>
                        </small>
                        <small class="p-0 m-0 d-block">
                            PUBLISH PADA: <br />
                            <span class="font-weight-bold mr-1">
                                {{ $item->created_at->format('d M Y H:i:s') }}
                            </span> 
                            <a href=""><i class="fas fa-edit"></i>Edit</a>
                        </small>
                        <small class="p-0 m-0 d-block">
                            DIPERBARUI PADA: <br />
                            <span class="font-weight-bold mr-1">
                                {{ $item->updated_at->format('d M Y H:i:s') }}
                            </span> 
                            <a href=""><i class="fas fa-edit"></i> Edit</a>
                        </small>
                    </div>
                    <div class="card-footer text-right p-2">
                        <button type="button" class="btn btn-default btn-sm">
                            SIMPAN KE DRAF
                        </button>
                        <button type="button" class="btn btn-primary btn-sm">
                            <i class="fas fa-paper-plane mr-1"></i> PUBLISH
                        </button>
                    </div>
                </div>
                <div class="card collapsed-card">
                    <div class="card-header p-2">
                        <h5 class="card-title">Tags</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="form-group" data-select2-id="39">
                          <div class="select2-purple" data-select2-id="38">
                            <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true" name="tags">
                              <option data-select2-id="29" selected="" value="{{ $item->value }}">{{ $item->value }}</option>
                              <option data-select2-id="29" value="Alabama">Alabama</option>
                              <option data-select2-id="30" value="Alaska">Alaska</option>
                              <option data-select2-id="31" value="California">California</option>
                              <option data-select2-id="32" value="Delaware">Delaware</option>
                              <option data-select2-id="33" value="Tennessee">Tennessee</option>
                              <option data-select2-id="34" value="Texas">Texas</option>
                              <option data-select2-id="35" value="Washington">Washington</option>
                            </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="16" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-selection__choice" title="Alaska" data-select2-id="50"><span class="select2-selection__choice__remove" role="presentation">×</span>Alaska</li><li class="select2-selection__choice" title="California" data-select2-id="51"><span class="select2-selection__choice__remove" role="presentation">×</span>California</li><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 1.5em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="card collapsed-card">
                    <div class="card-header p-2">
                        <h5 class="card-title">Images</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="form-group">
                            <img class="img-fluid img-thumbnail" src="{{ asset('/storage/assets/artikel') }}/{{ $item->image }}" alt="">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="image">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="card collapsed-card">
                    <div class="card-header p-2">
                        <h5 class="card-title">Status</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="form-group">
                            <select name="status" class="form-control">
                                <option value="{{ $item->status }}">{{ $item->status }}</option>
                                <option value="Aktif" style="{{ $item->status == 'Aktif' ? 'display:none' : '' }}">Aktif</option>
                                <option value="Nonaktif" style="{{ $item->status == 'Nonaktif' ? 'display:none' : '' }}">Nonaktif</option>
                                <option value="Draf" style="{{ $item->status == 'Draf' ? 'display:none' : '' }}">Draf</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card collapsed-card">
                    <div class="card-header p-2">
                        <h5 class="card-title">Deskripsi</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="form-group">
                        <textarea class="form-control" rows="3" name="deskripsi" placeholder="">{{ $item->deskripsi }}</textarea>
                      </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    
                </div>
                <div class="col-md-12 ">
                    <button type="submit" class="btn btn-primary float-right">
                        <i class="fas fa-paper-plane mr-1"></i>UPDATE
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>












@endsection

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('/app-admin/plugins/select2/css/select2.min.css') }}">

@endsection

@section('script')
<script src="{{ asset('/app-admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('/app-admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $(function () {
    $('.summernote').summernote({
        height: 340,
    })
  })
</script>
<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    })
</script>
@if (Session::get('alert'))
    <script>
        alert('file yang kamu upload bukan gambar');
    </script>
@endif
@endsection