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
                        <span class="h5 "><i class="fa fa-align-justify"></i> {{('Info Lainya')}}</span>
                        <a id="trigger-tambah-keterampilan" class="ml-3" href="{{ url('/siswa/profil/lainya/' . encrypt($siswaLainya->id) . '/edit') }}"><i class="fa fa-edit"></i> Edit</a>
                        <div class="row mt-lg-4 mt-2">
                           <div class="col">
                                <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                    <div class="col-md-3">
                                        <p class=" text-muted">Keterampilan</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mt-n3 mt-lg-0">{{__($siswaLainya->keterampilan->nama)}}</p>
                                    </div>
                                </div>
                               <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                   <div class="col-md-3">
                                       <p class=" text-muted">Gaji yang diharapkan</p>
                                   </div>
                                   <div class="col-md-7">
                                       <p class="mt-n3 mt-lg-0">{{__(number_format($siswaLainya->gaji_diharapkan, 0, '.', '.'))}}</p>
                                   </div>
                               </div>
                               <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">Lokasi diharap</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ join(', ', json_decode($siswaLainya->lokasi_diharap)) }}</p>
                                </div>
                            </div>
                            <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">Keterangan</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{__($siswaLainya->keterangan)}}</p>
                                </div>
                            </div>
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

{{-- onclick="onHapus('{{ $item->keterangan }}', '{{ url('/siswa/profil/keterampilan/' . encrypt($item->id)) }}')" --}}