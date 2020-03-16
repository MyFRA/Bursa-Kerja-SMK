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

        return view('admin.pages.pengaturan.index', $data);
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

        return view('admin.pages.pengaturan.edit', $data);
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
        $update = Pengaturan::find(decrypt($id));
        $nama   = $update->nama;
        $update->konten = $request->konten;
        $update->save();

        return redirect('/app-admin/pengaturan')->with('success', "Pengaturan $nama Telah Diubah");
    }

}
