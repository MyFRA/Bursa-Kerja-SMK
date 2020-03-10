<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\BidangKeahlian;

class BidangKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Bidang Keahlian',
            'nav' => 'bidang-keahlian',
            'items' => BidangKeahlian::orderBy('nama', 'ASC')->get()
        );
        return view('admin.pages.bidang-keahlian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Bidang Studi',
            'nav' => 'bidang-keahlian'
        );

        return view('admin.pages.bidang-keahlian.create', $data);
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
            "kode" => 'required|max:8|unique:m_bidang_keahlian',
            "nama" => "required|min:2|max:128",
        ], [
            "kode.required" => "Kode bidang keahlian harus diisi",
            "kode.max" => "Kode bidang keahlian max: 8 karakter",
            "kode.unique" => "Kode bidang keahlian tidak boleh sama",
            "nama.required" => "nama bidang studi harus diisi",
            "nama.min"      => "nama bidang studi minimal 2 karakter",
            "nama.max"      => "nama bidang studi maksimal 128 karakter"
        ]);

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput();
        } else {
            $data = BidangKeahlian::create($request->all());
            return redirect('/app-admin/bidang-keahlian/' . encrypt($data->id) . "/edit")
                ->with('success', "Bidang Keahlian $request->nama Telah Ditambahkan");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = BidangKeahlian::find(decrypt($id));
        $data = array(
            'title' => 'Bidang Keahlian',
            'nav'   => 'bidang-keahlian',
            'item'  => $item,
        );
        return view('admin.pages.bidang-keahlian.edit', $data);
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
            "nama" => "required|min:2|max:128",
        ], [
            "kode.required" => "Kode bidang keahlian harus diisi",
            "kode.max" => "Kode bidang keahlian max: 8 karakter",
            "nama.required" => "nama bidang keahlian harus diisi",
            "nama.min"      => "nama bidang keahlian minimal 2 karakter",
            "nama.max"      => "nama bidang keahlian maksimal 128 karakter"
        ]);

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput();
        } else {

            $update = BidangKeahlian::find(decrypt($id));
            $update->kode = $request->kode;
            $update->nama = $request->nama;
            $update->deskripsi = $request->deskripsi;
            $update->save();

            return back()->with('success', "Bidang Keahlian $request->nama Telah Diubah");
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
        $data = BidangKeahlian::find(decrypt($id));
        $nama = $data->nama;
        $data->delete();

        return back()->with('success', "Bidang Keahlian $nama Telah Dihapus");
    }

    /**
     * Show the form for import a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $data = array(
            'title' => 'Bidang Keahlian',
            'nav' => 'bidang-keahlian'
        );
        return view('admin.pages.bidang-keahlian.import', $data);
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
        return response()->download(public_path('/assets/excel/file-format-import-bidang-keahlian.xlsx'));
    }
}
