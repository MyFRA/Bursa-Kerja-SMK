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
                        <div id="container-form-bahasa" class=" mt-4">
                            <form id="form-nggo-input" action="{{ url('/siswa/profil/bahasa/' . encrypt($siswaBahasa[0]->siswa_id)) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row edit-layar-besar">
                                    <div class="col-lg-2">
                                        <label class="text-muted" for="bahasa_id">{{__('Bahasa')}} <span class="text-danger">*</span> </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="text-muted" for="lisan">{{__('Lisan')}} <span class="text-danger">*</span> </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="text-muted" for="tulisan">{{__('tulisan')}} <span class="text-danger">*</span> </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="text-muted" for="sertifikat">{{__('sertifikat')}} </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="text-muted" for="skor">{{__('skor')}} </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label class="text-muted" for="utama">{{__('utama')}} </label>
                                    </div>
                                </div>
                                @foreach ($siswaBahasa as $siswaBhs)
                                
                                {{-- Untuk Layar Besar ( Dekstop ) --}}
                                    <div id="row-form" class="edit-layar-besar">
                                        <div id="row-input" class="row mt-5 mt-lg-3">
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <select class="form-control @error('bahasa_id') is-invalid @enderror" id="bahasa_id" name="bahasa_id[]" required> 
                                                        @foreach ($bahasa as $item)
                                                            <option value="{{ $item->id }}" {{ ($siswaBhs->bahasa_id == $item->id) ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                    @error('bahasa_id')
                                                        <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <select class="form-control @error('lisan') is-invalid @enderror" id="lisan" name="lisan[]" required> 
                                                        @foreach ($lisan as $item)
                                                            <option value="{{ $item }}" {{ ($siswaBhs->lisan == $item) ? 'selected' : '' }}>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                    @error('lisan')
                                                        <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <select class="form-control @error('tulisan') is-invalid @enderror" id="tulisan" name="tulisan[]" required> 
                                                        @foreach ($lisan as $item)
                                                            <option value="{{ $item }}" {{ ($siswaBhs->tulisan == $item) ? 'selected' : '' }}>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                    @error('tulisan')
                                                        <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <select class="form-control @error('sertifikat') is-invalid @enderror" id="sertifikat" name="sertifikat[]"> 
                                                        <option value="">Pilih Sertifikat</option>
                                                        @foreach ($sertifikat as $item)
                                                            <option value="{{ $item }}" {{ ($siswaBhs->sertifikat == $item) ? 'selected' : '' }}>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                    @error('sertifikat')
                                                        <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <select class="form-control @error('skor') is-invalid @enderror" id="skor" name="skor[]" required> 
                                                        <option value="">Pilih Skor</option>
                                                        @foreach ($lisan as $item)
                                                            <option value="{{ $item }}" {{ ($siswaBhs->skor == $item) ? 'selected' : '' }}>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                    @error('skor')
                                                        <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-1 text-center ">
                                                <div class="form-check text-center float-left mt-lg-n2">
                                                    <label class="form-check-label text-center ml-lg-3 ">
                                                    <input id="utama" type="number" class="d-none" name="utama[]" value="">
                                                    <input class="form-check-input" type="radio" name="utamaSari" value="1" id="utamaSari" {{ ($siswaBhs->utama == 1) ? 'checked' : '' }}>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <div class="mt-lg-2">
                                                <a href="" onclick="onHapus('{{ $siswaBhs->bahasa->nama }}', '{{ url('/siswa/profil/bahasa/' . encrypt($siswaBhs->id)) }}')"><i class="fa fa-trash "></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{-- Akhir Untuk Layar Besar ( Dekstop ) --}}
                                    <div class="edit-layar-kecil">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                    Bahasa Utama
                                                    </label>
                                                    <a class="float-right mt-3" href=""><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                <div class="row">
                                    <div class="col">
                                        <a id="trigger-tambahkan-bahasa" class="" href=""><i class="fa fa-plus-circle"></i> Tambahkan Bahasa</a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-10">
                                        <button id="tombol-input-form" class="btn btn-primary mt-2" type="submit">Update</button>
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









{{-- Elemen Untuk Clone Row  --}}

<div id="container-new-form" class="d-none">
    <div id="new-row-input" class="row mt-5 mt-lg-3 ">
        <div class="col-lg-2">
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
        <div class="col-lg-1 text-center ">
            <div class="form-check text-center float-left mt-lg-n2">
                <label class="form-check-label text-center ml-lg-3 ">
                  <input id="utama" type="number" class="d-none" name="utama[]" value="">
                  <input class="form-check-input" type="radio" name="utamaSari" value="1" id="utamaSari" >
                </label>
              </div>
    
        </div>
        <div class="col-lg-1">
            <div class="mt-lg-2">
                <a href="" onclick="hapusRow(this)"><i class="fa fa-trash"></i></a>
            </div>
        </div>
        <div class="col">
        </div>
    </div>
</div>


{{-- Akhir Elemen Untuk Clone Row --}}









<form id="form-hapus" action="" method="POST">
    @csrf
    @method('delete')
</form>

@endsection


@section('script')

    <script>
        function onHapus(bahasa, url) {
            event.preventDefault()
            
            let formHapus = document.getElementById('form-hapus')
            formHapus.setAttribute('action', url)

            return confirm('yakin') ? formHapus.submit() : false

        }
    </script>

    <script>
        function hapusRow(e) {
            event.preventDefault()

            let element = e.parentElement.parentElement.parentElement
            const rowFormContainer = document.getElementById('row-form')
            const layarBesar = document.querySelector('.edit-layar-besar')
            const layarKecil = document.querySelector('.edit-layar-kecil')

            rowFormContainer.removeChild(element)
            
        }
    </script>


<script>

    function clone() {
        let rowInput = document.getElementById('new-row-input')
        let clone = rowInput.cloneNode(true)
        return clone
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