<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaturan;
use Illuminate\Support\Facades\Validator;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Pengaturan',
            'nav'   => 'pengaturan',
            'items' => Pengaturan::orderBy('nama', 'ASC')->get(),
        );

        return view('admin.pengaturan.index', $data);
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
            'title' => 'Pengaturan',
            'nav'   => 'pengaturan',
            'item' => Pengaturan::find(decrypt($id))
        );

        return view('admin.pengaturan.edit', $data);
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
            "kode" => "required|max:255",
            "nama" => "required|min:2|max:128",
        ], [
            "kode.required" => "Kode harus diisi",
            "kode.max"      => "Kode max: 255 karakter",
            "nama.required" => "nama harus diisi",
            "nama.min"      => "nama min:2 karakter",
            "nama.max"      => "nama max:128 karakter"
        ]);

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput();
        } else {

            $update = Pengaturan::find(decrypt($id));
            $update->kode = $request->kode;
            $update->nama = $request->nama;
            $update->konten = $request->konten;
            $update->save();

            return back()->with('success', "Pengaturan Telah Diubah");
        }
    }

}
