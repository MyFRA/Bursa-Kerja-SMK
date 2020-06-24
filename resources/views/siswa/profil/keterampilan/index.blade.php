@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row mt-4 mb-5">

        @include('widget.trigger-navigasi-profil-siswa')

        <div class="col-lg-3 px-2">

        @include('widget.navigasi-profil-siswa')

        </div>

        <div class="col-lg-9 px-2">
            <div class="card shadow p-3">
                <div>
                    <div class="px-2 mt-4 pb-5">
                        <span class="mt- h5 "><i class="fa fa-mortar-board"></i> {{('Keterampilan')}}</span>
                        <a id="trigger-tambah-keterampilan" class="float-right" href=""><i class="fa fa-plus-circle"></i> Tambah</a>

                        <div id="container-form-keterampilan" class="d-none mt-4">
                            <form action="{{ url('/siswa/profil/keterampilan') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-muted" for="keterangan">{{__('Keterampilan')}} <span class="text-danger">*</span> </label>
                                        <div class="form-group">
                                            <input type="text" placeholder="Keterampilan"  class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" required value="{{old('keterangan')}}">
                                            @error('keterangan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="text-muted" for="tingkat">{{__('Tingkat')}} <span class="text-danger">*</span> </label>
                                            <select class="form-control @error('tingkat') is-invalid @enderror" id="tingkat" name="tingkat" required>
                                                <option value="" selected="" disabled="">{{__('Tingkat')}}</option>
                                                <option value="Pemula" {{ old('tingkat') == 'Pemula' ? 'selected' : '' }}>{{__('Pemula')}}</option>
                                                <option value="Menengah" {{ old('tingkat') == 'Menengah' ? 'selected' : '' }}>{{__('Menengah')}}</option>
                                                <option value="Tingkat Lanjut" {{ old('tingkat') == 'Tingkat Lanjut' ? 'selected' : '' }}>{{__('Tingkat Lanjut')}}</option>
                                            </select>

                                            @error('tingkat')
                                                <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <button class="btn btn-primary mt-2" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row mt-4">
                        </div>
                        @foreach ($keterampilan as $item)
                        <div class="row mt-5">
                           <div class="col">
                               <div class="row title-pengalaman keterampilan-list">
                                   <div class="col-md-3">
                                       <span class="small text-muted">{{__($item->tingkat)}}</span>
                                   </div>
                                   <div class="col-md-7">
                                       <p class="h5 font-weight-bold">{{__( $item->keterangan )}}</p>
                                   </div>
                                   <div class="col-md-2 d-flex justify-content-end">
                                       <a class="h5" href="{{ url('/siswa/profil/keterampilan/' . encrypt($item->id) . '/edit') }}"><i class="fa fa-edit"></i></a>
                                       <a class="h5 ml-2" href="" onclick="onHapus('{{ $item->keterangan }}', '{{ url('/siswa/profil/keterampilan/' . encrypt($item->id)) }}')"><i class="fa fa-trash-o"></i></a>
                                   </div>
                               </div>
                           </div>
                       </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="form-hapus" action="" method="post">
    @method('delete')
    @csrf
</form>

@endsection

@section('script')

<script>
    const tombol = document.getElementById('tombol-munculkan-navigasi')
    const navigasi = document.getElementById('navigasi-profil-siswa')

    tombol.addEventListener('click', function(e) {
        e.preventDefault();
        navigasi.classList.toggle('d-none-sm')
    });
</script>

<script>
    const tombolTrigger = document.getElementById('trigger-tambah-keterampilan')
    const containerForm = document.getElementById('container-form-keterampilan')

    tombolTrigger.addEventListener('click', function(e) {
        e.preventDefault()

        containerForm.classList.toggle('d-none')
    })
</script>

<script>
    function onHapus(jabatan, url) {
        event.preventDefault();
        const formHapus = document.getElementById('form-hapus')
        formHapus.setAttribute('action', url)
        return confirm('apakah anda yakin, \nmenghapus ' + jabatan) ? formHapus.submit() : false

    }
</script>

@endsection
