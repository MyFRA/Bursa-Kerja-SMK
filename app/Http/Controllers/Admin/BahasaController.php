<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Imports\BahasaImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Bahasa;

class BahasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Bahasa',
            'nav'   => 'bahasa',
            'items' => Bahasa::orderBy('nama', 'ASC')->get(),
        );

        return view('admin.pages.bahasa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Bahasa',
            'nav'   => 'bahasa'
        );

        return view('admin.pages.bahasa.create', $data);
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
            'nama.required' => 'nama bahasa harus diisi',
            'nama.min' => 'nama bahasa minimal 3 karakter',
            'nama.max' => 'nama bahasa maksimal 128 karakter'
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            $data = Bahasa::create($request->all());
            return redirect('/app-admin/bahasa/' . encrypt($data->id) . "/edit")
                    ->with('success', "Bahasa $request->nama Telah Ditambahkan");
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
            'title' => 'Bahasa',
            'nav'   => 'bahasa',
            'item'  => Bahasa::find(decrypt($id))
        );
        return view('admin.pages.bahasa.edit', $data);
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
            'nama.required' => 'nama bahasa harus diisi',
            'nama.min' => 'nama bahasa minimal 3 karakter',
            'nama.max' => 'nama bahasa maksimal 128 karakter'
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            $update = Bahasa::find(decrypt($id));
            $update->nama      = $request['nama'];
            $update->save();

            return redirect('/app-admin/bahasa/' . encrypt($update->id) . "/edit")
            ->with('success', "Bahasa $request->nama Telah Diupdate");
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
        $data = Bahasa::find(decrypt($id));
        $nama = $data->nama;
        $data->delete();

        return back()->with('success', "Bahasa $nama Telah Dihapus");
    }

    /**
     * Show the form for import a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $data = array(
            'title' => 'Bahasa',
            'nav' => 'bahasa'
        );
        return view('admin.pages.bahasa.import', $data);
    }


    /**
     * Import the specified from excel data to storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imported(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        Excel::import(new BahasaImport,request()->file('file'));
        return redirect('/app-admin/bahasa')->with('success', 'Import file excel bahasa sukses');
    }

    /**
     * Download file-format-excel to imported.
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        return response()->download(public_path('/assets/excel/file-format-import-bahasa.xlsx'));
    }

    // Fungsi Hapus Massal
    public function hapusMassal()
    {
        $data = Bahasa::get();

        foreach($data as $bahasa) {
            Bahasa::destroy($bahasa->id);
        }

        return back()->with('success', 'Semua Bahasa Telah Dihapus');
    }
}
