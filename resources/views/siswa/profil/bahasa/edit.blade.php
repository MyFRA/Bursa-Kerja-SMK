@extends('layouts.app')
@section('content')


{{-- Konten --}}
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
                            <span class="d-block mt-3 text-muted">Tingkat Kemahiran: 0 - Jelek, 10 - Baik Sekali</span>
                            <div id="container-form-bahasa" class=" mt-4">
                                <form id="form-nggo-input-screen-besar" action="{{ url('/siswa/profil/bahasa/' . encrypt($siswaBahasa[0]->siswa_id)) }}" method="post">
                                    @csrf
                                    @method('PUT')


                                    {{-- Form Edit Screen Layar Besar --}}
                                        <div class="row edit-layar-besar">
                                            <div class="col-lg-2">
                                                <label class="text-muted label-for-dekstop" for="bahasa_id">{{__('Bahasa')}} <span class="text-danger">*</span> </label>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="text-muted label-for-dekstop" for="lisan">{{__('Lisan')}} <span class="text-danger">*</span> </label>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="text-muted label-for-dekstop" for="tulisan">{{__('tulisan')}} <span class="text-danger">*</span> </label>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="text-muted label-for-dekstop" for="sertifikat">{{__('sertifikat')}} </label>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="text-muted label-for-dekstop" for="skor">{{__('skor')}} </label>
                                            </div>
                                            <div class="col-lg-1">
                                                <label class="text-muted label-for-dekstop" for="utama">{{__('utama')}} </label>
                                            </div>
                                        </div>

                                        <div id="row-form" class="edit-layar-besar">
                                            @foreach ($siswaBahasa as $siswaBhs)
                                                <div id="row-input">
                                                    <div class="row mt-5 mt-lg-3">
                                                        <div class="col-12 col-lg-2 px-2 mt-n2">
                                                            <div class="form-group">
                                                                <label class="text-muted label-for-mobile" for="bahasa_id">{{__('Bahasa')}} <span class="text-danger">*</span> </label>
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
                                                        <div class="col-6 col-lg-2 px-2 mt-n2">
                                                            <div class="form-group">
                                                                <label class="text-muted label-for-mobile" for="lisan">{{__('Lisan')}} <span class="text-danger">*</span> </label>
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
                                                        <div class="col-6 col-lg-2 px-2 mt-n2">
                                                            <div class="form-group">
                                                                <label class="text-muted label-for-mobile" for="tulisan">{{__('tulisan')}} <span class="text-danger">*</span> </label>
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
                                                        <div class="col-6 col-lg-2 px-2 mt-n2">
                                                            <div class="form-group">
                                                                <label class="text-muted label-for-mobile" for="sertifikat">{{__('sertifikat')}} </label>
                                                                <select class="form-control @error('sertifikat') is-invalid @enderror" id="sertifikat" name="sertifikat[]"> 
                                                                    <option value="" selected>Pilih Sertifikat</option>
                                                                    @foreach ($sertifikat as $item)
                                                                        <option value="{{ $item }}" {{ ($siswaBhs->sertifikat == $item) ? 'selected' : '' }}>{{ $item }}</option>
                                                                    @endforeach
                                                                </select>
                                                                
                                                                @error('sertifikat')
                                                                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-lg-2 px-2 mt-n2">
                                                            <div class="form-group">
                                                                <label class="text-muted label-for-mobile" for="skor">{{__('skor')}} </label>
                                                                <select class="form-control @error('skor') is-invalid @enderror" id="skor" name="skor[]"> 
                                                                    <option value="" selected >Pilih Skor</option>
                                                                    @foreach ($lisan as $item)
                                                                        <option value="{{ $item }}" {{ ($siswaBhs->skor == $item) ? 'selected' : '' }}>{{ $item }}</option>
                                                                    @endforeach
                                                                </select>
                                                                
                                                                @error('skor')
                                                                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-1 text-center px-lg-2 mt-lg-n2">
                                                            <div class="form-check text-center float-left mt-lg-n2">
                                                                <label class="form-check-label text-center ml-lg-3 ">
                                                                    <label class="text-muted label-for-mobile mr-auto ml-n4" for="skor">{{__('Bahasa Utama')}} </label>
                                                                    <input id="utama" type="number" class="d-none" name="utama[]" value="">
                                                                    <input class="form-check-input ml-n5 ml-lg-n2 mt-n1 mt-lg-0" type="radio" name="utamaSari" value="1" id="utamaSari" {{ ($siswaBhs->utama == 1) ? 'checked' : '' }}>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-1 px-lg-2 mt-lg-n2">
                                                            <div class="mt-lg-1 mt-2 mr-lg-0 mr-2 tombol-hapus-row-bahasa">
                                                                <a href="" onclick="onHapus('{{ $siswaBhs->bahasa->nama }}', '{{ url('/siswa/profil/bahasa/' . encrypt($siswaBhs->id)) }}')"><i class="fa fa-trash "></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-1">
                                                </div>
                                            @endforeach
                                        </div>
                                    {{-- Akhir Form Edit Screen Layar Besar --}}

