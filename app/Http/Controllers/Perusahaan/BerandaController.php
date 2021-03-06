<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

use Artesaos\SEOTools\Facades\SEOTools;

use App\Models\ProgramKeahlian;
use App\Models\BidangKeahlian;
use App\Models\Perusahaan;
use App\Models\Pelamaran;
use App\Models\Lowongan;
use App\Models\Negara;
use App\Models\Bahasa;
use App\User;

class BerandaController extends Controller
{
    /**
     * Return a SEO Script.
     *
     */
    public function getSeo($title)
    {
        // SEO Script
        SEOTools::setTitle($title . ' | SMK Bisa Kerja - SMK Negeri 1 Bojongsari', false);
        SEOTools::setDescription('Portal lowongan kerja yang disediakan untuk para pencari pekerjaan bagi lulusan SMK/SMA sederajat');
        SEOTools::setCanonical(URL::current());
        SEOTools::metatags()
            ->setKeywords('Lowongan Kerja, Lulusan SMA/SMK, SMK Negeri 1 Bojongsari, Purbalingga, Bursa Kerja, Portal Lowongan Kerja');
        SEOTools::opengraph()
            ->setUrl(URL::current())
            ->addProperty('type', 'homepage');
        SEOTools::twitter()->setSite('@smkbisakerja');
        SEOTools::jsonLd()->addImage(asset('img/logo.png'));
    }

     /**
     * Return a Perusahaan resource.
     *
     */
	public function getPerusahaan()
	{
        // Mengambil Perusahaan
		return ( User::find(Auth::user()->id)->perusahaan === null ) ? false : User::find(Auth::user()->id)->perusahaan;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil SEO
        $this->getSeo('Beranda Perusahaan');

        // Deklarasi Variabel
        $panggilanTes = [];
        $lastPelamar = [];
        $panggilanTes = [];
        $lastLowongan = [];
        $jmlLamaran = 0;
        $jmlLowongan = 0;
        $idPerusahaan = ($this->getPerusahaan()) ? $this->getPerusahaan()->id : false;
        $lowongan = Lowongan::where('perusahaan_id', $idPerusahaan)->get(['id', 'jumlah_pelamar', 'jabatan', 'gaji_min', 'gaji_max', 'batas_akhir_lamaran', 'status', 'perusahaan_id', 'proses_lamaran', 'created_at']);
        $pelamaran = Pelamaran::orderBy('created_at', 'DESC')->get(['id', 'lowongan_id', 'siswa_id']);

        // Pengambilan data, untuk menghitung jml panggilan tes, pada lowongan
        foreach($lowongan as $loker) {
            if($loker->perusahaan_id == $idPerusahaan) {
                if( !is_null($loker->pelamaran) ) {
                    if($loker->pelamaran->statusPelamaran->status == 'dipanggil') {
                        $panggilanTes[] = $loker->pelamaran->statusPelamaran;
                    }
                }
            }
        }

        // Pengambilan data Pelamar Akhir AKhir ini ( Last Pelamar )
        foreach($pelamaran as $pelamar) {
            if($pelamar->lowongan->perusahaan->id == $idPerusahaan){
                $lastPelamar[] = $pelamar;
            }
        }

        // Membatasi data Last Pelamar hanya 5
        $lastPelamar = array_slice($lastPelamar, 0, 5);

        // Mengambil data Jml Lamaran & Lowongan terakhir dibuat
        if( $idPerusahaan) {
            $jmlLamaran = $lowongan->sum('jumlah_pelamar');
            $lastLowongan = $lowongan->last();
        }

        // Mengambil data Jml Lowongan
        $jmlLowongan = ($idPerusahaan) ? $lowongan->count() : $jmlLowongan;

        // Data Yang Akan Ditampilkan ke user
    	$data = [
            'jmlLowongan'   => $jmlLowongan,
            'jmlLamaran'    => $jmlLamaran,
            'panggilanTes'  => count($panggilanTes),
            'lastLowongan'  => $lastLowongan,
            'lastPelamar'   => $lastPelamar,
            'nav'           => 'beranda',
    		'user'          => Auth::user(),
            'perusahaan'    => $this->getPerusahaan()
    	];

    	return view('perusahaan.beranda.index', $data);
    }

