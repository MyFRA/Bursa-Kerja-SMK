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

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'items' => Perusahaan::select('perusahaan.*', 'm_program_keahlian.nama as nama_program_keahlian')
                                   ->join('m_program_keahlian', 'perusahaan.program_keahlian_id', '=', 'm_program_keahlian.id')
                                   ->get(),
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
            'user_id' => Auth::user()->id,
            'title' => 'Perusahaan',
            'nav'   => 'daftar-perusahaan',
            'bidangKeahlian' => BidangKeahlian::orderBy('nama', 'ASC')->get(),
            'programKeahlian' => ProgramKeahlian::orderBy('nama', 'ASC')->get(),
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
        // Pengecekan apakah input user_id = Auth::user()->id
        if( $request->user_id != Auth::user()->id ) return redirect()->back()->with('gagal', 'User ID tidak sama');

        // Pengecekan apakah bidang keahlian || program keahlian tidak terdapat di database
        if( BidangKeahlian::find($request->bidang_keahlian_id)->count() < 0 || ProgramKeahlian::find($request->program_keahlian_id < 0 ) ) {
            return redirect()->back()
                             ->with('gagal', 'bidang keahlian atau program keahlian tidak cocok');
        }

        // Validasi Form Input
        $validator = Validator::make($request->all(), [
            'user_id'               => 'required',
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
            'kabupaten'             => 'max:32',
            'provinsi'              => 'max:32',
            'negara'                => 'max:32',
            'jumlah_karyawan'       => 'max:16',
            'waktu_proses_perekrutan' => 'max:32',
            'gaya_berpakaian'       => 'max:128',
            'bahasa'                => 'max:128',
            'waktu_bekerja'         => 'max:64',
        ], [
            'user_id.required'            => 'id tidak boleh kosong',
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
            return redirect('/app-admin/daftar-perusahaan')->with('success', "Perusahaan $request->nama_pertama telah ditambahkan");
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
        $data = array(
            'title' => 'Perusahaan',
            'nav'   => 'perusahaan',
            'item'  => Perusahaan::find(decrypt($id)),
            'namaBidangKeahlian' => BidangKeahlian::find(Perusahaan::find(decrypt($id))->bidang_keahlian_id)->nama,
            'namaProgramKeahlian' => ProgramKeahlian::find(Perusahaan::find(decrypt($id))->bidang_keahlian_id)->nama,
            'bidangKeahlian' => BidangKeahlian::orderBy('nama', 'ASC')->get(),
            'programKeahlian' => ProgramKeahlian::orderBy('nama', 'ASC')->get(),
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
            'kabupaten'             => 'max:32',
            'provinsi'              => 'max:32',
            'negara'                => 'max:32',
            'jumlah_karyawan'       => 'max:16',
            'waktu_proses_perekrutan' => 'max:32',
            'gaya_berpakaian'       => 'max:128',
            'bahasa'                => 'max:128',
            'waktu_bekerja'         => 'max:64',
        ], [
            'user_id.required'            => 'id tidak boleh kosong',
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
            return redirect('/app-admin/daftar-perusahaan')->with('success', "Data perusahaan $request->nama telah diubah");
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
        Perusahaan::destroy(decrypt($id));
        return back()->with('success', "Data Perusahaan $data->nama telah dihapus");
    }




    public function storePerusahaan($request)
    {   
        // Pengecekan jika tidak ada gambar yang diupload, baik logo ataupun image
        if (is_null($request->file('image')) && is_null($request->file('logo'))) {
            // Insert data Perusahaan dan mengembalikan nilai True
            Perusahaan::create($request->all());
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
            Perusahaan::create([
                'user_id'               => $request->user_id,
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
                return true;
        }
    }
}
