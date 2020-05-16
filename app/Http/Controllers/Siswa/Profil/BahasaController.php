<?php

namespace App\Http\Controllers\Siswa\Profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Bahasa;
use App\Models\SiswaBahasa;

class BahasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        for($i=1; $i<=10; $i++) {
            $lisan[] = $i;
        }
        $sertifikat = ['TOEFL', 'IELTS', 'TOEIC'];

        $data = [
            'nav' => 'bahasa',
            'bahasa' => Bahasa::orderBy('nama', 'ASC')->get(),
            'lisan' => $lisan,
            'sertifikat' => $sertifikat,
            'siswaBahasa' => SiswaBahasa::where('siswa_id', Auth::user()->siswa->id)->get(),
        ];

        return view('siswa.profil.bahasa.index', $data);
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
        $jmlArr = count($request->bahasa_id);

        for($i=0; $i < $jmlArr; $i++) {

            SiswaBahasa::create([
                'siswa_id' => Auth::user()->siswa->id,
                'bahasa_id' => $request->bahasa_id[$i],
                'lisan' => $request->lisan[$i],
                'tulisan' => $request->tulisan[$i],
                'utama' => $request->utama[$i],
                'sertifikat' => $request->sertifikat[$i],
                'skor' => $request->skor[$i]
            ]);
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
        for($i=1; $i<=10; $i++) {
            $lisan[] = $i;
        }
        $sertifikat = ['TOEFL', 'IELTS', 'TOEIC'];

        $data = [
            'nav' => 'bahasa',
            'bahasa' => Bahasa::orderBy('nama', 'ASC')->get(),
            'lisan' => $lisan,
            'sertifikat' => $sertifikat,
            'siswaBahasa' => SiswaBahasa::where('siswa_id', Auth::user()->siswa->id)->get()
        ];

        return view('siswa.profil.bahasa.edit', $data);
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
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sql = SiswaBahasa::destroy(decrypt($id));

        return back();
    }
}
