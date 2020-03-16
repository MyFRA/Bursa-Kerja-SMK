<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\Faq; 

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Faq',
            'nav'   => 'faq',
            'items' => Faq::orderBy('id', 'ASC')->get(),
        );

        return view('admin.pages.faq.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Faq',
            'nav'   => 'faq'
        );

        return view('admin.pages.faq.create', $data);
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
            'pertanyaan' => 'required|min:3|max:255',
            'jawaban'    => 'required',
        ], [
            'pertanyaan.required' => 'pertanyaan harus diisi',
            'pertanyaan.min' => 'pertanyaan minimal 3 karakter',
            'pertanyaan.max' => 'pertanyaan maksimal 255 karakter',
            'jawaban.required' => 'jawaban harus diisi',
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            $data = Faq::create($request->all());
            return redirect('/app-admin/faq/' . encrypt($data->id) . "/edit")
                    ->with('success', "faq Telah Ditambahkan");
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
            'title' => 'Faq',
            'nav'   => 'faq',
            'item'  => Faq::find(decrypt($id))
        );
        return view('admin.pages.faq.edit', $data);
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
            'pertanyaan' => 'required|min:3|max:255',
            'jawaban'    => 'required',
        ], [
            'pertanyaan.required' => 'pertanyaan harus diisi',
            'pertanyaan.min' => 'pertanyaan minimal 3 karakter',
            'pertanyaan.max' => 'pertanyaan maksimal 255 karakter',
            'jawaban.required' => 'jawaban harus diisi',
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            $update = Faq::find(decrypt($id));
            $update->pertanyaan = $request->pertanyaan;
            $update->jawaban = $request->jawaban;
            $update->save();

            return back()->with('success', "Faq Telah Diubah");
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
        $data = Faq::find(decrypt($id));
        $data->delete();

        return back()->with('success', "Faq Telah Dihapus");
    }

    /**
     * Show the form for import a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $data = array(
            'title' => 'Faq',
            'nav' => 'faq'
        );
        return view('admin.pages.faq.import', $data);
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
        return response()->download(public_path('/assets/excel/file-format-import-faq.xlsx'));
    }
}
