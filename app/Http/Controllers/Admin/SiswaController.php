<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Siswa;
use App\User;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'items' => Siswa::orderBy('nama_pertama', 'ASC')->get(),
            'title' => 'Daftar Siswa',
            'nav'   => 'siswa',
        );

        return view('admin.pages.daftar-siswa.index', $data);
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
            'title' => 'Siswa',
            'nav'   => 'siswa',
        );

        return view('admin.pages.daftar-siswa.create', $data);
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

        // Validasi Form Input
        $validator = Validator::make($request->all(), [
            'nama_pertama' => 'required|max:64',
            'nama_belakang' => 'max:64',
            'tempat_lahir' => 'max:32',
            'tanggal_lahir' => 'date|nullable',
            'email' => 'max:128',
            'hp'      => 'max:16',
            'facebook' => 'max:64',
            'twitter' => 'max:64',
            'instagram' => 'max:64',
            'linkedin' => 'max:64',
            'alamat' => 'max:255',
            'kodepos' => 'max:8',
            'kabupaten' => 'max:32',
            'provinsi' => 'max:32',
            'negara' => 'max:64',
            'jenis_kelamin' => "in:Laki-laki,Perempuan",
            'kartu_identitas' => "in:KTP,SIM,NPWP,KARTU PELAJAR|nullable",
            'kartu_identitas_nomor' => 'max:16',
            'pengalaman_level' => 'max:128',
            'pengalaman_level_teks' => 'max:128',
        ], [
            'nama_pertama.required' => 'nama pertama harus diisi',
            'nama_pertama.max'      => 'nama pertama maksimal 64 karakter',
            'nama_belakang.max'     => 'nama belakang maksimal 64 karakter',
            'tempat_lahir.max'      => 'tempat lahir maksimal 32 karakter',
            'email.max'             => 'email maksimal 128 karakter',
            'hp.max'                => 'hp maksimal 16 karakter',
            'facebook.max'          => 'facebook maksimal 64 karakter',
            'twitter.max'           => 'twitter maksimal 64 karakter',
            'instagram.max'         => 'instagram maksimal 64 karakter',
            'linkedin.max'          => 'linkedin maksimal 64 karakter',
            'tanggal_lahir.date'    => 'tanggal lahir harus valid',
            'alamat.max'            => 'alamat maksimal 255 karakter', 
            'kodepos.max'           =>  'kodepos maksimal 8 karakter', 
            'kabupaten.max'         =>  'kabupaten maksimal 32 karakter', 
            'provinsi.max'          =>  'provinsi maksimal 32 karakter', 
            'negara.max'            =>  'negara maksimal 64 karakter', 
            'jenis_kelamin.in'      =>  'jenis kelamin harus diantara Laki-laki dan Perempuan',
            'kartu_identitas.in'    =>  'kartu_identitas harus diantara KTP, SIM, NPWP, dan KARTU PELAJAR',
            'kartu_identitas_nomor.max' => 'kartu_identitas_nomor maksimal 16 karakter',
            'pengalaman_level.max'      => 'pengalaman_level maksimal 128 karakter',
            'pengalaman_level_teks.max' => 'pengalaman_level_teks maksimal 128 karakter',
        ]);

        // Jika Validasi Gagal Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Siswa Gagal )
        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        // Lolos Validasi
        }else {
            // Pengecekan apakah file yang diupload adl gambar, jika bukan Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Siswa Gagal )
            if( $this->storeSiswa($request) != true ) return redirect()->back()->with('gagal', 'File yang kamu upload bukan gambar')->withInput();
            // Lolos Pengecekan, Insert Data Siswa Berhasil
            return redirect('/app-admin/daftar-siswa')->with('success', "Siswa $request->nama_pertama telah ditambahkan");
        }
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
            'title' => 'Siswa',
            'nav'   => 'siswa',
            'item'  => Siswa::find(decrypt($id)),
        );

        return view('admin.pages.daftar-siswa.edit', $data);
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
            'nama_pertama' => 'required|max:64',
            'nama_belakang' => 'max:64',
            'tempat_lahir' => 'max:32',
            'tanggal_lahir' => 'date|nullable',
            'email' => 'max:128',
            'hp'      => 'max:16',
            'facebook' => 'max:64',
            'twitter' => 'max:64',
            'instagram' => 'max:64',
            'linkedin' => 'max:64',
            'alamat' => 'max:255',
            'kodepos' => 'max:8',
            'kabupaten' => 'max:32',
            'provinsi' => 'max:32',
            'negara' => 'max:64',
            'jenis_kelamin' => "in:Laki-laki,Perempuan",
            'kartu_identitas' => "in:KTP,SIM,NPWP,KARTU PELAJAR|nullable",
            'kartu_identitas_nomor' => 'max:16',
            'pengalaman_level' => 'max:128',
            'pengalaman_level_teks' => 'max:128',
        ], [
            'nama_pertama.required' => 'nama pertama harus diisi',
            'nama_pertama.max'      => 'nama pertama maksimal 64 karakter',
            'nama_belakang.max'     => 'nama belakang maksimal 64 karakter',
            'tempat_lahir.max'      => 'tempat lahir maksimal 32 karakter',
            'email.max'             => 'email maksimal 128 karakter',
            'hp.max'                => 'hp maksimal 16 karakter',
            'tanggal_lahir.date'    => 'tanggal lahir harus valid',
            'facebook.max'          => 'facebook maksimal 64 karakter',
            'twitter.max'           => 'twitter maksimal 64 karakter',
            'instagram.max'         => 'instagram maksimal 64 karakter',
            'linkedin.max'          => 'linkedin maksimal 64 karakter',
            'alamat.max'            => 'alamat maksimal 255 karakter', 
            'kodepos.max'           =>  'kodepos maksimal 8 karakter', 
            'kabupaten.max'         =>  'kabupaten maksimal 32 karakter', 
            'provinsi.max'          =>  'provinsi maksimal 32 karakter', 
            'negara.max'            =>  'negara maksimal 64 karakter', 
            'jenis_kelamin.in'      =>  'jenis kelamin harus diantara Laki-laki dan Perempuan',
            'kartu_identitas.in'    =>  'kartu_identitas harus diantara KTP, SIM, NPWP, dan KARTU PELAJAR',
            'kartu_identitas_nomor.max' => 'kartu_identitas_nomor maksimal 16 karakter',
            'pengalaman_level.max'      => 'pengalaman_level maksimal 128 karakter',
            'pengalaman_level_teks.max' => 'pengalaman_level_teks maksimal 128 karakter',
        ]);

        // Jika Validasi Gagal Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Siswa Gagal )
        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        // Lolos Validasi
        }else {
            // Pengecekan apakah file yang diupload adl gambar, jika bukan Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Siswa Gagal )
            if( $this->updateSiswa($request, $id) != true ) return redirect()->back()->with('gagal', 'File yang kamu upload bukan gambar')->withInput();
            // Lolos Pengecekan, Insert Data Siswa Berhasil
            return redirect('/app-admin/daftar-siswa')->with('success', "Data siswa $request->nama_pertama telah diubah");
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
        // Mengambil data siswa dimana id = $id
        $data = Siswa::find(decrypt($id));

        // Mengecek apakah photo terdapat di dalam storage
        $exists = Storage::disk('local')->exists('/public/assets/daftar-siswa/' . $data->photo);
        
        // Jika photo terdapat di dalam storage (True), maka hapus photo tsb
        if($exists) Storage::disk('local')->delete('/public/assets/daftar-siswa/' . $data->photo);
        
        // Menghapus row siswa dimana id = $id
        Siswa::destroy(decrypt($id));
        return back()->with('success', "Data Siswa $data->nama_pertama telah dihapus");
    }

    public function storeSiswa($request)
    {   
        // Pengecekan jika tidak ada file yang diupload
        if (is_null($request->file('photo'))) {
            // Insert data siswa dan mengembalikan nilai True
            Siswa::create($request->all());
            return true;
        } else {
            // Pengecekan file yang diupload apakah gambar / bukan
            $ekstensiValid = ['jpeg', 'png', 'bmp', 'gif', 'svg','webp', 'jpg'];
            if (!in_array($request->file('photo')->getClientOriginalExtension(), $ekstensiValid)) return false;

            // Lolos Pengecekan ( File = Gambar ) & File Siap Diupload
            $namaGambar = explode('.', $request->file('photo')->getClientOriginalName());
            $namaGambar = $namaGambar[0] . '-' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('public/assets/daftar-siswa', $namaGambar);

            // Insert data siswa dan mengembalikan nilai True
            Siswa::create([
                'user_id' => $request->user_id,
                'nama_pertama' => $request->nama_pertama,
                'nama_belakang' => $request->nama_belakang,
                'photo' => $namaGambar,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'hp' => $request->hp,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin,
                'alamat' => $request->alamat,
                'kodepos' => $request->kodepos,
                'kabupaten' => $request->kabupaten,
                'provinsi' => $request->provinsi,
                'negara' => $request->negara,
                'kartu_identitas' => $request->kartu_identitas,
                'kartu_identitas_nomor' => $request->kartu_identitas_nomor,
                'pengalaman_level' => $request->pengalaman_level,
                'pengalaman_level_teks' => $request->pengalaman_level_teks,
            ]);
            return true;
        }
    }

    public function updateSiswa($request, $id)
    {   
        $data = Siswa::find(decrypt($id));

        // Pengecekan jika tidak ada file yang diupload
        if (is_null($request->file('photo'))) {
            // Update data siswa dan mengembalikan nilai True
            $data->update([
                'nama_pertama' => $request->nama_pertama,
                'nama_belakang' => $request->nama_belakang,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'hp' => $request->hp,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin,
                'alamat' => $request->alamat,
                'kodepos' => $request->kodepos,
                'kabupaten' => $request->kabupaten,
                'provinsi' => $request->provinsi,
                'negara' => $request->negara,
                'kartu_identitas' => $request->kartu_identitas,
                'kartu_identitas_nomor' => $request->kartu_identitas_nomor,
                'pengalaman_level' => $request->pengalaman_level,
                'pengalaman_level_teks' => $request->pengalaman_level_teks,
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

            // Insert data siswa dan mengembalikan nilai True
            $data->update([
                'nama_pertama' => $request->nama_pertama,
                'nama_belakang' => $request->nama_belakang,
                'photo' => $namaGambar,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'hp' => $request->hp,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin,
                'alamat' => $request->alamat,
                'kodepos' => $request->kodepos,
                'kabupaten' => $request->kabupaten,
                'provinsi' => $request->provinsi,
                'negara' => $request->negara,
                'kartu_identitas' => $request->kartu_identitas,
                'kartu_identitas_nomor' => $request->kartu_identitas_nomor,
                'pengalaman_level' => $request->pengalaman_level,
                'pengalaman_level_teks' => $request->pengalaman_level_teks,
            ]);
            return true;
        }
    }
}
