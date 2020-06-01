<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

use Artesaos\SEOTools\Facades\SEOTools;

use App\Models\Lowongan;
use App\Models\Pelamaran;
use App\Models\Perusahaan;
use App\Models\ProgramKeahlian;
use App\Models\Provinsi;


class JobController extends Controller
{
    /**
     * Return a SEO Script.
     *
     */
    public function getSeo()
    {
        // SEO Script
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
    }

    /**
     * Show the application job list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Mengambil SEO
        $this->getSeo();

        $data = [
            'lowongan' => Lowongan::select('lowongan.*', 'lowongan.id AS id_from_lowongan')
                                    ->where('status', 'aktif')
                                    ->orderBy('created_at', 'DESC')
                                    ->paginate(6),
            'programKeahlian' => ProgramKeahlian::orderBy('nama', 'ASC')->get(),
            'provinsi' => Provinsi::orderBy('nama_provinsi', 'ASC')->get()
        ];

        return view('pages.jobs.index', $data);
    }
    
    /**
     * Show the application job list with condidition from input.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexByConditionCari(Request $request)
    {
        // Mengambil SEO
        $this->getSeo();

        // Pengubahan Gaji Menjadi Full Angka
        $gaji_min = explode('Rp. ', $request->gaji_min);
        $gaji_min = end($gaji_min);
        $gaji_min = str_replace('.', '', $gaji_min);

        $perusahaanProgramKeahlianId = (!is_null($request->program_keahlian_id)) ? 'perusahaan.program_keahlian_id' : 'lowongan.status';
        $programKeahlianId = (!is_null($request->program_keahlian_id)) ? $request->program_keahlian_id : 'aktif';

        $perusahaanProvinsi = (!is_null($request->provinsi)) ? 'perusahaan.provinsi' : 'lowongan.status';
        $provinsi = (!is_null($request->provinsi)) ? $request->provinsi : 'aktif';


        // Pengaturan urut berdasarkan
        $kolom;
        $nilai;

        switch ($request->urutBerdasarkan) {
            case 'terbaru':
                $kolom = 'lowongan.created_at';
                $nilai = 'DESC';
                break;
            case 'gaji_terendah':
                $kolom = 'lowongan.gaji_min';
                $nilai = 'ASC';
                break;
            case 'gaji_tertinggi':
                $kolom = 'lowongan.gaji_max';
                $nilai = 'DESC';
                break;
            default:
                $kolom = 'lowongan.created_at';
                $nilai = 'DESC';
            break;
        }

        // lowongan berdasarkan kondisi
        $lowongan = Lowongan::select('lowongan.*', 'lowongan.id AS id_from_lowongan')
                            ->where('lowongan.status', 'aktif')
                            ->where('lowongan.jabatan', 'like', '%' . $request->judul . '%')
                            ->where('lowongan.gaji_min', '>=', $gaji_min)
                            ->where($perusahaanProvinsi, $provinsi)
                            ->where($perusahaanProgramKeahlianId, $programKeahlianId)
                            ->join('perusahaan', 'lowongan.perusahaan_id', 'perusahaan.id')
                            ->orderBy($kolom, $nilai);

        $data = [
            'lowongan' => $lowongan->paginate(6),
            'programKeahlian' => ProgramKeahlian::orderBy('nama', 'ASC')->get(),
            'provinsi' => Provinsi::orderBy('nama_provinsi', 'ASC')->get(),
            'oldInput' => $request->all(),
        ];

        return view('pages.jobs.index', $data);
    }


    public function indexByUrutBerdasarkan($metode)
    {
        $program_keahlian = ProgramKeahlian::select('id', 'nama')->where('bidang_keahlian_id', $id)->get();
        return Response::json($program_keahlian);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mengambil SEO
        $this->getSeo();

        if(Auth::check()) {
            (Auth::user()->hasRole('siswa')) ?  $siswaId = Auth::user()->siswa->id : $siswaId = false;
        } else {
            $siswaId = false;
        }

        $data = [
            'lowongan' => Lowongan::find(decrypt($id)),
            'melamar' => Pelamaran::where('siswa_id', $siswaId)
                                    ->where('lowongan_id', decrypt($id))->first()
        ];

        return view('pages.jobs.show', $data);
    }
}
