<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\Keterampilan;

class KeterampilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Keterampilan',
            'nav'   => 'keterampilan',
            'items' => Keterampilan::orderBy('nama', 'ASC')->get(),
        );

        return view('admin.pages.keterampilan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Keterampilan',
            'nav'   => 'keterampilan'
        );

        return view('admin.pages.keterampilan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3|max:128',
        ], [
            'nama.required' => 'nama keterampilan harus diisi',
            'nama.min' => 'nama keterampilan minimal 3 karakter',
            'nama.max' => 'nama keterampilan maksimal 128 karakter'
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            $data = Keterampilan::create($request->all());
            return redirect('/app-admin/keterampilan/' . encrypt($data->id) . "/edit")
                    ->with('success', "Keterampilan $request->nama Telah Ditambahkan");
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
            'title' => 'Keterampilan',
            'nav'   => 'keterampilan',
            'item'  => Keterampilan::find(decrypt($id))
        );
        return view('admin.pages.keterampilan.edit', $data);
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3|max:128',
        ], [
            'nama.required' => 'nama keterampilan harus diisi',
            'nama.min' => 'nama keterampilan minimal 3 karakter',
            'nama.max' => 'nama keterampilan maksimal 128 karakter'
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            $update = Keterampilan::find(decrypt($id));
            $update->nama      = $request['nama'];
            $update->deskripsi = $request['deskripsi'];
            $update->save();

            return back()->with('success', "Keterampilan $request->nama Telah Diubah");
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
        $data = Keterampilan::find(decrypt($id));
        $nama = $data->nama;
        $data->delete();

        return back()->with('success', "Keterampilan $nama Telah Dihapus");
    }

    /**
     * Show the form for import a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $data = array(
            'title' => 'Keterampilan',
            'nav' => 'keterampilan'
        );
        return view('admin.pages.keterampilan.import', $data);
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
        return response()->download(public_path('/assets/excel/file-format-import-keterampilan.xlsx'));
    }

    // Fungsi Hapus Massal
    public function hapusMassal()
    {
        $data = Keterampilan::get();

        foreach($data as $keterampilan) {
            Keterampilan::destroy($keterampilan->id);
        }

        return back()->with('success', 'Semua Keterampilan Telah Dihapus');
    }
}
