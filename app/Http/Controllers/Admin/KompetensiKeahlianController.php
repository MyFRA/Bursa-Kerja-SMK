<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\KompetensiKeahlian;
use App\Models\ProgramKeahlian;

class KompetensiKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Kompetensi Keahlian',
            'nav' => 'kompetensi-keahlian',
            'items' => KompetensiKeahlian::orderBy('nama', 'ASC')->get()
        );
        return view('admin.pages.kompetensi-keahlian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Kompetensi Keahlian',
            'nav' => 'kompetensi-keahlian',
            'programs' => ProgramKeahlian::orderBy('nama', 'ASC')->get()
        );
        return view('admin.pages.kompetensi-keahlian.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "kode" => "required|max:8|unique:m_kompetensi_keahlian",
            "nama" => "required|min:3",
            "program_keahlian_id" => "required"
        ], [
            "kode.required" => "Kode kompetensi keahlian harus diisi",
            "kode.max" => "Kode kompetensi keahlian max: 8 karakter",
            "kode.unique" => "Kode kompetensi keahlian tidak boleh sama",
            "nama.required" => "Nama kompetensi keahlian harus diisi",
            "nama.min" => "Nama kompetensi keahlian min: 3 karakter",
            "program_keahlian_id.required" => "Program keahlian harus diisi"
        ]);

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput();
        } else {
            $data = KompetensiKeahlian::create($request->all());
            return redirect('/app-admin/kompetensi-keahlian/' . encrypt($data->id) . "/edit")
                ->with('success', true);
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
            'title' => 'Kompetensi Keahlian',
            'nav' => 'kompetensi-keahlian',
            'item' => KompetensiKeahlian::select('m_kompetensi_keahlian.*', "m_program_keahlian.nama as nama_program_keahlian")
                            ->join('m_program_keahlian', 'm_kompetensi_keahlian.program_keahlian_id', '=', 'm_program_keahlian.id')
                            ->where('m_kompetensi_keahlian.id', decrypt($id))
                            ->first(),
            'programs' => ProgramKeahlian::orderBy('nama', 'ASC')->get()
        );
        return view('admin.pages.kompetensi-keahlian.edit', $data);
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
        $validation = Validator::make($request->all(), [
            "kode" => "required|max:8",
            "nama" => "required|min:3",
            "program_keahlian_id" => "required"
        ], [
            "kode.required" => "Kode kompetensi keahlian harus diisi",
            "kode.max" => "Kode kompetensi keahlian max: 8 karakter",
            "nama.required" => "Nama kompetensi keahlian harus diisi",
            "nama.min" => "Nama kompetensi keahlian min: 3 karakter",
            "program_keahlian_id.required" => "Program keahlian harus diisi"
        ]);

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput();
        } else {
            $data = KompetensiKeahlian::find(decrypt($id));
            $data->kode = $request->kode;
            $data->nama = $request->nama;
            $data->deskripsi = $request->deskripsi;
            $data->save();

            return back()->with('success', true);
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
        $data = KompetensiKeahlian::find(decrypt($id));
        $data->delete();

        return back()->with('success', true);
    }

    /**
     * Show the form for import a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $data = array(
            'title' => 'Kompetensi Keahlian',
            'nav' => 'kompetensi-keahlian'
        );
        return view('admin.pages.kompetensi-keahlian.import', $data);
    }

    /**
     * Import the specified from excel data to storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imported(Request $request)
    {

    }

    /**
     * Download file-format-excel to imported.
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        return response()->download(public_path('/assets/excel/file-format-import-kompetensi-keahlian.xlsx'));
    }
}