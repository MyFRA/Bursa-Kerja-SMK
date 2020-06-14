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
                        <form action="{{ url('/siswa/profil/lainya/' . encrypt($siswaLainya->id)) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mt-lg-4 mt-2">
                                <div class="col">
                                    <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                        <div class="col-md-3">
                                            <p class="text-muted">Keterampilan</p>
                                        </div>
                                        <div class="col-md-5">
                                             <div class="form-group mt-n2 mt-lg-0">
                                                <select class="js-example-basic-single form-control" name="keterampilan_id">
                                                    @foreach ($keterampilan as $item)
                                                        <option value="{{ $item->id }}" {{ $item->id == $siswaLainya->keterampilan_id ? 'selected' : '' }} >{{ $item->nama }}</option>
                                                    @endforeach
                                                  </select>
                                             </div>
                                        </div>
                                    </div>
                                    <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                        <div class="col-md-3">
                                            <p class="text-muted">Gaji yang diharapkan</p>
                                        </div>
                                        <div class="col-md-5">
                                             <div class="form-group mt-n2 mt-lg-0">
                                                 <input type="text" class="form-control " name="gaji_diharapkan" id="gaji_diharapkan" placeholder="Gaji Diharapkan" value="{{ old('gaji_diharapkan') ? old('gaji_diharapkan') : $siswaLainya->gaji_diharapkan }}">
                                             </div>
                                        </div>
                                    </div>
                                    <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                     <div class="col-md-3">
                                         <p class=" text-muted">Lokasi diharap</p>
                                     </div>
                                     <div class="col-md-5 col-sm-6">
                                         <div class="form-group mt-n2 mt-lg-0">
                                             <select class="js-example-basic-multiple form-control @error('lokasi_diharap') is-invalid @enderror" id="lokasi_diharap" name="lokasi_diharap[]" multiple="multiple" value="@if($siswaLainya->lokasi_diharap != 'null') {{ old('lokasi_diharap[]') ? old('lokasi_diharap[]') : join(',', json_decode($siswaLainya->lokasi_diharap)) }} @endif">
                                                @if ($siswaLainya->lokasi_diharap == 'null')
                                                    @foreach ($provinsi as $item)
                                                        <option value="{{ $item->nama_provinsi }}" {{ old('nama_provinsi') == $item->nama_provinsi ? 'selected' : '' }}>{{$item->nama_provinsi}}</option>
                                                    @endforeach
                                                @else
                                                    @foreach ($lokasiDiharap as $lokasi)
                                                        @foreach ($provinsi as $item)
                                                            <option value="{{ $item->nama_provinsi }}" {{ $item->nama_provinsi == $lokasi ? 'selected' : '' }}>{{$item->nama_provinsi}}</option>
                                                        @endforeach
                                                    @endforeach
                                                @endif
                                             </select>
                                         </div>


                                         @error('lokasi_diharap')
                                           <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                         @enderror
                                     </div>
                                 </div>
                                 <div class="row title-pengalaman keterampilan-list mt-lg-2 mt-5">
                                     <div class="col-md-3">
                                         <p class=" text-muted">Keterangan</p>
                                     </div>
                                     <div class="col-md-5">
                                         <div class="form-group mt-n2 mt-lg-0">
                                             <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row title-pengalaman keterampilan-list mt-lg-4 mt-3">
                                     <div class="col-md-3">

                                     </div>
                                     <div class="col-md-5 tombol-update-lainya">
                                         <button type="submit" class="btn btn-primary ">Update</button>
                                         <a href="{{ url('/siswa/profil/lainya') }}" type="submit" class="btn btn-secondary">Batalkan</a>
                                     </div>
                                 </div>
                                </div>

                       </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection





@section('stylesheet')
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
@endsection


@section('script')

<script src="{{ asset('app-admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>

<script>
	(function($) {
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
            $('.js-example-basic-single').select2();
        });
    })(jQuery);

</script>

<script>

</script>

<script>
    const tombol = document.getElementById('tombol-munculkan-navigasi')
    const navigasi = document.getElementById('navigasi-profil-siswa')

    tombol.addEventListener('click', function(e) {
        e.preventDefault();
        navigasi.classList.toggle('d-none-sm')
    });
</script>

<script type="text/javascript">

    var gaji_diharapkan = document.getElementById('gaji_diharapkan');
    gaji_diharapkan.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        gaji_diharapkan.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

@endsection
