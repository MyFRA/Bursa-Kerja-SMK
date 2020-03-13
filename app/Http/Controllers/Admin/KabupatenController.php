<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Kabupaten;
use App\Models\Provinsi;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title'     => 'Kabupaten',
            'nav'       => 'Kabupaten',
            'items'     => Kabupaten::select('m_kabupaten.*', "m_provinsi.nama_provinsi as nama_provinsi")
                                ->join('m_provinsi', 'm_kabupaten.provinsi_id', '=', 'm_provinsi.id')
                                ->get(),
        );

        return view('admin.pages.kabupaten.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Kabupaten',
            'nav' => 'kabupaten',
            'id_provinsi' => Provinsi::orderBy('nama_provinsi', 'ASC')->get(),
        );
        return view('admin.pages.kabupaten.create', $data);
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
            "nama_kabupaten" => "required|min:3|max:32",
            "provinsi_id" => "required"
        ], [
            "nama_kabupaten.required" => "Nama Kabupaten harus diisi",
            "nama_kabupaten.min" => "Nama Kabupaten min: 3 karakter",
            "nama_kabupaten.max" => "Nama Kabupaten max: 32 karakter",
            "provinsi_id.required" => "Provinsi harus diisi"
        ]);

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput();
        } else {
            $data = Kabupaten::create($request->all());
            return redirect('/app-admin/kabupaten/' . encrypt($data->id) . "/edit")
                ->with('success', "Kabupaten $request->nama_kabupaten Telah Ditambahkan");
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
            'title' => 'Kabupaten',
            'nav' => 'kabupaten',
            'item' => Kabupaten::select('m_kabupaten.*', "m_provinsi.nama_provinsi as nama_provinsi", "m_kabupaten.id")
                            ->join('m_provinsi', 'm_kabupaten.provinsi_id', '=', 'm_provinsi.id')
                            ->where('m_kabupaten.id', decrypt($id))
                            ->first(),
            'provinsi' => Provinsi::orderBy('nama_provinsi', 'ASC')->get()
        );
        return view('admin.pages.kabupaten.edit', $data);
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
            "nama_kabupaten" => "required|min:3|max:32",
            "provinsi_id" => "required"
        ], [
            "nama_kabupaten.required" => "Nama Kabupaten harus diisi",
            "nama_kabupaten.min" => "Nama Kabupaten min: 3 karakter",
            "nama_kabupaten.max" => "Nama Kabupaten max: 32 karakter",
            "provinsi_id.required" => "provinsi harus diisi"
        ]);

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput();
        } else {
            $data = Kabupaten::find(decrypt($id));
            $data->nama_kabupaten = $request->nama_kabupaten;
            $data->provinsi_id    = $request->provinsi_id;
            $data->save();

            return back()->with('success', "Kabupaten $request->nama_kabupaten Telah Diubah");
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
        $data = Kabupaten::find(decrypt($id));
        $nama = $data->nama_kabupaten;
        $data->delete();

        return back()->with('success', "Kabupaten $nama Telah Dihapus");
    }

    /**
     * Show the form for import a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $data = array(
            'title' => 'Kabupaten',
            'nav' => 'kabupaten'
        );
        return view('admin.pages.kabupaten.import', $data);
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
        return response()->download(public_path('/assets/excel/file-format-import-kabupaten.xlsx'));
    }
}
