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
                        <span class="mt- h5 "><i class="fa fa-mortar-board"></i> {{('Keterampilan')}}</span>
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