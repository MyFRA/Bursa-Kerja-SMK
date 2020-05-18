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
                        <span class="mt- h5 "><i class="fa fa-mortar-board"></i> {{('Bahasa')}}</span>
                        <a id="trigger-edit-bahasa" class="ml-3" href="{{ url('/siswa/profil/bahasa/kemampuan/edit') }}"><i class="fa fa-edit"></i> Edit</a>
                        <span class="d-block mt-3 text-muted">Tingkat Kemahiran: 0 - Jelek, 10 - Baik Sekali</span>
                        @if (count($siswaBahasa) < 1)
                        <div id="container-form-bahasa" class=" mt-4">
                            <form id="form-nggo-input" action="{{ url('/siswa/profil/bahasa') }}" method="post">
                                @csrf
                                <div id="row-form">
                                    <div id="row-input" class="row mt-5 mt-lg-3">
                                        <div class="col-lg-2">
                                            <label class="text-muted" for="bahasa_id">{{__('Bahasa')}} <span class="text-danger">*</span> </label>
                                            <div class="form-group">
                                                <select class="form-control @error('bahasa_id') is-invalid @enderror" id="bahasa_id" name="bahasa_id[]" required> 
                                                    @foreach ($bahasa as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                                
                                                @error('bahasa_id')
                                                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label class="text-muted" for="lisan">{{__('Lisan')}} <span class="text-danger">*</span> </label>
                                                <select class="form-control @error('lisan') is-invalid @enderror" id="lisan" name="lisan[]" required> 
                                                    @foreach ($lisan as $item)
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                                
                                                @error('lisan')
                                                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label class="text-muted" for="tulisan">{{__('tulisan')}} <span class="text-danger">*</span> </label>
                                                <select class="form-control @error('tulisan') is-invalid @enderror" id="tulisan" name="tulisan[]" required> 
                                                    @foreach ($lisan as $item)
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                                
                                                @error('tulisan')
                                                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label class="text-muted" for="sertifikat">{{__('sertifikat')}} </label>
                                                <select class="form-control @error('sertifikat') is-invalid @enderror" id="sertifikat" name="sertifikat[]"> 
                                                    <option value="">Pilih Sertifikat</option>
                                                    @foreach ($sertifikat as $item)
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                                
                                                @error('sertifikat')
                                                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label class="text-muted" for="skor">{{__('skor')}} </label>
                                                <select class="form-control @error('skor') is-invalid @enderror" id="skor" name="skor[]" required> 
                                                    <option value="">Pilih Skor</option>
                                                    @foreach ($lisan as $item)
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                                
                                                @error('skor')
                                                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2 text-center ">
                                            <div class="form-check float-left mt-lg-4">
                                                <label class="form-check-label mt-lg-2">
                                                  <input id="utama" type="number" class="d-none" name="utama[]" value="">
                                                  <input class="form-check-input" type="radio" name="utamaSari" value="1" id="utamaSari" >
                                                  Utama
                                                </label>
                                              </div>
              
                                        </div>
                                        <div class="col">
                                            <hr>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <a id="trigger-tambahkan-bahasa" class="" href=""><i class="fa fa-plus-circle"></i> Tambahkan Bahasa</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <button id="tombol-input-form" class="btn btn-primary mt-2" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @else
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
                        @endif
                        <div class="row mt-4">
                        </div>
                        {{-- @foreach ($keterampilan as $item)
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
                        @endforeach --}}
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

<script>
    function onHapus(jabatan, url) {
        event.preventDefault();
        const formHapus = document.getElementById('form-hapus')
        formHapus.setAttribute('action', url)
        return confirm('apakah anda yakin, \nmenghapus ' + jabatan) ? formHapus.submit() : false
        
    }
</script>

<script>
    function clone() {
        let rowInput = document.getElementById('row-input')
        let clone = rowInput.cloneNode(true);

        return clone;
    }

    let tombolTriggerTambahkan = document.getElementById('trigger-tambahkan-bahasa')
    let rowFormContainer = document.getElementById('row-form')


    tombolTriggerTambahkan.addEventListener('click', function(e) {
        e.preventDefault()
        
        rowFormContainer.appendChild(clone())
    })
</script>

<script>
    
    let utamasari = document.getElementById('utamaSari');
    let tombolInputForm = document.getElementById('tombol-input-form')
    let formInput = document.getElementById('form-nggo-input')

    tombolInputForm.addEventListener('click', function(e) {

        let utama = document.querySelectorAll('#utama');
        let nilai;
        let jmlCheck = []
        
        utama.forEach(function(e) {

            if(e.nextElementSibling.checked) {
                jmlCheck.push('ok')
                nilai = 1
            } else {
                nilai = 0
            }

            e.setAttribute('value', nilai)

        })

        if ( jmlCheck.length == 1) {
            true
        } else {
            alert('Harap Pilih Satu Bahasa Utama')
            e.preventDefault()
        }


    })
</script>

@endsection