    /**
     * Show the form for verification perusahaan.
     *
     */
    public function showVerifikasiForm()
    {
        // Mengambil SEO
        $this->getSeo('Verifikasi Perusahaan');

        // Data Yang Akan Ditampilkan ke user
    	$data = [
            'nav'               => 'beranda',
            'bidangKeahlian' 	=> BidangKeahlian::orderBy('nama', 'ASC')->get(['id', 'nama']),
    		'programKeahlian' 	=> ProgramKeahlian::orderBy('nama', 'ASC')->get(['id', 'nama', 'bidang_keahlian_id']),
    		'negara' 			=> Negara::orderBy('nama_negara', 'ASC')->get(['nama_negara']),
    		'bahasa'            => Bahasa::orderBy('nama', 'ASC')->get(['nama']),
            'user'              => Auth::user(),
    	];

    	return view('perusahaan.beranda.verifikasi', $data);
    }

    /**
     * Validate data verification perusahaan.
     *
     */
    public function verifikasi(Request $request)
    {
        // Pengecekan apakah bidang keahlian || program keahlian tidak terdapat di database
        if( BidangKeahlian::find($request->bidang_keahlian_id) == null || ProgramKeahlian::find($request->program_keahlian_id) == null ) {
            return redirect()->back()->with('gagal', 'bidang keahlian / program keahlian tidak cocok');
        }

        // Validasi Form Input
        $validator = Validator::make($request->all(), [
            'bidang_keahlian_id'        => 'required',
            'program_keahlian_id'       => 'required',
            'nama'                      => 'required|max:128',
            'kategori'                  => "in:Negeri,Swasta,BUMN|required",
            'telp'                      => 'max:16',
            'email'                     => 'max:128',
            'fax'                       => 'max:32',
            'site'                      => 'max:32',
            'facebook'                  => 'max:64',
            'twitter'                   => 'max:64',
            'instagram'                 => 'max:64',
            'linkedin'                  => 'max:64',
            'alamat'                    => 'max:128',
            'kodepos'                   => 'max:8',
            'kabupaten'                 => 'max:64',
            'provinsi'                  => 'max:32',
            'negara'                    => 'max:32',
            'jumlah_karyawan'           => 'max:16',
            'waktu_proses_perekrutan'   => 'max:32',
            'gaya_berpakaian'           => 'max:128',
            'bahasa'                    => 'max:128',
            'waktu_bekerja'             => 'max:64',
        ], [
            'bidang_keahlian_id.required' => 'bidang keahlian harus diisi',
            'program_keahlian_id.required'=> 'program keahlian harus diisi',
            'nama.required'               => 'nama harus diisi',
            'nama.max'                    => 'nama maksimal 128 karakter',
            'kategori.in'                 => "kategori harus diantara Negeri, Swasta, BUMN",
            'email.max'                   => 'email maksimal 128 karakter',
            'telp.max'                    => 'telp maksimal 16 karakter',
            'facebook.max'                => 'facebook maksimal 64 karakter',
            'site.max'                    => 'site maksimal 32 karakter',
            'fax.max'                     => 'fax maksimal 32 karakter',
            'twitter.max'                 => 'twitter maksimal 64 karakter',
            'instagram.max'               => 'instagram maksimal 64 karakter',
            'linkedin.max'                => 'linkedin maksimal 64 karakter',
            'jumlah_karyawan.max'         => 'jumlah karyawan maksimal 16 karakter',
            'alamat.max'                  => 'alamat maksimal 128 karakter',
            'kodepos.max'                 =>  'kodepos maksimal 8 karakter',
            'kabupaten.max'               =>  'kabupaten maksimal 64 karakter',
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
            if( $this->verifikasiPerusahaan($request) != true ) return redirect()->back()->with('gagal', 'Logo atau Image yang kamu upload bukan gambar')->withInput();

            // Lolos Pengecekan, Insert Data Perusahaan Berhasil
            $user = User::find(Auth::user()->id);
            $user->revokePermissionTo('melakukan verifikasi');
            $user->givePermissionTo('menunggu verifikasi diterima');
            return redirect('/perusahaan')->with('success', ', telah melakukan proses verifikasi, harap menunggu sampai verifikasi diterima.');
        }
    }

    /**
     * Store data verification perusahaan.
     *
     */
    public function verifikasiPerusahaan($request)
    {
        // Pengecekan jika tidak ada gambar yang diupload, baik logo ataupun image
        if (is_null($request->file('image')) && is_null($request->file('logo'))) {
            // Insert data Perusahaan dan mengembalikan nilai True
            Perusahaan::create([
                'user_id'                   => Auth::user()->id,
                'bidang_keahlian_id'        => $request->bidang_keahlian_id,
                'program_keahlian_id'       => $request->program_keahlian_id,
                'nama'                      => $request->nama,
                'kategori'                  => $request->kategori,
                'telp'                      => $request->telp,
                'email'                     => $request->email,
                'fax'                       => $request->fax,
                'site'                      => $request->site,
                'facebook'                  => $request->facebook,
                'twitter'                   => $request->twitter,
                'instagram'                 => $request->instagram,
                'linkedin'                  => $request->linkedin,
                'alamat'                    => $request->alamat,
                'kabupaten'                 => $request->kabupaten,
                'provinsi'                  => $request->provinsi,
                'negara'                    => $request->negara,
                'kodepos'                   => $request->kodepos,
                'jumlah_karyawan'           => $request->jumlah_karyawan,
                'waktu_proses_perekrutan'   => $request->waktu_proses_perekrutan,
                'gaya_berpakaian'           => $request->gaya_berpakaian,
                'bahasa'                    => $request->bahasa,
                'waktu_bekerja'             => $request->waktu_bekerja,
                'tunjangan'                 => $request->tunjangan,
                'overview'                  => $request->overview,
                'alasan_harus_melamar'      => $request->alasan_harus_melamar,
            ]);

            User::find(Auth::user()->id)->update([
            	'name' => $request->nama,
            	'email' => $request->email
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
                'user_id'                   => Auth::user()->id,
                'bidang_keahlian_id'        => $request->bidang_keahlian_id,
                'program_keahlian_id'       => $request->program_keahlian_id,
                'nama'                      => $request->nama,
                'kategori'                  => $request->kategori,
                'logo'                      => $namaLogo,
                'image'                     => $namaImage,
                'telp'                      => $request->telp,
                'email'                     => $request->email,
                'fax'                       => $request->fax,
                'site'                      => $request->site,
                'facebook'                  => $request->facebook,
                'twitter'                   => $request->twitter,
                'instagram'                 => $request->instagram,
                'linkedin'                  => $request->linkedin,
                'alamat'                    => $request->alamat,
                'kabupaten'                 => $request->kabupaten,
                'provinsi'                  => $request->provinsi,
                'negara'                    => $request->negara,
                'kodepos'                   => $request->kodepos,
                'jumlah_karyawan'           => $request->jumlah_karyawan,
                'waktu_proses_perekrutan'   => $request->waktu_proses_perekrutan,
                'gaya_berpakaian'           => $request->gaya_berpakaian,
                'bahasa'                    => $request->bahasa,
                'waktu_bekerja'             => $request->waktu_bekerja,
                'tunjangan'                 => $request->tunjangan,
                'overview'                  => $request->overview,
                'alasan_harus_melamar'      => $request->alasan_harus_melamar,
            ]);

            User::find(Auth::user()->id)->update([
            	'name' => $request->nama,
            	'email' => $request->email
            ]);
            return true;
        }
    }

    /**
     * Method for logout perusahaan.
     *
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/perusahaan/login');
    }
}
