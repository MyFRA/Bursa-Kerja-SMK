@extends('layouts.app')

@section('content')

<div class="resume-siswa-pendidikan">
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="row">
                        <div class=" col-lg-5 p-5">
                          <span  class="h3 w-100 d-block float-left text-primary align-self-start"> {{__('2 / 2')}}</span>
                            <div class="d-flex h-75 w-100 align-items-center justify-content-center">
                              <img style="animation: tememplek 0.5s;" class="w-50" src="{{ asset('/images/profile.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 p-lg-4">
                          <h1 style="animation: tememplek 0.5s;" class="text-center">{{__('Siswa Lainya')}}</h1>
                          <form action="{{ url('/siswa/create-resume/siswa-lainya') }}" method="post">
                            @csrf
                            <div style="animation: tememplek 0.5s;" class="row mt-4 mt-lg-5 p-3 p-lg-0">
                                <div class="col-lg-6 mt-2">
                                    <div class="form-group">
                                      <label class="font-weight-bold" for="pilih_keterampilan_id">{{__('Keterampilan')}} <span class="text-danger">*</span></label>
                                      <select class="form-control @error('keterampilan_id') is-invalid @enderror" id="pilih_keterampilan_id" name="keterampilan_id" required>
                                        <option value="" selected disabled>-- Pilih Keterampilan --</option>  
                                        @foreach ($keterampilan as $item)
                                            <option value="{{ $item->id }}" {{ old('keterampilan_id') == $item->id ? 'selected' : '' }}>{{$item->nama}}</option>
                                         @endforeach
                                      </select>
                                    
                                      @error('keterampilan_id')
                                        <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                      @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-2">
                                <div class="form-group">
                                  <label class="font-weight-bold" for="gaji_diharapkan">{{__('Gaji Diharapkan')}}</label>
                                  <input type="text" class="form-control @error('gaji_diharapkan') is-invalid @enderror" id="gaji_diharapkan" name="gaji_diharapkan" placeholder="Gaji Diharapkan" value="{{ old('gaji_diharapkan') }}">
                                
                                  @error('gaji_diharapkan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-lg-8 mt-2">
                                <div class="form-group">
                                  <label class="font-weight-bold" for="lokasi_diharap">{{__('Lokasi Diharapkan')}}</label><br>
                                  <select class="js-example-basic-multiple form-control @error('lokasi_diharap') is-invalid @enderror" id="lokasi_diharap" name="lokasi_diharap[]" multiple="multiple">
                                      @foreach ($provinsi as $item)
                                        <option value="{{ $item->nama_provinsi }}" {{ old('lokasi_diharap') == $item->nama_provinsi ? 'selected' : '' }}>{{$item->nama_provinsi}}</option>
                                      @endforeach
                                  </select>
                                
                                  @error('lokasi_diharap')
                                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="keterangan">{{__('Keterangan')}}</label>
                                  <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Tambahkan Keterangan">{{ old('keterangan') }}</textarea>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <button class="btn btn-primary w-100 mt-2" type="submit">{{__('Submit')}}</button>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

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
        });
    })(jQuery);

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