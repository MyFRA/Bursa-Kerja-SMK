<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\Lowongan;	
use App\Models\Perusahaan;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
        	'title' => 'Lowongan kerja',
        	'nav'   => 'lowongan-kerja',
        	'items' => Lowongan::orderBy('id', 'DESC')->get(),
        );

        return view('admin.pages.lowongan-kerja.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
        	'perusahaan' => Perusahaan::orderBy('nama', 'ASC')->get(),
        	'title' => 'Lowongan kerja',
        	'nav'   => 'lowongan-kerja',
        );

        return view('admin.pages.lowongan-kerja.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Pengecekan apakah gambar tidak diupload
        if(is_null($request->file('image'))) return redirect()->back()->with('gagal', 'Gambar tidak boleh kosong')->withInput();
        
        // Validasi Form Input
        $validator = Validator::make($request->all(), [
        	'perusahaan_id'        => 'numeric|nullable',
        	'nama_perusahaan'      => 'max:128',
        	'jabatan'              => 'max:128|required',
        	'kompetensi_keahlian'  => 'required',
        	'keahlian'             => 'required',
        	'gaji_min'             => 'required|numeric',
        	'gaji_max'             => 'required|numeric',
        	'persyaratan'          => 'required',
        	'deskripsi'            => 'required',
        	'batas_akhir_lamaran'  => 'required|date',
        	'proses_lamaran'       => 'in:Online,Offline|required',
        	'status'               => 'in:Draf,Aktif,Nonaktif|required',
        	'image'                => 'required',
        	'jumlah_pelamar'       => 'numeric|required',
        ], [
            'perusahaan_id.numeric' => "id perusahaan harus angka",
            'nama_perusahaan.max'   => "nama perusahaan maksimal 128 karakter",
            'jabatan.max'           => "jabatan maksimal 128 karakter",
            'jabatan.required'      => "jabatan harus tidak boleh kosong",
            'kompetensi_keahlian.required' => "kompetensi keahlian tidak boleh kosong",
            'keahlian.required'     => "keahlian tidak boleh kosong",
            'gaji_min.required'     => "gaji min tidak boleh kosong",
            'gaji_min.numeric'      => "gaji min harus angka",
            'gaji_max.required'     => "gaji max tidak boleh kosong",
            'gaji_max.numeric'      => "gaji max harus angka",
            'persyaratan.required'  => "persyaratan tidak boleh kosong",
            'deskripsi.required'    => "deskripsi tidak boleh kosong",
            'batas_akhir_lamaran.required' => "batas akhir lamaran tidak boleh kosong",
            'batas_akhir_lamaran.date'  => "batas akhir lamara harus tanggal",
            'proses_lamaran.in'         => "Proses lamaran harus diantara Online dan Offline",
            'proses_lamaran.required'   => "proses lamaran tidak boleh kosong",
            'status.in'             => "status harus diantara Draf, Aktif dan Nonaktif",
            'status.required'       => "status tidak boleh kosong",
            'image.required'        => "image tidak boleh kosong",
            'jumlah_pelamar.numeric'    => 'jumlah pelamar harus angka',
            'jumlah_pelamar.required'   => "jumlah pelamar tidak boleh kosong",
        ]);

        // Jika Validasi Gagal Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Lowongan Gagal )
        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        // Lolos Validasi
        }else {
            // Pengecekan apakah file yang diupload adl gambar, jika bukan Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Lowongan Gagal )
            if( $this->storeLowongan($request) != true ) return redirect()->back()->with('gagal', 'File yang kamu upload bukan gambar')->withInput();
            // Lolos Pengecekan, Insert Data Lowongan Berhasil
            return redirect('/app-admin/lowongan-kerja')->with('success', "Lowongan Kerja telah ditambahkan");
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeLowongan($request)
    {  
        // Pengecekan file yang diupload apakah gambar / bukan
        $ekstensiValid = ['jpeg', 'png', 'bmp', 'gif', 'svg','webp', 'jpg'];
        if (!in_array($request->file('image')->getClientOriginalExtension(), $ekstensiValid)) return false;

        // Lolos Pengecekan ( File = Gambar ) & File Siap Diupload
        $namaGambar = explode('.', $request->file('image')->getClientOriginalName());
        $namaGambar = $namaGambar[0] . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('public/assets/lowongan-kerja', $namaGambar);

        // Insert data Lowongan dan mengembalikan nilai True
        Lowongan::create([
            'perusahaan_id' => $request->perusahaan_id,
            'nama_perusahaan' => $request->nama_perusahaan,
            'gambaran_perusahaan' => $request->gambaran_perusahaan,
            'jabatan' => $request->jabatan,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
            'keahlian' => $request->keahlian,
            'gaji_min' => $request->gaji_min,
            'gaji_max' => $request->gaji_max,
            'persyaratan' => $request->persyaratan,
            'deskripsi' => $request->deskripsi,
            'batas_akhir_lamaran' => $request->batas_akhir_lamaran,
            'proses_lamaran' => $request->proses_lamaran,
            'status' => $request->status,
            'image' => $namaGambar,
            'jumlah_pelamar' => $request->jumlah_pelamar,
        ]);
        return true;
    }
}
