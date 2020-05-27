@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row mt-4 mb-5">
        
        @include('widget.trigger-navigasi-profil-siswa-for-pages')

        <div class="col-lg-3 px-2">

        @include('widget.navigasi-profil-siswa-for-pages')

        </div>

        <div class="col-lg-9 px-2">
            <div class="card p-3">
                <div>
                    <div class="px-2 mt-4 pb-5">
                        <span class="mt- h5 "><i class="fa fa-mortar-board"></i> {{('Bahasa')}}</span>
                        <span class="d-block mt-3 text-muted">Tingkat Kemahiran: 0 - Jelek, 10 - Baik Sekali</span>
                        <div id="container-form-bahasa"  class="mt-lg-4">
                            <div id="screen-besar">
								<div class="form-group language-form-group">
                                    <div class="row">
                                        <label class="col-sm-2"><b>Bahasa</b></label>
                                        <label class="col-sm-2 text-center"><b>Lisan</b></label>
                                        <label class="col-sm-2 text-center"><b>Tulisan</b></label>
                                        <label class="col-sm-2 text-center"><b>Sertifikat</b></label>
                                        <label class="col-sm-2 text-center"><b>Skor</b></label>
                                        <label class="col-sm-2 text-center"><b>Utama</b></label>
                                    </div>
                                </div>
                                @foreach ($siswaBahasa as $item)
                                    <div class="form-group language-form-group">
                                        <div class="row">
                                            <label class="col-sm-2">{{ $item->bahasa->nama }}</label>
                                            <label class="col-sm-2 text-center">{{ $item->lisan }}</label>
                                            <label class="col-sm-2 text-center">{{ $item->tulisan }}</label>
                                            <label class="col-sm-2 text-center">{{ $item->sertifikat }}</label>
                                            <label class="col-sm-2 text-center">{{ $item->skor }}</label>
                                            <label class="col-sm-2 text-center">{!! ($item->utama == 1) ? '<i class="fa fa-check"></i>' : '' !!}</label>
                                        </div>

                                    </div>
                                @endforeach
								<div class="col-xs-12"><br></div>
                            </div>
                            





                            <div id="screen-kecil">
                                @foreach ($siswaBahasa as $item)
                                <div class="form-group mt-4">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col">
                                                <span>Bahasa</span>
                                            </div>
                                            <div class="col">
                                                <span>{{ $item->bahasa->nama }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col">
                                                <span>Lisan</span>
                                            </div>
                                            <div class="col">
                                                <span>{{ $item->lisan }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col">
                                                <span>Tulisan</span>
                                            </div>
                                            <div class="col">
                                                <span>{{ $item->tulisan }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col">
                                                <span>Sertifikat</span>
                                            </div>
                                            <div class="col">
                                                <span>{{ $item->sertifikat }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col">
                                                <span>Skor</span>
                                            </div>
                                            <div class="col">
                                                <span>{{ $item->skor }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col">
                                                <span>Utama</span>
                                            </div>
                                            <div class="col">
                                                <span>{!! ($item->utama == 1) ? '<i class="fa fa-check"></i>' : ''!!}</span>
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