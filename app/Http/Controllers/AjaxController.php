<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Models\ProgramKeahlian;
use App\Models\Negara;
use App\Models\Provinsi;
use App\Models\Kabupaten;


class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProgramKeahlian($id)
    {
        $program_keahlian = ProgramKeahlian::select('id', 'nama')->where('bidang_keahlian_id', $id)->get();
        return Response::json($program_keahlian);
    }

    public function getProvinsi($nama_negara)
    {
        $negara_id = Negara::where('nama_negara', $nama_negara)->pluck('id');
        $provinsi = Provinsi::select('id', 'nama_provinsi')->where('negara_id', $negara_id)->get();
        return Response::json($provinsi);
    }

    public function getKabupaten($nama_provinsi)
    {
        $provinsi_id = Provinsi::where('nama_provinsi', $nama_provinsi)->pluck('id');
        $kabupaten = Kabupaten::select('id', 'nama_kabupaten')->where('provinsi_id', $provinsi_id)->get();
        return Response::json($kabupaten);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiProvinsi()
    {
        $provinsiJson = file_get_contents(public_path('json/provinsi.json'));
        $provinsi = json_decode($provinsiJson, true);
            foreach ($provinsi['data'] as $prov) {
                var_dump($prov);
            }
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
}