{{-- --------------------------------------------------------------------------------------------- --}}
{{-- 
                                    {{-- Tombol Trigger Tambah Row Input Bahasa --}}
                                        <div class="row">
                                            <div class="col mt-3">
                                                <a id="" class="trigger-tambahkan-bahasa" href=""><i class="fa fa-plus-circle"></i> Tambahkan Bahasa</a>
                                            </div>
                                        </div>
                                    {{-- Akhir Tombol Trigger Tambah Row Input Bahasa --}}
                                    
                                    

                                    {{-- Tombol Input ( Submit Data ) --}}
                                        <div class="row">
                                            <div class="col-lg-10 tombol-update-lainya mt-n2">
                                                <button id="tombol-input-form" class="btn btn-primary mt-4" type="submit">Update</button>
                                                <a href="{{ url('/siswa/profil/bahasa') }}" type="submit" class="btn btn-secondary mt-lg-4">Batalkan</a>
                                            </div>
                                        </div>
                                    {{-- Akhir Tombol Input ( Submit Data ) --}}

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- AKhir Konten --}}








{{-- Elemen Untuk Clone Row Screen Besar --}}
    <div id="container-new-form" class="d-none">
        <div id="new-row-input" class="mt-lg-4 mt-n3">
            <div class="row mt-5 mt-lg-3">
                <div class="col-12 col-lg-2 px-2 mt-n2">
                    <div class="form-group">
                        <label class="text-muted label-for-mobile" for="bahasa_id">{{__('Bahasa')}} <span class="text-danger">*</span> </label>
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
                <div class="col-6 col-lg-2 px-2 mt-n2">
                    <div class="form-group">
                        <label class="text-muted label-for-mobile" for="lisan">{{__('Lisan')}} <span class="text-danger">*</span> </label>
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
                <div class="col-6 col-lg-2 px-2 mt-n2">
                    <div class="form-group">
                        <label class="text-muted label-for-mobile" for="tulisan">{{__('tulisan')}} <span class="text-danger">*</span> </label>
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
                <div class="col-6 col-lg-2 px-2 mt-n2">
                    <div class="form-group">
                        <label class="text-muted label-for-mobile" for="sertifikat">{{__('sertifikat')}} </label>
                        <select class="form-control @error('sertifikat') is-invalid @enderror" id="sertifikat" name="sertifikat[]"> 
                            <option value="" selected>Pilih Sertifikat</option>
                            @foreach ($sertifikat as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        
                        @error('sertifikat')
                            <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                        @enderror
                    </div>
                </div>
                <div class="col-6 col-lg-2 px-2 mt-n2">
                    <div class="form-group">
                        <label class="text-muted label-for-mobile" for="skor">{{__('skor')}} </label>
                        <select class="form-control @error('skor') is-invalid @enderror" id="skor" name="skor[]"> 
                            <option value="" selected >Pilih Skor</option>
                            @foreach ($lisan as $item)
                                <option value="{{ $item }}" >{{ $item }}</option>
                            @endforeach
                        </select>
                        
                        @error('skor')
                            <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-lg-1 text-center px-lg-2 mt-lg-n2">
                    <div class="form-check text-center float-left mt-lg-n2">
                        <label class="form-check-label text-center ml-lg-3 ">
                            <label class="text-muted label-for-mobile mr-auto ml-n4" for="skor">{{__('Bahasa Utama')}} </label>
                            <input id="utama" type="number" class="d-none" name="utama[]" value="">
                            <input class="form-check-input ml-n5 ml-lg-n2 mt-n1 mt-lg-0" type="radio" name="utamaSari" value="1" id="utamaSari">
                        </label>
                    </div>
                </div>
                <div class="col-12 col-lg-1 px-lg-2 mt-lg-n2">
                    <div class="mt-lg-1 mt-2 mr-lg-0 mr-2 tombol-hapus-row-bahasa">
                        <a href="" onclick="hapusRow(this)"><i class="fa fa-trash "></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-1">
        </div>

    </div>
{{-- Akhir Elemen Untuk Clone Row Screen Besar--}}



{{-- ---------------------------------------------------------------------------------------------- --}}


{{-- Form Hapus Bahasa --}}
    <form id="form-hapus" action="" method="POST">
        @csrf
        @method('delete')
    </form>
{{-- Akhir Form Hapus Bahasa --}}

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

            let element = e.parentElement.parentElement.parentElement.parentElement
            const rowFormContainer = document.getElementById('row-form')

            rowFormContainer.removeChild(element)
        }
    </script>


<script>

    function cloneScreen() {
        let rowInput = document.getElementById('new-row-input')
        let clone = rowInput.cloneNode(true)
        return clone
    }

    let tombolTriggerTambahkan = document.querySelectorAll('.trigger-tambahkan-bahasa')
    let rowFormContainer = document.getElementById('row-form')

    tombolTriggerTambahkan.forEach(function(e) {
        e.addEventListener('click', function(e) {
            e.preventDefault()
            rowFormContainer.appendChild(cloneScreen())
        })
    });

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


<script>
    const tombol = document.getElementById('tombol-munculkan-navigasi')
    const navigasi = document.getElementById('navigasi-profil-siswa')

    tombol.addEventListener('click', function(e) {
        e.preventDefault();
        navigasi.classList.toggle('d-none-sm')
    });
</script>

@endsection