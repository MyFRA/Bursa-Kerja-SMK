@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row mt-4 mb-5">
        
        @include('widget.trigger-navigasi-profil-siswa')

        <div class="col-lg-3 px-2">

        @include('widget.navigasi-profil-siswa')

        </div>

        <div class="col-lg-9 px-2">
            <div class="card p-3">
                <div>
                    <div class="px-2 mt-4 pb-5">
                        <span class="mt- h5 "><i class="fa fa-mortar-board"></i> {{('Keterampilan')}}</span>
                    
                        <div id="container-form-keterampilan" class=" mt-4">
                            <form action="{{ url('/siswa/profil/keterampilan/' . encrypt($keterampilan->id)) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="text-muted" for="keterangan">{{__('Keterampilan')}} <span class="text-danger">*</span> </label>
                                        <div class="form-group">
                                            <input type="text" placeholder="Keterampilan"  class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" required value="{{old('keterangan') ? old('keterangan') : $keterampilan->keterangan}}">
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
                                                <option value="Pemula" {{ $keterampilan->tingkat == 'Pemula' ? 'selected' : '' }} {{ old('tingkat') == 'Pemula' ? 'selected' : '' }}>{{__('Pemula')}}</option>
                                                <option value="Menengah" {{ $keterampilan->tingkat == 'Meneggah' ? 'selected' : '' }} {{ old('tingkat') == 'Menengah' ? 'selected' : '' }}>{{__('Menengah')}}</option>
                                                <option value="Tingkat Lanjut" {{ $keterampilan->tingkat == 'Tingkat Lanjut' ? 'selected' : '' }} {{ old('tingkat') == 'Tingkat Lanjut' ? 'selected' : '' }}>{{__('Tingkat Lanjut')}}</option>
                                            </select>
                                            
                                            @error('tingkat')
                                                <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <button class="btn btn-primary mt-2" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
@endsection