<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\DaftarKeahlian;

class DaftarKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Daftar Keahlian',
            'nav'   => 'daftar-keahlian',
            'items' => DaftarKeahlian::orderBy('nama', 'ASC')->get()
        );

        return view('admin.pages.daftar-keahlian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Daftar Keahlian',
            'nav'   => 'daftar-keahlian',
        );

        return view('admin.pages.daftar-keahlian.create', $data);
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
            'nama.required' => 'nama keahlian harus diisi',
            'nama.min' => 'nama keahlian minimal 3 karakter',
            'nama.max' => 'nama keahlian maksimal 128 karakter'
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            $data = DaftarKeahlian::create($request->all());
            return redirect('/app-admin/daftar-keahlian/' . encrypt($data->id) . "/edit")
                    ->with('success', "Keahlian $request->nama Telah Ditambahkan");
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
            'title' => 'Daftar Keahlian',
            'nav' => 'daftar-keahlian',
            'item' => DaftarKeahlian::find(decrypt($id))
        );

        return view('admin.pages.daftar-keahlian.edit', $data);
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
            'nama.required' => 'nama keahlian harus diisi',
            'nama.min' => 'nama keahlian minimal 3 karakter',
            'nama.max' => 'nama keahlian maksimal 128 karakter'
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            $update = BidangIndustri::find(decrypt($id));
            $update->nama      = $request['nama'];
            $update->deskripsi = $request['deskripsi'];
            $update->save();
            return redirect('/app-admin/daftar-keahlian/' . encrypt($data->id) . "/edit")
                    ->with('success', "Keahlian $request->nama Telah Diubah");
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
        $data = DaftarKeahlian::find(decrypt($id));
        $nama = $data->nama;
        $data->delete();

        return back()->with('success', "Keahlian $nama Telah Dihapus");
    }


    /**
     * Show the form for import a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $data = array(
            'title' => 'Daftar Keahlian',
            'nav' => 'daftar-keahlian'
        );
        return view('admin.pages.daftar-keahlian.import', $data);
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
        return response()->download(public_path('/assets/excel/file-format-import-daftar-keahlian.xlsx'));
    }
}
