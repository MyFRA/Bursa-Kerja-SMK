<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\BidangPekerjaan;

class BidangPekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Bidang Pekerjaan',
            'nav'   => 'bidang-pekerjaan',
            'items' => BidangPekerjaan::orderBy('nama', 'ASC')->get(),
        );
        return view('admin.pages.bidang-pekerjaan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Bidang Pekerjaan',
            'nav'   => 'bidang-pekerjaan'
        );
        return view('admin.pages.bidang-pekerjaan.create', $data);
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
            'nama.required' => 'nama bidang pekerjaan harus diisi',
            'nama.min' => 'nama bidang pekerjaan minimal 3 karakter',
            'nama.max' => 'nama bidang pekerjaan maksimal 128 karakter'
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            $data = BidangPekerjaan::create($request->all());
            return redirect('/app-admin/bidang-pekerjaan/' . encrypt($data->id) . "/edit")
                    ->with('success', "Bidang Pekerjaan $request->nama Telah Ditambahkan");
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
            'title' => 'Bidang Pekerjaan',
            'nav' => 'bidang-pekerjaan',
            'item'  => BidangPekerjaan::find(decrypt($id))
        );
        return view('admin.pages.bidang-pekerjaan.edit', $data);
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
            'nama.required' => 'nama bidang pekerjaan harus diisi',
            'nama.min' => 'nama bidang pekerjaan minimal 3 karakter',
            'nama.max' => 'nama bidang pekerjaan maksimal 128 karakter'
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            $update = BidangPekerjaan::find(decrypt($id));
            $update->nama      = $request->nama;
            $update->deskripsi = $request->deskripsi;
            $update->save();

            return back()->with('success', "Bidang Pekerjaan $request->nama Telah Diubah");
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
        $data = BidangPekerjaan::find(decrypt($id));
        $nama = $data->nama;
        $data->delete();        
        return redirect()->back()->with('success', "Bidang Pekerjaan $nama Telah Dihapus");
    }

    /**
     * Show the form for import a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $data = array(
            'title' => 'Bidang Pekerjaan',
            'nav' => 'bidang-pekerjaan'
        );
        return view('admin.pages.bidang-pekerjaan.import', $data);
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
        return response()->download(public_path('/assets/excel/file-format-import-bidang-pekerjaan.xlsx'));
    }
}
