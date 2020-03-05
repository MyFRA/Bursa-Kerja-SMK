<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Jurusan;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Jurusan',
            'nav' => 'jurusan',
            'items' => Jurusan::orderBy('nama', 'ASC')->get()
        );
        return view('admin.pages.jurusan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Jurusan',
            'nav' => 'jurusan'
        );
        return view('admin.pages.jurusan.create', $data);
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
            "kode" => "required|max:8|unique:m_jurusan",
            "nama" => "required|min:3"
        ], [
            "kode.required" => "Kode jurusan harus diisi",
            "kode.max" => "Kode jurusan max: 8 karakter",
            "kode.unique" => "Kode jurusan tidak boleh sama",
            "nama.required" => "Nama jurusan harus diisi",
            "nama.min" => "Nama jurusan min: 3 karakter"
        ]);

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput();
        } else {
            $data = Jurusan::create($request->all());
            return redirect('/app-admin/jurusan/' . encrypt($data->id) . "/edit")
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
            'title' => 'Jurusan',
            'nav' => 'jurusan',
            'item' => Jurusan::find(decrypt($id))
        );
        return view('admin.pages.jurusan.edit', $data);
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
            "nama" => "required|min:3"
        ], [
            "kode.required" => "Kode jurusan harus diisi",
            "kode.max" => "Kode jurusan max: 8 karakter",
            "nama.required" => "Nama jurusan harus diisi",
            "nama.min" => "Nama jurusan min: 3 karakter"
        ]);

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput();
        } else {
            $data = Jurusan::find(decrypt($id));
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
        $data = Jurusan::find(decrypt($id));
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
            'title' => 'Jurusan',
            'nav' => 'jurusan'
        );
        return view('admin.pages.jurusan.import', $data);
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
        return response()->download(public_path('/assets/excel/file-format-import-jurusan.xlsx'));
    }
}
