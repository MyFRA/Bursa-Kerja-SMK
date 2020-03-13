<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\ProgramKeahlian;
use App\Models\KompetensiKeahlian;
use App\Models\BidangKeahlian;

class ProgramKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title'     => 'Program Keahlian',
            'nav'       => 'program-keahlian',
            'items'     => ProgramKeahlian::select('m_program_keahlian.*', "m_bidang_keahlian.nama as nama_bidang_keahlian")
                                ->join('m_bidang_keahlian', 'm_program_keahlian.bidang_keahlian_id', '=', 'm_bidang_keahlian.id')
                                ->get(),
        );

        return view('admin.pages.program-keahlian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title'                => 'Program Keahlian',
            'nav'                  => 'program-keahlian',
            'list_bidang_keahlian' => BidangKeahlian::orderBy('nama', 'ASC')->get(),
        );
        return view('admin.pages.program-keahlian.create', $data);
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
            'kode'               => 'required|unique:m_program_keahlian|max:8',
            "nama"               => "required|min:3|max:123",
            "bidang_keahlian_id" => "required"
        ], [
            "kode.required" => 'kode program keahlian harus diisi',
            'kode.unique'   => 'kode program keahlian sudah ada',
            'kode.max'      => 'kode program keahlian max: 8 karakter',
            "nama.required" => "nama program keahlian harus diisi",
            "nama.min" => "nama program keahlian min: 3 karakter",
            "nama.max" => "nama program keahlian max: 32 karakter",
            "bidang_keahlian_id.required" => "bidang keahlian harus diisi"
        ]);

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput();
        } else {
            $data = ProgramKeahlian::create($request->all());
            return redirect('/app-admin/program-keahlian/' . encrypt($data->id) . "/edit")
                ->with('success', "Program Keahlian $request->nama Telah Ditambahkan");
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
            'title' => 'Program Keahlian',
            'nav' => 'program-keahlian',
            'item' => ProgramKeahlian::select('m_program_keahlian.*', "m_bidang_keahlian.nama as nama_bidang_keahlian")
                            ->join('m_bidang_keahlian', 'm_program_keahlian.bidang_keahlian_id', '=', 'm_bidang_keahlian.id')
                            ->where('m_program_keahlian.id', decrypt($id))
                            ->first(),
            'listBidangKeahlian' => BidangKeahlian::orderBy('nama', 'ASC')->get()
        );
        return view('admin.pages.program-keahlian.edit', $data);
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
            'kode'               => 'required|max:8',
            "nama"               => "required|min:3|max:123",
            "bidang_keahlian_id" => "required"
        ], [
            "kode.required" => 'kode program keahlian harus diisi',
            'kode.max'      => 'kode program keahlian max: 8 karakter',
            "nama.required" => "nama program keahlian harus diisi",
            "nama.min" => "nama program keahlian min: 3 karakter",
            "nama.max" => "nama program keahlian max: 32 karakter",
            "bidang_keahlian_id.required" => "bidang keahlian harus diisi"
        ]);

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput();
        } else {
            $data = ProgramKeahlian::find(decrypt($id));
            $data->kode = $request->kode;
            $data->nama = $request->nama;
            $data->bidang_keahlian_id = $request->bidang_keahlian_id;
            $data->save();

            return back()->with('success', "Program Keahlian $request->nama Telah Diubah");
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
        $kompetensiKeahlian = KompetensiKeahlian::get();
        $data = ProgramKeahlian::find(decrypt($id));
        $nama = $data->nama;
        foreach ($kompetensiKeahlian as $var) {
            if ( $var->program_keahlian_id == $data->id  ) {
                return back()->with('gagal', ' Program Keahlian Gagal Dihapus, Karena masih terikat dengan Kompetensi Keahlian');
            }
        }
        $data->delete();
        return back()->with('success', "Program Keahlian $nama Telah Dihapus");
    }

    /**
     * Show the form for import a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $data = array(
            'title' => 'Program Keahlian',
            'nav' => 'program-keahlian'
        );
        return view('admin.pages.program-keahlian.import', $data);
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
        return response()->download(public_path('/assets/excel/file-format-import-program-keahlian.xlsx'));
    }
}
