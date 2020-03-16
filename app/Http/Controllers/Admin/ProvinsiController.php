<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Provinsi;
use App\Models\Negara;
use App\Models\Kabupaten;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title'     => 'Provinsi',
            'nav'       => 'provinsi',
            'items'     => Provinsi::select('m_provinsi.*', "m_negara.nama_negara as nama_negara")
                                ->join('m_negara', 'm_provinsi.negara_id', '=', 'm_negara.id')
                                ->get(),
        );

        return view('admin.pages.provinsi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Provinsi',
            'nav' => 'provinsi',
            'programs' => Negara::orderBy('nama_negara', 'ASC')->get(),
            'id_negara' => Negara::orderBy('nama_negara', 'ASC')->get(),
        );
        return view('admin.pages.provinsi.create', $data);
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
            "nama_provinsi" => "required|min:3|max:32",
            "negara_id" => "required"
        ], [
            "nama_provinsi.required" => "Nama Provinsi harus diisi",
            "nama_provinsi.min" => "Nama Provinsi min: 3 karakter",
            "nama_provinsi.max" => "Nama Provinsi max: 32 karakter",
            "negara_id.required" => "Negara harus diisi"
        ]);

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput();
        } else {
            $data = Provinsi::create($request->all());
            return redirect('/app-admin/provinsi/' . encrypt($data->id) . "/edit")
                ->with('success', "Provinsi $request->nama_provinsi Telah Ditambahkan");
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
            'title' => 'Provinsi',
            'nav' => 'provinsi',
            'item' => Provinsi::select('m_provinsi.*', "m_negara.nama_negara as nama_negara", "m_provinsi.id")
                            ->join('m_negara', 'm_provinsi.negara_id', '=', 'm_negara.id')
                            ->where('m_provinsi.id', decrypt($id))
                            ->first(),
            'negara' => Negara::orderBy('nama_negara', 'ASC')->get()
        );
        return view('admin.pages.provinsi.edit', $data);
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
            "nama_provinsi" => "required|min:3|max:32",
            "negara_id" => "required"
        ], [
            "nama_provinsi.required" => "Nama Provinsi harus diisi",
            "nama_provinsi.min" => "Nama Provinsi min: 3 karakter",
            "nama_provinsi.max" => "Nama Provinsi max: 32 karakter",
            "negara_id.required" => "Negara harus diisi"
        ]);

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput();
        } else {
            $data = Provinsi::find(decrypt($id));
            $data->nama_provinsi = $request->nama_provinsi;
            $data->negara_id     = $request->negara_id;
            $data->save();

            return back()->with('success', "Provinsi $request->nama_provinsi Telah Diubah");
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
        $kabupaten = Kabupaten::get();
        $data = Provinsi::find(decrypt($id));

        foreach ($kabupaten as $var) {
            if ( $var->provinsi_id == $data->id  ) {
                return back()->with('gagal', ' Provinsi Gagal Dihapus, Karena masih terikat dengan Kabupaten');
            }
        }
        $nama = $data->nama_provinsi;
        $data->delete();
        return back()->with('success', "Provinsi $nama Telah Dihapus");
    }

    /**
     * Show the form for import a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $data = array(
            'title' => 'Provinsi',
            'nav' => 'provinsi'
        );
        return view('admin.pages.provinsi.import', $data);
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
        return response()->download(public_path('/assets/excel/file-format-import-provinsi.xlsx'));
    }
}
