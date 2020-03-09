<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\BidangIndustri; 

class BidangIndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Bidang Industri',
            'nav'   => 'bidang-industri',
            'items' => BidangIndustri::orderBy('nama', 'ASC')->get(),
        );

        return view('admin.pages.bidang-industri.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Bidang Industri',
            'nav'   => 'bidang-industri'
        );

        return view('admin.pages.bidang-industri.create', $data);
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
            'nama.required' => 'nama bidang industri harus diisi',
            'nama.min' => 'nama bidang industri minimal 3 karakter',
            'nama.max' => 'nama bidang industri maksimal 128 karakter'
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            $data = BidangIndustri::create($request->all());
            return redirect('/app-admin/bidang-industri/' . encrypt($data->id) . "/edit")
                    ->with('success', "Bidang Industri $request->nama Telah Ditambahkan");
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
            'title' => 'Bidang Industri',
            'nav'   => 'bidang-industri',
            'item'  => BidangIndustri::find(decrypt($id))
        );
        return view('admin.pages.bidang-industri.edit', $data);
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
            'nama.required' => 'nama bidang industri harus diisi',
            'nama.min' => 'nama bidang industri minimal 3 karakter',
            'nama.max' => 'nama bidang industri maksimal 128 karakter'
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
            return redirect('/app-admin/bidang-industri/' . encrypt($data->id) . "/edit")
                    ->with('success', "Bidang Industri $request->nama Telah Diubah");
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
        $data = BidangIndustri::find(decrypt($id));
        $nama = $data->nama;
        $data->delete();

        return back()->with('success', "Bidang Industri $nama Telah Dihapus");
    }

    /**
     * Show the form for import a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $data = array(
            'title' => 'Bidang Industri',
            'nav' => 'bidang-industri'
        );
        return view('admin.pages.bidang-industri.import', $data);
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
        return response()->download(public_path('/assets/excel/file-format-import-bidang-industri.xlsx'));
    }
}
