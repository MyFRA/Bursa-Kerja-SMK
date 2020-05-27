<?php

namespace App\Http\Controllers\Perusahaan;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

use App\Models\KompetensiKeahlian;
use App\Models\Keterampilan;
use App\Models\Lowongan;
use App\User;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SEOTools::setTitle('SMK Bisa Kerja | SMK Negeri 1 Bojongsari', false);
        SEOTools::setDescription('Portal lowongan kerja yang disediakan untuk para pencari pekerjaan bagi lulusan SMK/SMA sederajat');
        SEOTools::setCanonical(URL::current());
        SEOTools::metatags()
            ->setKeywords('Lowongan Kerja, Lulusan SMA/SMK, SMK Negeri 1 Bojongsari, Purbalingga, Bursa Kerja, Portal Lowongan Kerja');
        SEOTools::opengraph()
            ->setUrl(URL::current())
            ->addProperty('type', 'homepage');
        SEOTools::twitter()->setSite('@smkbisakerja');
        SEOTools::jsonLd()->addImage(asset('img/logo.png'));

        $data = [
            'nav' => 'lowongan',
            'user' => Auth::user(),
            'lowongan'  => Lowongan::where('perusahaan_id', Auth::user()->perusahaan->id)->orderBy('created_at', 'DESC')->paginate(3),
            'jmlLowongan' => Lowongan::where('perusahaan_id', Auth::user()->perusahaan->id)->count()
        ];

        return view('perusahaan.lowongan.index', $data);
    }

    public function status(Request $request)
    {
        // Validasi Form Input
        $validator = Validator::make($request->all(), [
            'status'               => 'in:Draf,Aktif,Nonaktif|required',
        ], [
            'status.in'                     => "status harus diantara Draf, Aktif dan Nonaktif",
            'status.required'               => "status tidak boleh kosong",
        ]);

        // Jika Validasi Gagal Maka akan dikembalikan ke halaman sebelumnya, ( Insert data Lowongan Gagal )
        if ( $validator->fails() ) {
            return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
        // Lolos Validasi
        }else {
            SEOTools::setTitle('SMK Bisa Kerja | SMK Negeri 1 Bojongsari', false);
            SEOTools::setDescription('Portal lowongan kerja yang disediakan untuk para pencari pekerjaan bagi lulusan SMK/SMA sederajat');
            SEOTools::setCanonical(URL::current());
            SEOTools::metatags()
                ->setKeywords('Lowongan Kerja, Lulusan SMA/SMK, SMK Negeri 1 Bojongsari, Purbalingga, Bursa Kerja, Portal Lowongan Kerja');
            SEOTools::opengraph()
                ->setUrl(URL::current())
                ->addProperty('type', 'homepage');
            SEOTools::twitter()->setSite('@smkbisakerja');
            SEOTools::jsonLd()->addImage(asset('img/logo.png'));
    
            $data = [
                'nav' => 'lowongan',
                'user' => Auth::user(),
                'lowongan'  => Lowongan::where('perusahaan_id', Auth::user()->perusahaan->id)
                                        ->where('status', $request->status)->orderBy('created_at', 'DESC')->paginate(3),
            ];
    
            return view('perusahaan.lowongan.index', $data);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        SEOTools::setTitle('SMK Bisa Kerja | SMK Negeri 1 Bojongsari', false);
        SEOTools::setDescription('Portal lowongan kerja yang disediakan untuk para pencari pekerjaan bagi lulusan SMK/SMA sederajat');
        SEOTools::setCanonical(URL::current());
        SEOTools::metatags()
            ->setKeywords('Lowongan Kerja, Lulusan SMA/SMK, SMK Negeri 1 Bojongsari, Purbalingga, Bursa Kerja, Portal Lowongan Kerja');
        SEOTools::opengraph()
            ->setUrl(URL::current())
            ->addProperty('type', 'homepage');
        SEOTools::twitter()->setSite('@smkbisakerja');
        SEOTools::jsonLd()->addImage(asset('img/logo.png'));

        $data = [
            'nav'                   => 'lowongan',
            'user'                  => Auth::user(),
            'kompetensi_keahlian'   => KompetensiKeahlian::pluck('nama'),
            'keterampilan'          => Keterampilan::pluck('nama'),
        ];

        return view('perusahaan.lowongan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi Form Input
        $validator = Validator::make($request->all(), [
            'jabatan'              => 'max:128|required',
            'kompetensi_keahlian'  => 'required',
            'keahlian'             => 'required',
            'gaji_min'             => 'required',
            'gaji_max'             => 'required',
            'persyaratan'          => 'required',
            'deskripsi'            => 'required',
            'batas_akhir_lamaran'  => 'date|required',
            'proses_lamaran'       => 'in:Online,Offline|required',
            'status'               => 'in:Draf,Aktif,Nonaktif|required',
        ], [
            'jabatan.max'                   => "jabatan maksimal 128 karakter",
            'jabatan.required'              => "jabatan harus tidak boleh kosong",
            'kompetensi_keahlian.required'  => "kompetensi keahlian tidak boleh kosong",
            'keahlian.required'             => "keahlian tidak boleh kosong",
            'gaji_max.required'             => 'gaji max tidak boleh kosong',
            'gaji_min.required'             => 'gaji min tidak boleh kosong',
            'persyaratan.required'          => "persyaratan tidak boleh kosong",
            'deskripsi.required'            => "deskripsi tidak boleh kosong",
            'batas_akhir_lamaran.date'      => "batas akhir lamaran harus tanggal",
            'batas_akhir_lamaran.required'  => "batas akhir lamaran tidak boleh kosong",
            'proses_lamaran.in'             => "Proses lamaran harus diantara Online dan Offline",
            'proses_lamaran.required'       => "proses lamaran tidak boleh kosong",
            'status.in'                     => "status harus diantara Draf, Aktif dan Nonaktif",
            'status.required'               => "status tidak boleh kosong",
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
            return redirect('/perusahaan/lowongan')->with('success', "Lowongan Pekerjaan " . $request->jabatan . " telah ditambahkan");
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
        SEOTools::setTitle('SMK Bisa Kerja | SMK Negeri 1 Bojongsari', false);
        SEOTools::setDescription('Portal lowongan kerja yang disediakan untuk para pencari pekerjaan bagi lulusan SMK/SMA sederajat');
        SEOTools::setCanonical(URL::current());
        SEOTools::metatags()
            ->setKeywords('Lowongan Kerja, Lulusan SMA/SMK, SMK Negeri 1 Bojongsari, Purbalingga, Bursa Kerja, Portal Lowongan Kerja');
        SEOTools::opengraph()
            ->setUrl(URL::current())
            ->addProperty('type', 'homepage');
        SEOTools::twitter()->setSite('@smkbisakerja');
        SEOTools::jsonLd()->addImage(asset('img/logo.png'));

        $data = [
            'nav'                   => 'lowongan',
            'user'                  => Auth::user(),
            'lowongan'              => Lowongan::find(decrypt($id)),
            'kompetensi_keahlian'   => KompetensiKeahlian::pluck('nama'),
            'keterampilan'          => Keterampilan::pluck('nama'),
        ];

        return view('perusahaan.lowongan.edit', $data);
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
            'jabatan'              => 'max:128|required',
            'kompetensi_keahlian'  => 'required',
            'keahlian'             => 'required',
            'gaji_min'             => 'required',
            'gaji_max'             => 'required',
            'persyaratan'          => 'required',
            'deskripsi'            => 'required',
            'batas_akhir_lamaran'  => 'date|required',
            'proses_lamaran'       => 'in:Online,Offline|required',
            'status'               => 'in:Draf,Aktif,Nonaktif|required',
        ], [
            'jabatan.max'                   => "jabatan maksimal 128 karakter",
            'jabatan.required'              => "jabatan harus tidak boleh kosong",
            'kompetensi_keahlian.required'  => "kompetensi keahlian tidak boleh kosong",
            'keahlian.required'             => "keahlian tidak boleh kosong",
            'gaji_max.required'             => 'gaji max tidak boleh kosong',
            'gaji_min.required'             => 'gaji min tidak boleh kosong',
            'persyaratan.required'          => "persyaratan tidak boleh kosong",
            'deskripsi.required'            => "deskripsi tidak boleh kosong",
            'batas_akhir_lamaran.date'      => "batas akhir lamaran harus tanggal",
            'batas_akhir_lamaran.required'  => "batas akhir lamaran tidak boleh kosong",
            'proses_lamaran.in'             => "Proses lamaran harus diantara Online dan Offline",
            'proses_lamaran.required'       => "proses lamaran tidak boleh kosong",
            'status.in'                     => "status harus diantara Draf, Aktif dan Nonaktif",
            'status.required'               => "status tidak boleh kosong",
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }else {

            $data = Lowongan::find(decrypt($id));

            // Pengubahan Gaji Menjadi Full Angka
            $gaji_min = explode('Rp. ', $request->gaji_min);
            $gaji_min = end($gaji_min);

            $gaji_max = explode('Rp. ', $request->gaji_max);
            $gaji_max = end($gaji_max);

            // Pengecekan Apakah Gambar Diupload
            if (is_null($request->file('image'))) {

                // Update data Lowongan dan mengembalikan nilai True
                $data->update([
                    'jabatan'               => $request->jabatan,
                    'kompetensi_keahlian'   => json_encode($request->kompetensi_keahlian),
                    'keahlian'              => json_encode($request->keahlian),
                    'gaji_min'              => str_replace('.', '', $gaji_min),
                    'gaji_max'              => str_replace('.', '', $gaji_max),
                    'persyaratan'           => $request->persyaratan,
                    'deskripsi'             => $request->deskripsi,
                    'batas_akhir_lamaran'   => $request->batas_akhir_lamaran,
                    'proses_lamaran'        => $request->proses_lamaran,
                    'status'                => $request->status,
                ]);

                return redirect('/perusahaan/lowongan')->with('success', 'Lowongan ' . $request->jabatan . ' telah diupdate');
            } else {

                // Pengecekan file yang diupload apakah gambar / bukan
                $ekstensiValid = ['jpeg', 'png', 'bmp', 'gif', 'svg','webp', 'jpg'];
                if (!in_array($request->file('image')->getClientOriginalExtension(), $ekstensiValid)) return false;

                // Lolos Pengecekan ( File = Gambar ) & File Siap Diupload
                $namaGambar = explode('.', $request->file('image')->getClientOriginalName());
                $namaGambar = $namaGambar[0] . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('public/assets/lowongan-kerja', $namaGambar);
            
                // Mengecek apakah image terdapat di dalam storage
                $existsImage = Storage::disk('local')->exists('/public/assets/lowongan-kerja' . $data->image);

                // Jika image terdapat di dalam storage (True), maka hapus image tsb
                if($existsImage) Storage::disk('local')->delete('/public/assets/lowongan-kerja' . $data->image);

                // Proses Update Data
                $data->update([
                    'jabatan'               => $request->jabatan,
                    'kompetensi_keahlian'   => json_encode($request->kompetensi_keahlian),
                    'keahlian'              => json_encode($request->keahlian),
                    'gaji_min'              => str_replace('.', '', $gaji_min),
                    'gaji_max'              => str_replace('.', '', $gaji_max),
                    'persyaratan'           => $request->persyaratan,
                    'deskripsi'             => $request->deskripsi,
                    'batas_akhir_lamaran'   => $request->batas_akhir_lamaran,
                    'proses_lamaran'        => $request->proses_lamaran,
                    'status'                => $request->status,
                    'image'                 => $namaGambar,
                ]);

                return redirect('/perusahaan/lowongan')->with('success', 'Lowongan telah diupdate');
            }
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
        $data = Lowongan::find(decrypt($id));

        // Mengecek apakah image terdapat di dalam storage
        $existsImage = Storage::disk('local')->exists('/public/assets/lowongan-kerja' . $data->image);

        // Jika image terdapat di dalam storage (True), maka hapus image tsb
        if($existsImage) Storage::disk('local')->delete('/public/assets/lowongan-kerja' . $data->image);

        $ok = Lowongan::destroy(decrypt($id));
        if ($ok) return back()->with('success', 'Lowongan ' . $data->jabatan . ' telah dihapus');
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

        // Pengubahan Gaji Menjadi Full Angka
        $gaji_min = explode('Rp. ', $request->gaji_min);
        $gaji_min = end($gaji_min);

        $gaji_max = explode('Rp. ', $request->gaji_max);
        $gaji_max = end($gaji_max);

        // Insert data Lowongan dan mengembalikan nilai True
        Lowongan::create([
            'perusahaan_id'         => Auth::user()->perusahaan->id,
            'nama_perusahaan'       => Auth::user()->perusahaan->nama,
            'jabatan'               => $request->jabatan,
            'kompetensi_keahlian'   => json_encode($request->kompetensi_keahlian),
            'keahlian'              => json_encode($request->keahlian),
            'gaji_min'              => str_replace('.', '', $gaji_min),
            'gaji_max'              => str_replace('.', '', $gaji_max),
            'persyaratan'           => $request->persyaratan,
            'deskripsi'             => $request->deskripsi,
            'batas_akhir_lamaran'   => $request->batas_akhir_lamaran,
            'proses_lamaran'        => $request->proses_lamaran,
            'status'                => $request->status,
            'image'                 => $namaGambar,
        ]);

        return true;
    }
}
