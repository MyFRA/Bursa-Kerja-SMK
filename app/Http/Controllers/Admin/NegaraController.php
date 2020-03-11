<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\Negara;

class NegaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Negara',
            'nav'   => 'negara',
            'items' => Negara::orderBy('nama_negara', 'ASC')->get()
        );

        return view('admin.pages.negara.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Negara',
            'nav'   => 'negara',
        );

        return view('admin.pages.negara.create', $data);
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
            'nama_negara' => 'required|min:3|max:32',
        ], [
            'nama_negara.required' => 'nama negara keahlian harus diisi',
            'nama_negara.min' => 'nama negara keahlian minimal 3 karakter',
            'nama_negara.max' => 'nama negara keahlian maksimal 32 karakter'
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            $data = Negara::create($request->all());
            return redirect('/app-admin/negara/' . encrypt($data->id) . "/edit")
                    ->with('success', "Negara $request->nama_negara Telah Ditambahkan");
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
            'title' => 'Negara',
            'nav' => 'negara',
            'item' => Negara::find(decrypt($id))
        );

        return view('admin.pages.negara.edit', $data);
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
            'nama_negara' => 'required|min:3|max:32',
        ], [
            'nama_negara.required' => 'nama negara keahlian harus diisi',
            'nama_negara.min' => 'nama negara keahlian minimal 3 karakter',
            'nama_negara.max' => 'nama negara keahlian maksimal 32 karakter'
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            $update = Negara::find(decrypt($id));
            $update->nama_negara      = $request['nama_negara'];
            $update->save();
            return back()->with('success', "Negara $request->nama_negara Telah Diubah");
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
        $provinsi = Provinsi::get();
        $data = Negara::find(decrypt($id));

        foreach ($provinsi as $var) {
            if ( $var->negara_id == $data->id  ) {
                return back()->with('gagal', ' Negara Gagal Dihapus, Karena masih terikat dengan Provinsi');
            }
        }
        $nama = $data->nama_negara;
        $data->delete();
        return back()->with('success', "Negara $nama Telah Dihapus");
    }


    /**
     * Show the form for import a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $data = array(
            'title' => 'Negara',
            'nav' => 'negara'
        );
        return view('admin.pages.negara.import', $data);
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
        return response()->download(public_path('/assets/excel/file-format-import-negara.xlsx'));
    }
}
