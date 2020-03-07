<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\BidangStudi;

class BidangStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Bidang Studi',
            'nav' => 'bidang-studi',
            'items' => BidangStudi::orderBy('nama', 'ASC')->get()
        );
        return view('admin.pages.bidang-studi.index', $data);
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
            'nav' => 'bidang-studi'
        );

        return view('admin.pages.bidang-studi.create', $data);
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
            "nama" => "required|min:2",
        ], [
            "nama.required" => "nama bidang studi harus diisi",
            "nama.min" => "nama bidang studi minimal 2 karakter",
        ]);


        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput();
        } else {
            $data = BidangStudi::create($request->all());
            return redirect('/app-admin/bidang-studi/' . encrypt($data->id) . "/edit")
                ->with('success', "Bidang Studi $request->nama Telah Ditambahkan");
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
        $item = BidangStudi::find(decrypt($id));
        $data = array(
            'title' => 'Bidang Studi',
            'nav'   => 'bidang-studi',
            'item'  => $item,
        );
        return view('admin.pages.bidang-studi.edit', $data);
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
            "nama" => "required|min:2",
        ], [
            "nama.required" => "nama bidang studi harus diisi",
            "nama.min" => "nama bidang studi minimal 2 karakter",
        ]);

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput();
        } else {

            $update = BidangStudi::find(decrypt($id));
            $update->nama = $request->nama;
            $update->deskripsi = $request->deskripsi;
            $update->save();

            $alert = [
                'field'   => $request->nama,
                'jawaban' => 'Diubah'
            ];

            return back()->with('success', "Bidang Studi $request->nama Telah Diubah");
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
        $data = BidangStudi::find(decrypt($id));
        $nama = $data->nama;
        $data->delete();

        return back()->with('success', "Bidang Studi $nama Telah Dihapus");
    }

    /**
     * Show the form for import a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $data = array(
            'title' => 'Bidang Studi',
            'nav' => 'bidang-studi'
        );
        return view('admin.pages.bidang-studi.import', $data);
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
        return response()->download(public_path('/assets/excel/file-format-import-bidang-studi.xlsx'));
    }
}
