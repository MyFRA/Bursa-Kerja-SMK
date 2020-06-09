@extends('perusahaan.layouts.app')

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
                        <span class="h5 "><i class="fa fa-user"></i> {{('Profil Siswa')}}</span>
                        <div class="row mt-lg-4 mt-2">
                           <div class="col">
                                <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                    <div class="col-md-3">
                                        <p class=" text-muted">{{__('Nama Pertama')}}</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mt-n3 mt-lg-0">{{ $siswa->nama_pertama ? __($siswa->nama_pertama) : '' }}</p>
                                    </div>
                                </div>
                                <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                    <div class="col-md-3">
                                        <p class=" text-muted">{{__('Nama Belakang')}}</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mt-n3 mt-lg-0">{{__($siswa->nama_belakang)}}</p>
                                    </div>
                                </div>
                                <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                    <div class="col-md-3">
                                        <p class=" text-muted">{{__('Photo')}}</p>
                                    </div>
                                    <div class="col-md-7">
                                        <img class="w-25" src="{{ ($siswa->photo == null) ? asset('/images/profile.svg') : asset('storage/assets/daftar-siswa/' . $siswa->photo) }}" alt="">
                                    </div>
                                </div>
                               <div class="row title-pengalaman keterampilan-list mt-lg-4 mt-5">
                                   <div class="col-md-3">
                                       <p class=" text-muted">{{__('Tempat Lahir')}}</p>
                                   </div>
                                   <div class="col-md-7">
                                       <p class="mt-n3 mt-lg-0">{{ $siswa->tempat_lahir ? __($siswa->tempat_lahir) : __('-') }}</p>
                                   </div>
                               </div>
                               <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">{{__('Tanggal Lahir')}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ $siswa->tanggal_lahir ? __($siswa->tanggal_lahir) : __('-') }}</p>
                                </div>
                            </div>
                            <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">{{__('Jenis Kelamin')}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ $siswa->jenis_kelamin ? __($siswa->jenis_kelamin) : __('-') }}</p>
                                </div>
                            </div>
                            <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">{{__('Email')}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ $siswa->email ? __($siswa->email) : __('-') }}</p>
                                </div>
                            </div>
                            <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">{{__('Hp')}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ $siswa->hp ? __($siswa->hp) : __('-') }}</p>
                                </div>
                            </div>
                            <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">{{__('Facebook')}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ $siswa->facebook ? __($siswa->facebook) : __('-') }}</p>
                                </div>
                            </div>
                            <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">{{__('Twitter')}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ $siswa->twitter ? __($siswa->twitter) : __('-') }}</p>
                                </div>
                            </div>
                            <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">{{__('Instagram')}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ $siswa->instagram ? __($siswa->instagram) : __('-') }}</p>
                                </div>
                            </div>
                            <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">{{__('Linkedin')}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ $siswa->linkedin ? __($siswa->linkedin) : __('-') }}</p>
                                </div>
                            </div>
                            <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">{{__('Alamat')}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ $siswa->alamat ? __($siswa->alamat) : __('-') }}</p>
                                </div>
                            </div>
                            <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">{{__('Kode Pos')}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ $siswa->kodepos ? __($siswa->kodepos) : __('-') }}</p>
                                </div>
                            </div>
                            <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">{{__('Kabupaten')}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ $siswa->kabupaten ? __($siswa->kabupaten) : __('-') }}</p>
                                </div>
                            </div>
                            <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">{{__('Provinsi')}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ $siswa->provinsi ? __($siswa->provinsi) : __('-') }}</p>
                                </div>
                            </div>
                            <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">{{__('Negara')}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ $siswa->negara ? __($siswa->negara) : __('-') }}</p>
                                </div>
                            </div>
                            <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">{{__('Kartu Indentitas')}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ $siswa->kartu_identitas ? __($siswa->kartu_identitas) : __('-') }}</p>
                                </div>
                            </div>
                            <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">{{__('Kartu Identitas Nomor')}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ $siswa->kartu_identitas_nomor ? __($siswa->kartu_identitas_nomor) : __('-') }}</p>
                                </div>
                            </div>
                            <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">{{__('Pengalaman Level')}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ $siswa->pengalaman_level ? __($siswa->pengalaman_level) : __('-') }}</p>
                                </div>
                            </div>
                            <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                <div class="col-md-3">
                                    <p class=" text-muted">{{__('Pengalaman Level Teks')}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-n3 mt-lg-0">{{ $siswa->pengalaman_level_teks ? __($siswa->pengalaman_level_teks) : __('-') }}</p>
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
