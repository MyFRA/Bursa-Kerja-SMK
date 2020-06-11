@extends('admin.layouts.app')

@section('page-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-share-alt mr-2"></i>
                    Perusahaan
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('/app-admin/daftar-perusahaan') }}" class="btn btn-default rounded-0">
                    <i class="fas fa-table mr-1"></i> Daftar Perusahaan
                </a>
                <a href="{{ url('/app-admin/daftar-perusahaan/create') }}" class="btn btn-primary rounded-0">
                    <i class="fas fa-plus-circle mr-1"></i> Perusahaan Baru
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-5">
        <form action="{{ url('/app-admin/daftar-perusahaan/' . encrypt($item->id)) }}" method="post" class="card" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="pilih_bidang_keahlian">{{__('Bidang Keahlian')}} <span class="text-danger">{{__('*')}}</span></label>
                    <select class="form-control @error('bidang_keahlian_id') is-invalid @enderror" id="pilih_bidang_keahlian" name="bidang_keahlian_id" required>
                        <option value="" selected="" disabled="">{{__('-- Pilih Bidang Keahlian --')}}</option>
                        @foreach ($bidangKeahlian as $bk)
                            <option value="{{ $bk->id }}"
                                @if (old('bidang_keahlian_id'))
                                    {{ (old('bidang_keahlian_id') == $bk->id) ? 'selected' : '' }}
                                @else
                                    {{ ($perusahaan->bidang_keahlian_id == $bk->id) ? 'selected' : '' }}
                                @endif
                            >{{$bk->nama}}</option>
                        @endforeach
                    </select>

                    @error('bidang_keahlian_id')
                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pilih_program_keahlian">{{__('Program Keahlian')}} <span class="text-danger">*</span></label>
                    <select class="form-control @error('program_keahlian_id') is-invalid @enderror" id="pilih_program_keahlian" name="program_keahlian_id" required>
                    <option value="" selected="" disabled="">{{__('-- Pilih Program Keahlian --')}}</option>
                        @foreach ($programKeahlian as $pK)
                            <option value="{{ $pK->id }}"
                                @if (old('program_keahlian_id'))
                                    {{ old('program_keahlian_id') == $pK->id ? 'selected' : '' }}
                                @else
                                    {{ $perusahaan->program_keahlian_id == $pK->id ? 'selected' : '' }}
                                @endif
                            >{{$pK->nama}}</option>
                        @endforeach
                    </select>

                    @error('program_keahlian_id')
                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama Perusahaan<span class="text-danger">*</span></label>
                    <input required="" type="text" name="nama" value="{{ old('nama') ? old('nama') : $item->nama }}" class="form-control @error('nama') is-invalid @enderror" / >

                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori<span class="text-danger">*</span></label>
                    <select name="kategori" id="" class="form-control custom-select" required="">
                        <option value="" disabled="" selected>{{__('-- Pilih Kategori --')}}</option>
                        <option value="Negeri"
                            @if (old('kategori'))
                                {{ (old('kategori') == 'Negeri') ? 'selected' : '' }}
                            @else
                                {{ ($perusahaan->kategori == 'Negeri') ? 'selected' : '' }}
                            @endif
                        >{{__('Negeri')}}</option>

                        <option value="Swasta"
                            @if (old('kategori'))
                                {{ (old('kategori') == 'Swasta') ? 'selected' : '' }}
                            @else
                                {{ ($perusahaan->kategori == 'Swasta') ? 'selected' : '' }}
                            @endif
                        >{{__('Swasta')}}</option>

                        <option value="BUMN"
                            @if (old('kategori'))
                                {{ (old('kategori') == 'BUMN') ? 'selected' : '' }}
                            @else
                                {{ ($perusahaan->kategori == 'BUMN') ? 'selected' : '' }}
                            @endif
                        >{{__('BUMN')}}</option>
                    </select>
                    @error('kategori')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input id="image" type="file" name="logo" value="{{ old('logo') }}" class="form-control @error('logo') is-invalid @enderror" / >

                    @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input id="image2" type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror" / >

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telp">Telp</label>
                    <input type="text" name="telp" value="{{ old('telp') ? old('telp') : $item->telp }}" class="form-control @error('telp') is-invalid @enderror" / >

                    @error('telp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email') ? old('email') : $item->email }}" class="form-control @error('email') is-invalid @enderror" / >

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fax">Fax</label>
                    <input type="text" name="fax" value="{{ old('fax') ? old('fax') : $item->fax }}" class="form-control @error('fax') is-invalid @enderror" / >

                    @error('fax')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="site">Site</label>
                    <input type="text" name="site" value="{{ old('site') ? old('site') : $item->site }}" class="form-control @error('site') is-invalid @enderror" / >

                    @error('site')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" value="{{ old('facebook') ? old('facebook') : $item->facebook }}" class="form-control @error('facebook') is-invalid @enderror" / >

                    @error('facebook')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input type="text" name="twitter" value="{{ old('twitter') ? old('twitter') : $item->twitter }}" class="form-control @error('twitter') is-invalid @enderror" / >

                    @error('twitter')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="instagram">Instagram</label>
                    <input type="text" name="instagram" value="{{ old('instagram') ? old('instagram') : $item->instagram }}" class="form-control @error('instagram') is-invalid @enderror" / >

                    @error('instagram')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="linkedin">Linkedin</label>
                    <input type="text" name="linkedin" value="{{ old('linkedin') ? old('linkedin') : $item->linkedin }}" class="form-control @error('linkedin') is-invalid @enderror" / >

                    @error('linkedin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="4">{{ old('alamat') ? old('alamat') : $item->alamat }}</textarea>

                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="negara">{{__('Negara')}}</label>
                    <select class="form-control @error('negara') is-invalid @enderror" id="negara" name="negara">
                    <option value="" selected="" disabled="">{{__('Pilih Negara')}}</option>
                    @foreach ($negara as $n)
                        <option value="{{ $n->nama_negara }}"
                            @if (old('negara'))
                                {{ (old('negara') == $n->nama_negara) ? 'selected' : '' }}
                            @else
                                {{ $perusahaan->negara == $n->nama_negara ? 'selected' : '' }}
                            @endif
                        >{{ $n->nama_negara }}</option>
                    @endforeach
                    </select>

                    @error('negara')
                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="provinsi">{{__('Provinsi')}}</label>
                    <select class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi">
                    <option value="" selected="" disabled="">{{__('Pilih Provinsi')}}</option>
                        @foreach ($provinsi as $prov)
                            <option value="{{$prov->nama_provinsi}}"
                                @if (old('provinsi'))
                                    {{ old('provinsi') == $prov->nama_provinsi ? 'selected' : '' }}
                                @else
                                    {{ ($perusahaan->provinsi == $prov->nama_provinsi) ? 'selected' : '' }}
                                @endif
                            >{{__($prov->nama_provinsi)}}</option>
                        @endforeach
                    </select>

                    @error('provinsi')
                        <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kabupaten">{{__('Kabupaten')}}</label>
                    <select class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten">
                    <option value="" selected="" disabled="">{{__('Pilih Kabupaten')}}</option>
                        @foreach ($kabupaten as $kab)
                            <option value="{{$kab->nama_kabupaten}}"
                                @if (old('kabupaten'))
                                    {{ old('kabupaten') == $kab->nama_kabupaten ? 'selected' : '' }}
                                @else
                                    {{ ($perusahaan->kabupaten == $kab->nama_kabupaten) ? 'selected' : '' }}
                                @endif
                            >{{__($kab->nama_kabupaten)}}</option>
                        @endforeach
                    </select>

                    @error('kabupaten')
                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kodepos">Kode Pos</label>
                    <input type="text" name="kodepos" value="{{ old('kodepos') ? old('kodepos') : $item->kodepos }}" class="form-control @error('kodepos') is-invalid @enderror" / >

                    @error('kodepos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah_karyawan">Jumlah Karyawan</label>
                    <input type="text" name="jumlah_karyawan" value="{{ old('jumlah_karyawan') ? old('jumlah_karyawan') : $item->jumlah_karyawan }}" class="form-control @error('jumlah_karyawan') is-invalid @enderror" / >

                    @error('jumlah_karyawan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="waktu_proses_perekrutan">Waktu Proses Perekrutan</label>
                    <input type="text" name="waktu_proses_perekrutan" value="{{ old('waktu_proses_perekrutan') ? old('waktu_proses_perekrutan') : $item->waktu_proses_perekrutan }}" class="form-control @error('waktu_proses_perekrutan') is-invalid @enderror" / >

                    @error('waktu_proses_perekrutan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gaya_berpakaian">Gaya Berpakaian</label>
                    <input type="text" name="gaya_berpakaian" value="{{ old('gaya_berpakaian') ? old('gaya_berpakaian') : $item->gaya_berpakaian }}" class="form-control @error('gaya_berpakaian') is-invalid @enderror" / >

                    @error('gaya_berpakaian')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bahasa">Bahasa</label>
                    <input type="text" name="bahasa" value="{{ old('bahasa') ? old('bahasa') : $item->bahasa }}" class="form-control @error('bahasa') is-invalid @enderror" / >

                    @error('bahasa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="waktu_bekerja">Waktu Bekerja</label>
                    <input type="text" name="waktu_bekerja" value="{{ old('waktu_bekerja') ? old('waktu_bekerja') : $item->waktu_bekerja }}" class="form-control @error('waktu_bekerja') is-invalid @enderror" / >

                    @error('waktu_bekerja')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tunjangan">Tunjangan</label>
                    <textarea id="tunjangan" name="tunjangan" class="form-control @error('tunjangan') is-invalid @enderror" rows="4">{{ old('tunjangan') ? old('tunjangan') : $item->tunjangan }}</textarea>

                    @error('tunjangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="my-2" for="overview">{{__('Gambaran Perusahaan')}}</label>
                    <textarea name="overview" class="form-control summernote" style="display: none;">{{ old('overview') ? old('overview') : $perusahaan->overview }}</textarea>

                    @error('overview')
                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="my-2" for="alasan_harus_melamar">{{__('Alasan Harus Melamar')}}</label>
                    <textarea name="alasan_harus_melamar" class="form-control summernote" style="display: none;">{{ old('alasan_harus_melamar') ? old('alasan_harus_melamar') : $perusahaan->alasan_harus_melamar }}</textarea>

                    @error('alasan_harus_melamar')
                    <h6 class="mt-1 ml-1 mb-0 text-danger" >{{ $message }}</h6>
                    @enderror
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="reset" class="btn btn-default">
                    <i class="fas fa-undo mr-1"></i>
                    RESET
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i>
                    SIMPAN
                </button>
            </div>
        </form>
    </div>
    <div class="col-md-7">
        <div class="border p-3">
            <h6 class="text-uppercase border-bottom font-weight-bold font-size-sm pb-2">
                <i class="fas fa-info-circle mr-2"></i>DETAIL PERUSAHAAN
            </h6>
            <table class="table table-striped table-sm">
                <tr>
                    <td width="30%">BIDANG KEAHLIAN</td>
                    <td width="5px">:</td>
                    <td>{{ $item->bidangKeahlian->nama }}</td>
                </tr>
                <tr>
                    <td width="30%">PROGRAM KEAHLIAN</td>
                    <td width="5px">:</td>
                    <td>{{ $item->programKeahlian->nama }}</td>
                </tr>
                <tr>
                    <td width="30%">NAMA</td>
                    <td width="5px">:</td>
                    <td>{{ $item->nama }}</td>
                </tr>
                <tr>
                    <td width="30%">KATEGORI</td>
                    <td width="5px">:</td>
                    <td>{{ $item->kategori }}</td>
                </tr>
                <tr>
                    <td width="30%">TELP</td>
                    <td width="5px">:</td>
                    <td>{{ $item->telp }}</td>
                </tr>
                <tr>
                    <td width="30%">EMAIL</td>
                    <td width="5px">:</td>
                    <td>{{ $item->email }}</td>
                </tr>
                <tr>
                    <td width="30%">FAX</td>
                    <td width="5px">:</td>
                    <td>{{ $item->fax }}</td>
                </tr>
                <tr>
                    <td width="30%">SITE</td>
                    <td width="5px">:</td>
                    <td>{{ $item->site }}</td>
                </tr>
                <tr>
                    <td width="30%">FACEBOOK</td>
                    <td width="5px">:</td>
                    <td>{{ $item->facebook }}</td>
                </tr>
                <tr>
                    <td width="30%">TWITTER</td>
                    <td width="5px">:</td>
                    <td>{{ $item->twitter }}</td>
                </tr>
                <tr>
                    <td width="30%">INSTAGRAM</td>
                    <td width="5px">:</td>
                    <td>{{ $item->instagram }}</td>
                </tr>
                <tr>
                    <td width="30%">LINKEDIN</td>
                    <td width="5px">:</td>
                    <td>{{ $item->linkedin }}</td>
                </tr>
                <tr>
                    <td width="30%">ALAMAT</td>
                    <td width="5px">:</td>
                    <td>{{ $item->alamat }}</td>
                </tr>
                <tr>
                    <td width="30%">KABUPATEN</td>
                    <td width="5px">:</td>
                    <td>{{ $item->kabupaten }}</td>
                </tr>
                <tr>
                    <td width="30%">PROVINSI</td>
                    <td width="5px">:</td>
                    <td>{{ $item->provinsi }}</td>
                </tr>
                <tr>
                    <td width="30%">NEGARA</td>
                    <td width="5px">:</td>
                    <td>{{ $item->negara }}</td>
                </tr>
                <tr>
                    <td width="30%">KODE POS</td>
                    <td width="5px">:</td>
                    <td>{{ $item->kodepos }}</td>
                </tr>
                <tr>
                    <td width="30%">JUMLAH KARYAWAN</td>
                    <td width="5px">:</td>
                    <td>{{ $item->jumlah_karyawan }}</td>
                </tr>
                <tr>
                    <td width="30%">WAKTU PROSES PEREKRUTAN</td>
                    <td width="5px">:</td>
                    <td>{{ $item->waktu_proses_perekrutan }}</td>
                </tr>
                <tr>
                    <td width="30%">GAYA BERPAKAIAN</td>
                    <td width="5px">:</td>
                    <td>{{ $item->gaya_berpakaian }}</td>
                </tr>
                <tr>
                    <td width="30%">BAHASA</td>
                    <td width="5px">:</td>
                    <td>{{ $item->bahasa }}</td>
                </tr>
                <tr>
                    <td width="30%">WAKTU BEKERJA</td>
                    <td width="5px">:</td>
                    <td>{{ $item->waktu_bekerja }}</td>
                </tr>
                <tr>
                    <td width="30%">TUNJANGAN</td>
                    <td width="5px">:</td>
                    <td>{{ $item->tunjangan }}</td>
                </tr>
                <tr>
                    <td width="30%">Gambaran Perusahaan</td>
                    <td width="5px">:</td>
                    <td>{!! $item->overview !!}</td>
                </tr>
                <tr>
                    <td width="30%">ALASAN HARUS MELAMAR</td>
                    <td width="5px">:</td>
                    <td>{!! $item->alasan_harus_melamar !!}</td>
                </tr>
            </table>
        </div>
        <br>
        <div class="row">
            <div class="card col-md-6 collapsed-card">
                <div class="card-header p-2">
                    <h3 class="card-title"><b>Logo Lama</b></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-2">
                    <div class="card shadow">
                      <div class="card-body " id="imagePreview4">
                        <img class="img-thumbnail img-fluid image-preview__image4" src="{{ asset("/storage/assets/daftar-perusahaan/logo/$item->logo") }}" alt="">
                        <span class="image-preview__default-text4">Image Preview</span>
                      </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-6 collapsed-card">
                <div class="card-header p-2">
                    <h3 class="card-title"><b>Logo Baru</b></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-2">
                    <div class="card shadow">
                      <div class="card-body " id="imagePreview">
                        <img class="img-thumbnail img-fluid image-preview__image" src="" alt="">
                        <span class="image-preview__default-text">Image Preview</span>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card col-md-6 collapsed-card">
                <div class="card-header p-2">
                    <h3 class="card-title"><b>Image Lama</b></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-2">
                    <div class="card shadow">
                      <div class="card-body " id="imagePreview3">
                        <img class="img-thumbnail img-fluid image-preview__image3" src="{{ asset("/storage/assets/daftar-perusahaan/image/$item->image") }}" alt="">
                        <span class="image-preview__default-text3">Image Preview</span>
                      </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-6 collapsed-card">
                <div class="card-header p-2">
                    <h3 class="card-title"><b>Image Baru</b></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-2">
                    <div class="card shadow">
                      <div class="card-body " id="imagePreview2">
                        <img class="img-thumbnail img-fluid image-preview__image2" src="" alt="">
                        <span class="image-preview__default-text2">Image Preview</span>
                      </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('stylesheet')
	<link rel="stylesheet" href="{{ asset('/plugins/summernote/summernote-lite.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/app-admin/plugins/sweetalert2/sweetalert2.min.css') }}" />
@endsection

@section('script')
	<script src="{{ asset('/plugins/tags-autocomplete/jquery.min.js') }}"></script>
	<script src="{{ asset('/plugins/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('/app-admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

	<script>
		// Fungsi Pembuatan Summernote ( WYSIYG )
		(function($) {
			$(document).ready(function(){
		    	$('.summernote').summernote({
		    		height: 175,
		    		toolbar: [
						['style', ['style']],
						['font', ['bold', 'underline', 'clear']],
						['fontname', ['fontname']],
						['color', ['color']],
						['para', ['ul', 'ol', 'paragraph']],
						['table', ['table']],
						['insert', ['link']],
						['view', ['fullscreen', 'codeview', 'help']]
		    		]
		    	})
			});
	    })(jQuery);
	</script>


<script>
    const inpFile = document.getElementById('image');
    const previewContainer = document.getElementById('imagePreview');
    const previewImage = previewContainer.querySelector(".image-preview__image");
    const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

    inpFile.addEventListener("change", function() {
      const file = this.files[0];

      if (file) {
        const reader = new FileReader();

        previewDefaultText.style.display = 'none';
        previewImage.style.display = 'block';

        reader.addEventListener('load', function() {
          previewImage.setAttribute('src', this.result);
        });

        reader.readAsDataURL(file);
      } else {
        previewDefaultText.style.display = null;
        previewImage.style.display = null;
        previewImage.setAttribute('src', '');

      }
    });
</script>
<script>
    const inpFile2 = document.getElementById('image2');
    const previewContainer2 = document.getElementById('imagePreview2');
    const previewImage2 = previewContainer2.querySelector(".image-preview__image2");
    const previewDefaultText2 = previewContainer2.querySelector(".image-preview__default-text2");

    inpFile2.addEventListener("change", function() {
      const file = this.files[0];

      if (file) {
        const reader = new FileReader();

        previewDefaultText2.style.display = 'none';
        previewImage2.style.display = 'block';

        reader.addEventListener('load', function() {
          previewImage2.setAttribute('src', this.result);
        });

        reader.readAsDataURL(file);
      } else {
        previewDefaultText2.style.display = null;
        previewImage2.style.display = null;
        previewImage2.setAttribute('src', '');

      }
    });
</script>


<script>
    // Ajax Form
    const pilihBk = document.getElementById('pilih_bidang_keahlian');
    const pilihPk = document.getElementById('pilih_program_keahlian');
    const pilihProv = document.getElementById('provinsi');
    const pilihKab = document.getElementById('kabupaten');

    pilihBk.addEventListener('change', function(e) {
        bkId = e.target.value;
        fetch('/getProgramKeahlian/' + bkId)
        .then(response => response.json())
        .then(response => {
            let optionPk;

            response.forEach(function(m) {
                optionPk += "<option value='"+ m.id +"'>"+ m.nama +"</option>";
                pilihPk.innerHTML = optionPk
            })
        });
    });

    document.getElementById('negara').addEventListener('change', function(e) {
        let nama_negara = e.target.value;
        fetch('/getProvinsi/' + nama_negara)
        .then(response => response.json())
        .then(response => {
            let opsiProv;

            response.forEach(function(m) {
                opsiProv += "<option value='"+ m.nama_provinsi +"'>"+ m.nama_provinsi +"</option>";
                pilihProv.innerHTML = opsiProv;
                pilihKab.innerHTML = '<option value="" selected disabled>Pilih Kabupaten</option>';
            })
        });
    });

    document.getElementById('provinsi').addEventListener('change', function(e) {
        let nama_provinsi = e.target.value;
        fetch('/getKabupaten/' + nama_provinsi)
        .then(response => response.json())
        .then(response => {
            let opsiKab;

            response.forEach(function(m) {
                opsiKab += "<option value='"+ m.nama_kabupaten +"'>"+ m.nama_kabupaten +"</option>";
                pilihKab.innerHTML = opsiKab
            })
        });
    });
</script>


@if(Session::get('gagal'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: '{{ Session::get('gagal') }}',
})
</script>
@endif

@if(Session::get('success'))
<script>
Swal.fire(
  'Berhasil',
  '{{ Session::get('success') }}',
  'success'
)
</script>
@endif
@endsection
