<?php

namespace App\Http\Controllers\Siswa\Profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


use App\Models\Siswa;
use App\Models\Negara;
use App\User;

class ProfilSayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'nav' => 'profil-saya',
            'siswa' => Siswa::find(Auth::user()->siswa->id)
        ];

        return view('siswa.profil.profil-saya.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = [
            'nav' => 'profil-saya',
            'siswa' => Siswa::find(Auth::user()->siswa->id),
            'negara' => Negara::orderBy('nama_negara', 'ASC')->pluck('nama_negara'),

        ];

        return view('siswa.profil.profil-saya.edit', $data);
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
        // Validasi Form Input
        $validator = Validator::make($request->all(), [
            'nama_pertama'          => 'required|max:64',
            'nama_belakang'         => 'max:64',
            'tempat_lahir'          => 'max:32',
            'tanggal_lahir'         => 'date|nullable',
            'email'                 => 'max:128',
            'hp'                    => 'max:16',
            'facebook'              => 'max:64',
            'twitter'               => 'max:64',
            'instagram'             => 'max:64',
            'linkedin'              => 'max:64',
            'alamat'                => 'max:255',
            'kodepos'               => 'max:8',
            'kabupaten'             => 'max:32',
            'provinsi'              => 'max:32',
            'negara'                => 'max:32',
            'jenis_kelamin'         => "in:Laki-laki,Perempuan",
            'kartu_identitas'       => "in:KTP,SIM,NPWP,KARTU PELAJAR",
            'kartu_identitas_nomor' => 'max:16',
            'pengalaman_level'      => 'max:128',
            'pengalaman_level_teks' => 'max:128',
        ], [
            'nama_pertama.required'     => 'nama pertama harus diisi',
            'nama_pertama.max'          => 'nama pertama maksimal 64 karakter',
            'nama_belakang.max'         => 'nama belakang maksimal 64 karakter',
            'tempat_lahir.max'          => 'tempat lahir maksimal 32 karakter',
            'email.max'                 => 'email maksimal 128 karakter',
            'hp.max'                    => 'hp maksimal 16 karakter',
            'tanggal_lahir.date'        => 'tanggal lahir harus valid',
            'facebook.max'              => 'facebook maksimal 64 karakter',
            'twitter.max'               => 'twitter maksimal 64 karakter',
            'instagram.max'             => 'instagram maksimal 64 karakter',
            'linkedin.max'              => 'linkedin maksimal 64 karakter',
            'alamat.max'                => 'alamat maksimal 255 karakter', 
            'kodepos.max'               => 'kodepos maksimal 8 karakter', 
            'kabupaten.max'             => 'kabupaten maksimal 32 karakter', 
            'provinsi.max'              => 'provinsi maksimal 32 karakter', 
            'negara.max'                => 'negara maksimal 32 karakter', 
            'jenis_kelamin.in'          => 'jenis kelamin harus diantara Laki-laki dan Perempuan',
            'kartu_identitas.in'        => 'kartu identitas harus diantara KTP, SIM, NPWP, dan KARTU PELAJAR',
            'kartu_identitas_nomor.max' => 'kartu_identitas_nomor maksimal 16 karakter',
            'pengalaman_level.max'      => 'pengalaman_level maksimal 128 karakter',
            'pengalaman_level_teks.max' => 'pengalaman_level_teks maksimal 128 karakter',
        ]);

        // Jika Validasi Gagal Maka akan dikembalikan ke halaman sebelumnya, ( Update data Siswa Gagal )
        if ( $validator->fails() ) {
            return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
        // Lolos Validasi
        }else {

            // Pengecekan apakah file yang diupload adl gambar, jika bukan Maka akan dikembalikan ke halaman sebelumnya, ( Update data Siswa Gagal )
            if( $this->updateSiswa($request, $id) != true ) return redirect()->back()->with('gagal', 'File yang kamu upload bukan gambar')->withInput();
            
            // Lolos Pengecekan, Update Data Siswa Berhasil
            return redirect('/siswa/profil/profil-saya')->with('success', "Data siswa $request->nama_pertama telah diubah");
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
        //
    }


    public function updateSiswa($request, $id)
    {   
        // Mengambil Data
        $data = Siswa::find(decrypt($id));

        // Pengecekan jika tidak ada file yang diupload
        if (is_null($request->file('photo'))) {

            // Update data siswa dan mengembalikan nilai True
            $data->update([
                'nama_pertama'          => $request->nama_pertama,
                'nama_belakang'         => $request->nama_belakang,
                'tempat_lahir'          => $request->tempat_lahir,
                'tanggal_lahir'         => $request->tanggal_lahir,
                'jenis_kelamin'         => $request->jenis_kelamin,
                'email'                 => $request->email,
                'hp'                    => $request->hp,
                'facebook'              => $request->facebook,
                'twitter'               => $request->twitter,
                'instagram'             => $request->instagram,
                'linkedin'              => $request->linkedin,
                'alamat'                => $request->alamat,
                'kodepos'               => $request->kodepos,
                'kabupaten'             => $request->kabupaten,
                'provinsi'              => $request->provinsi,
                'negara'                => $request->negara,
                'kartu_identitas'       => $request->kartu_identitas,
                'kartu_identitas_nomor' => $request->kartu_identitas_nomor,
                'pengalaman_level'      => $request->pengalaman_level,
                'pengalaman_level_teks' => $request->pengalaman_level_teks,
            ]);

            $user = User::find(Auth::user()->id);

            $user->update([
                'name' => $request['nama_pertama'] . ' ' . $request['nama_belakang'],
            ]);

            return true;
        } else {

            // Pengecekan file yang diupload apakah gambar / bukan
            $ekstensiValid = ['jpeg', 'png', 'bmp', 'gif', 'svg','webp', 'jpg'];
            if (!in_array($request->file('photo')->getClientOriginalExtension(), $ekstensiValid)) return false;

            // Lolos Pengecekan lalu Mengecek apakah photo lama terdapat di dalam storage
            $exists = Storage::disk('local')->exists('/public/assets/daftar-siswa/' . $data->photo);
        
            // Jika photo lama terdapat di dalam storage (True), maka hapus photo tsb
            if($exists) Storage::disk('local')->delete('/public/assets/daftar-siswa/' . $data->photo);

            //  Photo Baru Siap Diupload
            $namaGambar = explode('.', $request->file('photo')->getClientOriginalName());
            $namaGambar = $namaGambar[0] . '-' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('public/assets/daftar-siswa', $namaGambar);

            // Update data siswa dan mengembalikan nilai True
            $data->update([
                'nama_pertama'          => $request->nama_pertama,
                'nama_belakang'         => $request->nama_belakang,
                'photo'                 => $namaGambar,
                'tempat_lahir'          => $request->tempat_lahir,
                'tanggal_lahir'         => $request->tanggal_lahir,
                'jenis_kelamin'         => $request->jenis_kelamin,
                'email'                 => $request->email,
                'hp'                    => $request->hp,
                'facebook'              => $request->facebook,
                'twitter'               => $request->twitter,
                'instagram'             => $request->instagram,
                'linkedin'              => $request->linkedin,
                'alamat'                => $request->alamat,
                'kodepos'               => $request->kodepos,
                'kabupaten'             => $request->kabupaten,
                'provinsi'              => $request->provinsi,
                'negara'                => $request->negara,
                'kartu_identitas'       => $request->kartu_identitas,
                'kartu_identitas_nomor' => $request->kartu_identitas_nomor,
                'pengalaman_level'      => $request->pengalaman_level,
                'pengalaman_level_teks' => $request->pengalaman_level_teks,
            ]);

            $user = User::find(Auth::user()->id);

            $user->update([
                'name' => $request['nama_pertama'] . ' ' . $request['nama_belakang'],
            ]);

            return true;
        }
    }
}
