<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

use App\Models\BidangKeahlian;
use App\Models\ProgramKeahlian;
use App\Models\Perusahaan;
use App\Models\Negara;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Bahasa;
use App\Models\Lowongan;
use App\User;

class PerusahaanController extends Controller
{

    private $id;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'items' => Perusahaan::orderBy('created_at', 'DESC')->get(),
            'title' => 'Daftar Perusahaan',
            'nav'   => 'daftar-perusahaan',
        );

        return view('admin.pages.daftar-perusahaan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Perusahaan',
            'nav'   => 'daftar-perusahaan',
            'bidangKeahlian' => BidangKeahlian::orderBy('nama', 'ASC')->get(),
            'programKeahlian' => ProgramKeahlian::orderBy('nama', 'ASC')->get(),
            'negara' => Negara::orderBy('nama_negara', 'ASC')->pluck('nama_negara'),
            'bahasa'            => Bahasa::orderBy('nama', 'ASC')->get(['nama']),
        );

        return view('admin.pages.daftar-perusahaan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Pengecekan apakah bidang keahlian || program keahlian tidak terdapat di database
        if( BidangKeahlian::find($request->bidang_keahlian_id)->count() < 0 || ProgramKeahlian::find($request->program_keahlian_id < 0 ) ) {
            return redirect()->back()
                             ->with('gagal', 'bidang keahlian atau program keahlian tidak cocok');
        }

        // Validasi Form Input
        $validator = Validator::make($request->all(), [
            'bidang_keahlian_id'    => 'required',
            'program_keahlian_id'   => 'required',
            'nama'                  => 'required|max:128',
            'kategori'              => "in:Negeri,Swasta,BUMN|required",
            'telp'                  => 'max:16',
            'email'                 => 'max:128',
            'facebook'              => 'max:64',
            'twitter'               => 'max:64',
            'instagram'             => 'max:64',
            'linkedin'              => 'max:64',
            'alamat'                => 'max:128',
            'kodepos'               => 'max:8',
            'kabupaten'             => 'max:64',
            'provinsi'              => 'max:32',
            'negara'                => 'max:32',
            'jumlah_karyawan'       => 'max:16',
            'waktu_proses_perekrutan' => 'max:32',
            'gaya_berpakaian'       => 'max:128',
            'bahasa'                => 'max:128',
            'waktu_bekerja'         => 'max:64',
        ], [
            'bidang_keahlian_id.required' => 'bidang keahlian harus diisi',
            'program_keahlian_id.required'=> 'program keahlian harus diisi',
            'nama.required'               => 'nama harus diisi',
            'nama.max'                    => 'nama maksimal 128 karakter',
            'kategori.in'                 => "kategori harus diantara Negeri, Swasta, BUMN",
            'email.max'                   => 'email maksimal 128 karakter',
            'telp.max'                    => 'telp maksimal 16 karakter',
            'facebook.max'                => 'facebook maksimal 64 karakter',
            'twitter.max'                 => 'twitter maksimal 64 karakter',
            'instagram.max'               => 'instagram maksimal 64 karakter',
            'linkedin.max'                => 'linkedin maksimal 64 karakter',
            'jumlah_karyawan.max'         => 'jumlah karyawan maksimal 16 karakter',
            'alamat.max'                  => 'alamat maksimal 128 karakter',
            'kodepos.max'                 =>  'kodepos maksimal 8 karakter',
            'kabupaten.max'               =>  'kabupaten maksimal 32 karakter',
            'provinsi.max'                =>  'provinsi maksimal 32 karakter',
            'negara.max'                  =>  'negara maksimal 32 karakter',
            'waktu_proses_perekrutan.max' => 'waktu proses perekrutan maksimal 32 karakter',
            'gaya_berpakaian.max'         => 'gaya berpakaian maksimal 128 karakter',
            'bahasa.max'                  => 'bahasa maksimal 128 karakter',
            'waktu_bekerja.max'           => 'waktu bekerja maksimal 64 karakter',
        ]);

        // Jika Validasi Gagal Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Perusahaan Gagal )
        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        // Lolos Validasi
        }else {
            // Pengecekan apakah file yang diupload adl gambar, jika bukan Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Perusahaan Gagal )
            if( $this->storePerusahaan($request) != true ) return redirect()->back()->with('gagal', 'Logo atau Image yang kamu upload bukan gambar')->withInput();
            // Lolos Pengecekan, Insert Data Perusahaan Berhasil
            return redirect('/app-admin/daftar-perusahaan/'. encrypt($this->id) . '/edit')->with('success', "Perusahaan $request->nama_pertama telah ditambahkan");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function ajax($bkID)
    {
        $program_keahlian = ProgramKeahlian::where('bidang_keahlian_id', $bkID)->get();

        return Response::json($program_keahlian);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perusahaan = Perusahaan::find(decrypt($id));
        $negara = Negara::where('nama_negara', $perusahaan->negara)->first();
        $provinsi = Provinsi::where('nama_provinsi', $perusahaan->provinsi)->first();


        $provinsiCollection = (empty($negara)) ? [] : Provinsi::where('negara_id', $negara->id)->orderBy('nama_provinsi', 'ASC')->get();
        $kabupatenCollection = (empty($provinsi)) ? [] : Kabupaten::where('provinsi_id', $provinsi->id)->orderBy('nama_kabupaten', 'ASC')->get();

        $data = array(
            'title' => 'Perusahaan',
            'nav'   => 'perusahaan',
            'item'  => Perusahaan::find(decrypt($id)),
            'bidangKeahlian'    => BidangKeahlian::get(),
            'programKeahlian'   => ProgramKeahlian::where('bidang_keahlian_id', $perusahaan->bidang_keahlian_id)->get(),
            'negara'            => Negara::orderBy('nama_negara', 'ASC')->get(),
            'provinsi'          => $provinsiCollection,
            'kabupaten'         => $kabupatenCollection,
            'bahasa'            => Bahasa::get(),
            'perusahaan'        => $perusahaan,
        );

        return view('admin.pages.daftar-perusahaan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Pengecekan apakah bidang keahlian || program keahlian tidak terdapat di database
        if( BidangKeahlian::find($request->bidang_keahlian_id)->count() < 0 || ProgramKeahlian::find($request->program_keahlian_id < 0 ) ) {
            return redirect()->back()
                             ->with('gagal', 'bidang keahlian atau program keahlian tidak cocok');
        }

        // Validasi Form Input
        $validator = Validator::make($request->all(), [
            'bidang_keahlian_id'    => 'required',
            'program_keahlian_id'   => 'required',
            'nama'                  => 'required|max:128',
            'kategori'              => "in:Negeri,Swasta,BUMN|required",
            'telp'                  => 'max:16',
            'email'                 => 'max:128',
            'facebook'              => 'max:64',
            'twitter'               => 'max:64',
            'instagram'             => 'max:64',
            'linkedin'              => 'max:64',
            'alamat'                => 'max:128',
            'kodepos'               => 'max:8',
            'kabupaten'             => 'max:64',
            'provinsi'              => 'max:32',
            'negara'                => 'max:32',
            'jumlah_karyawan'       => 'max:16',
            'waktu_proses_perekrutan' => 'max:32',
            'gaya_berpakaian'       => 'max:128',
            'bahasa'                => 'max:128',
            'waktu_bekerja'         => 'max:64',
        ], [
            'bidang_keahlian_id.required' => 'bidang keahlian harus diisi',
            'program_keahlian_id.required'=> 'program keahlian harus diisi',
            'nama.required'               => 'nama harus diisi',
            'nama.max'                    => 'nama maksimal 128 karakter',
            'kategori.in'                 => "kategori harus diantara Negeri, Swasta, BUMN",
            'email.max'                   => 'email maksimal 128 karakter',
            'telp.max'                    => 'telp maksimal 16 karakter',
            'facebook.max'                => 'facebook maksimal 64 karakter',
            'twitter.max'                 => 'twitter maksimal 64 karakter',
            'instagram.max'               => 'instagram maksimal 64 karakter',
            'linkedin.max'                => 'linkedin maksimal 64 karakter',
            'jumlah_karyawan.max'         => 'jumlah karyawan maksimal 16 karakter',
            'alamat.max'                  => 'alamat maksimal 128 karakter',
            'kodepos.max'                 =>  'kodepos maksimal 8 karakter',
            'kabupaten.max'               =>  'kabupaten maksimal 32 karakter',
            'provinsi.max'                =>  'provinsi maksimal 32 karakter',
            'negara.max'                  =>  'negara maksimal 32 karakter',
            'waktu_proses_perekrutan.max' => 'waktu proses perekrutan maksimal 32 karakter',
            'gaya_berpakaian.max'         => 'gaya berpakaian maksimal 128 karakter',
            'bahasa.max'                  => 'bahasa maksimal 128 karakter',
            'waktu_bekerja.max'           => 'waktu bekerja maksimal 64 karakter',
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        // Lolos Validasi
        }else {
            // Pengecekan apakah file yang diupload adl gambar, jika bukan Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Siswa Gagal )
            if( $this->updatePerusahaan($request, $id) != true ) return redirect()->back()->with('gagal', 'File yang kamu upload bukan gambar')->withInput();
            // Lolos Pengecekan, Insert Data Siswa Berhasil
            return redirect('/app-admin/daftar-perusahaan/'. encrypt($this->id) . '/edit')->with('success', "Data perusahaan $request->nama telah diubah");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Mengambil data perusahaan dimana id = $id
        $data = Perusahaan::find(decrypt($id));
        $lowongan = Lowongan::where('perusahaan_id', $data->id)->get();

        foreach ($lowongan as $loker ) {
            // Mengecek apakah image terdapat di dalam storage
            $existsImage = Storage::disk('local')->exists('/public/assets/lowongan-kerja' . $loker->image);

            // Jika image terdapat di dalam storage (True), maka hapus image tsb
            if($existsImage) Storage::disk('local')->delete('/public/assets/lowongan-kerja' . $loker->image);

            Lowongan::destroy($loker->id);
        }

        // Cek Logo
            // Mengecek apakah logo terdapat di dalam storage
            $existsLogo = Storage::disk('local')->exists('/public/assets/daftar-perusahaan/logo/' . $data->logo);

            // Jika logo terdapat di dalam storage (True), maka hapus logo tsb
            if($existsLogo) Storage::disk('local')->delete('/public/assets/daftar-perusahaan/logo/' . $data->logo);

        // Cek Image
            // Mengecek apakah image terdapat di dalam storage
            $existsImage = Storage::disk('local')->exists('/public/assets/daftar-perusahaan/image/' . $data->image);

            // Jika image terdapat di dalam storage (True), maka hapus image tsb
            if($existsImage) Storage::disk('local')->delete('/public/assets/daftar-perusahaan/image/' . $data->image);

        // Menghapus row Perusahaan dimana id = $id
        User::destroy($data->user_id);
        Perusahaan::destroy(decrypt($id));

        return back()->with('success', "Data Perusahaan $data->nama telah dihapus");
    }




    public function storePerusahaan($request)
    {
        // Pengecekan jika tidak ada gambar yang diupload, baik logo ataupun image
        if (is_null($request->file('image')) && is_null($request->file('logo'))) {
            // Insert data Perusahaan dan mengembalikan nilai True
            $dataPerusahaan = Perusahaan::create($request->all());
            $this->id = $dataPerusahaan->id;
            return true;
        } else {
            // Pengecekan Logo
                // Pengecekan apakah logo tidak diupload, jika iya, maka $logo = NULL
                if ( is_null($request->file('logo')) ) {
                    $namaLogo = NULL;
                } else {
                    // Jika ternyata, ada file yang diupload di logo, maka lanjut pengecekan, apakah file yang diupload berupa gambar
                    $ekstensiValid = ['jpeg', 'png', 'bmp', 'gif', 'svg','webp', 'jpg'];
                    if (!in_array($request->file('logo')->getClientOriginalExtension(), $ekstensiValid)) return false;

                    // Lolos Pengecekan ( File (logo) = Gambar ) & File Siap Diupload
                    $namaLogo = explode('.', $request->file('logo')->getClientOriginalName());
                    $namaLogo = $namaLogo[0] . '_' . time() . '.' . $request->file('logo')->getClientOriginalExtension();
                    $request->file('logo')->storeAs('public/assets/daftar-perusahaan/logo', $namaLogo);
                }

            // Pengecekan image
                // Pengecekan apakah image tidak diupload, jika iya, maka $image = NULL
                if ( is_null($request->file('image')) ) {
                    $namaImage = NULL;
                } else {
                    // Jika ternyata, ada file yang diupload di image, maka lanjut pengecekan, apakah file yang diupload berupa gambar
                    $ekstensiValid = ['jpeg', 'png', 'bmp', 'gif', 'svg','webp', 'jpg'];
                    if (!in_array($request->file('image')->getClientOriginalExtension(), $ekstensiValid)) return false;

                    // Lolos Pengecekan ( File (image) = Gambar ) & File Siap Diupload
                    $namaImage = explode('.', $request->file('image')->getClientOriginalName());
                    $namaImage = $namaImage[0] . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $request->file('image')->storeAs('public/assets/daftar-perusahaan/image', $namaImage);
                }

            // Insert data perusahaaan dan mengembalikan nilai True
            $dataPerusahaan = Perusahaan::create([
                'bidang_keahlian_id'    => $request->bidang_keahlian_id,
                'program_keahlian_id'   => $request->program_keahlian_id,
                'nama'                  => $request->nama,
                'kategori'              => $request->kategori,
                'logo'                  => $namaLogo,
                'image'                 => $namaImage,
                'telp'                  => $request->telp,
                'email'                 => $request->email,
                'fax'                   => $request->fax,
                'site'                  => $request->site,
                'facebook'              => $request->facebook,
                'twitter'               => $request->twitter,
                'instagram'             => $request->instagram,
                'linkedin'              => $request->linkedin,
                'alamat'                => $request->alamat,
                'kabupaten'             => $request->kabupaten,
                'provinsi'              => $request->provinsi,
                'negara'                => $request->negara,
                'kodepos'               => $request->kodepos,
                'jumlah_karyawan'       => $request->jumlah_karyawan,
                'waktu_proses_perekrutan' => $request->waktu_proses_perekrutan,
                'gaya_berpakaian'       => $request->gaya_berpakaian,
                'bahasa'                => $request->bahasa,
                'waktu_bekerja'         => $request->waktu_bekerja,
                'tunjangan'             => $request->tunjangan,
                'overview'              => $request->overview,
                'alasan_harus_melamar'  => $request->alasan_harus_melamar,
            ]);

            $this->id = $dataPerusahaan->id;
            return true;
        }
    }

    public function updatePerusahaan($request, $id)
    {
        $data = Perusahaan::find(decrypt($id));

        // Pengecekan jika tidak ada gambar yang diupload, baik logo ataupun image
        if (is_null($request->file('image')) && is_null($request->file('logo'))) {

            // Update data Perusahaan dan mengembalikan nilai True
            $data->update([
                'bidang_keahlian_id'    => $request->bidang_keahlian_id,
                'program_keahlian_id'   => $request->program_keahlian_id,
                'nama'                  => $request->nama,
                'kategori'              => $request->kategori,
                'telp'                  => $request->telp,
                'email'                 => $request->email,
                'fax'                   => $request->fax,
                'site'                  => $request->site,
                'facebook'              => $request->facebook,
                'twitter'               => $request->twitter,
                'instagram'             => $request->instagram,
                'linkedin'              => $request->linkedin,
                'alamat'                => $request->alamat,
                'kabupaten'             => $request->kabupaten,
                'provinsi'              => $request->provinsi,
                'negara'                => $request->negara,
                'kodepos'               => $request->kodepos,
                'jumlah_karyawan'       => $request->jumlah_karyawan,
                'waktu_proses_perekrutan' => $request->waktu_proses_perekrutan,
                'gaya_berpakaian'       => $request->gaya_berpakaian,
                'bahasa'                => $request->bahasa,
                'waktu_bekerja'         => $request->waktu_bekerja,
                'tunjangan'             => $request->tunjangan,
                'overview'              => $request->overview,
                'alasan_harus_melamar'  => $request->alasan_harus_melamar,
            ]);

            $this->id = $data->id;
            return true;
        } else {
            // Pengecekan Logo
                // Pengecekan apakah logo tidak diupload, jika iya, maka $logo = NULL
                if ( is_null($request->file('logo')) ) {
                    $namaLogo = NULL;
                } else {
                    // Jika ternyata, ada file yang diupload di logo, maka lanjut pengecekan, apakah file yang diupload berupa gambar
                    $ekstensiValid = ['jpeg', 'png', 'bmp', 'gif', 'svg','webp', 'jpg'];
                    if (!in_array($request->file('logo')->getClientOriginalExtension(), $ekstensiValid)) return false;

                    // Lolos Pengecekan ( File (logo) = Gambar ) & File Siap Diupload
                    $namaLogo = explode('.', $request->file('logo')->getClientOriginalName());
                    $namaLogo = $namaLogo[0] . '_' . time() . '.' . $request->file('logo')->getClientOriginalExtension();
                    $request->file('logo')->storeAs('public/assets/daftar-perusahaan/logo', $namaLogo);

                    // Mengecek apakah logo lama terdapat di dalam storage
                    $existsLogo = Storage::disk('local')->exists('/public/assets/daftar-perusahaan/logo/' . $data->logo);

                    // Jika logo lama terdapat di dalam storage (True), maka hapus logo tsb
                    if($existsLogo) Storage::disk('local')->delete('/public/assets/daftar-perusahaan/logo/' . $data->logo);
                }

            // Pengecekan image
                // Pengecekan apakah image tidak diupload, jika iya, maka $image = NULL
                if ( is_null($request->file('image')) ) {
                    $namaImage = NULL;
                } else {
                    // Jika ternyata, ada file yang diupload di image, maka lanjut pengecekan, apakah file yang diupload berupa gambar
                    $ekstensiValid = ['jpeg', 'png', 'bmp', 'gif', 'svg','webp', 'jpg'];
                    if (!in_array($request->file('image')->getClientOriginalExtension(), $ekstensiValid)) return false;

                    // Lolos Pengecekan ( File (image) = Gambar ) & File Siap Diupload
                    $namaImage = explode('.', $request->file('image')->getClientOriginalName());
                    $namaImage = $namaImage[0] . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $request->file('image')->storeAs('public/assets/daftar-perusahaan/image', $namaImage);

                    // Mengecek apakah image terdapat di dalam storage
                    $existsImage = Storage::disk('local')->exists('/public/assets/daftar-perusahaan/image/' . $data->image);

                    // Jika image terdapat di dalam storage (True), maka hapus image tsb
                    if($existsImage) Storage::disk('local')->delete('/public/assets/daftar-perusahaan/image/' . $data->image);
                }

            // update data perusahaaan dan mengembalikan nilai True
                $data->update([
                    'bidang_keahlian_id'    => $request->bidang_keahlian_id,
                    'program_keahlian_id'   => $request->program_keahlian_id,
                    'nama'                  => $request->nama,
                    'kategori'              => $request->kategori,
                    'logo'                  => $namaLogo,
                    'image'                 => $namaImage,
                    'telp'                  => $request->telp,
                    'email'                 => $request->email,
                    'fax'                   => $request->fax,
                    'site'                  => $request->site,
                    'facebook'              => $request->facebook,
                    'twitter'               => $request->twitter,
                    'instagram'             => $request->instagram,
                    'linkedin'              => $request->linkedin,
                    'alamat'                => $request->alamat,
                    'kabupaten'             => $request->kabupaten,
                    'provinsi'              => $request->provinsi,
                    'negara'                => $request->negara,
                    'kodepos'               => $request->kodepos,
                    'jumlah_karyawan'       => $request->jumlah_karyawan,
                    'waktu_proses_perekrutan' => $request->waktu_proses_perekrutan,
                    'gaya_berpakaian'       => $request->gaya_berpakaian,
                    'bahasa'                => $request->bahasa,
                    'waktu_bekerja'         => $request->waktu_bekerja,
                    'tunjangan'             => $request->tunjangan,
                    'overview'              => $request->overview,
                    'alasan_harus_melamar'  => $request->alasan_harus_melamar,
                ]);

                $this->id = $data->id;
                return true;
        }
    }

    // Fungsi Hapus Massal
    public function hapusMassal()
    {
        $data = Perusahaan::get();
        $lowongan = Lowongan::where('perusahaan_id', $data->id)->get();

        foreach ($lowongan as $loker ) {
            // Mengecek apakah image terdapat di dalam storage
            $existsImage = Storage::disk('local')->exists('/public/assets/lowongan-kerja' . $loker->image);

            // Jika image terdapat di dalam storage (True), maka hapus image tsb
            if($existsImage) Storage::disk('local')->delete('/public/assets/lowongan-kerja' . $loker->image);

            Lowongan::destroy($loker->id);
        }

        foreach($data as $perusahaan) {
            // Cek Logo
            // Mengecek apakah logo terdapat di dalam storage
            $existsLogo = Storage::disk('local')->exists('/public/assets/daftar-perusahaan/logo/' . $perusahaan->logo);

            // Jika logo terdapat di dalam storage (True), maka hapus logo tsb
            if($existsLogo) Storage::disk('local')->delete('/public/assets/daftar-perusahaan/logo/' . $perusahaan->logo);

            // Cek Image
            // Mengecek apakah image terdapat di dalam storage
            $existsImage = Storage::disk('local')->exists('/public/assets/daftar-perusahaan/image/' . $perusahaan->image);

            // Jika image terdapat di dalam storage (True), maka hapus image tsb
            if($existsImage) Storage::disk('local')->delete('/public/assets/daftar-perusahaan/image/' . $perusahaan->image);
            User::destroy($perusahaan->user_id);
            Perusahaan::destroy($perusahaan->id);
        }

        return back()->with('success', 'Semua Perusahaan Telah Dihapus');
    }
}
