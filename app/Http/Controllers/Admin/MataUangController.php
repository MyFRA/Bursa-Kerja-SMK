<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\MataUang;

class MataUangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Mata Uang',
            'nav'   => 'mata-uang',
            'items' => MataUang::orderBy('negara', 'ASC')->get()
        );

        return view('admin.pages.mata-uang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Mata Uang',
            'nav'   => 'mata-uang'
        );

        return view('admin.pages.mata-uang.create', $data);
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
            'kode' => 'required|max:4',
            'negara' => 'required|min:3|max:32',
        ], [
            'kode.required' => 'kode mata uang harus diisi',
            'kode.max'      => 'kode mata uang maksimal 4 karakter',
            'negara.required' => 'nama negara harus diisi',
            'negara.min' => 'nama negara minimal 3 karakter',
            'negara.max' => 'nama negara maksimal 32 karakter'
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            $data = MataUang::create($request->all());
            return redirect('/app-admin/mata-uang/' . encrypt($data->id) . "/edit")
                    ->with('success', "Mata Uang Negara $request->negara Telah Ditambahkan");
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
            'title' => 'Mata Uang',
            'nav'   => 'mata-uang',
            'item'  => MataUang::find(decrypt($id))
        );
        return view('admin.pages.mata-uang.edit', $data);
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
            'kode' => 'required|max:4',
            'negara' => 'required|min:3|max:32',
        ], [
            'kode.required' => 'kode mata uang harus diisi',
            'kode.max'      => 'kode mata uang maksimal 4 karakter',
            'negara.required' => 'nama negara harus diisi',
            'negara.min' => 'nama negara minimal 3 karakter',
            'negara.max' => 'nama negara maksimal 32 karakter'
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            $update = MataUang::find(decrypt($id));
            $update->kode      = $request['kode'];
            $update->negara = $request['negara'];
            $update->save();

            return back()->with('success', "Mata Uang Negara $request->negara Telah Diubah");
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
        $data = MataUang::find(decrypt($id));
        $negara = $data->negara;
        $data->delete();

        return back()->with('success', "MataUang $negara Telah Dihapus");
    }


    /**
     * Show the form for import a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $data = array(
            'title' => 'Mata Uang',
            'nav' => 'mata-uang'
        );
        return view('admin.pages.mata-uang.import', $data);
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
        return response()->download(public_path('/assets/excel/file-format-import-mata-uang.xlsx'));
    }

    // Fungsi Hapus Massal
    public function hapusMassal()
    {
        $data = MataUang::get();

        foreach($data as $mataUang) {
            MataUang::destroy($mataUang->id);
        }

        return back()->with('success', 'Semua Mata Uang Telah Dihapus');
    }
}
