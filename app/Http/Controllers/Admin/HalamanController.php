<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Halaman;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class HalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Halaman',
            'nav'   => 'halaman',
            'items' => Halaman::orderBy('updated_at', 'DESC')->get(),
        );

        return view('admin.pages.halaman.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Halaman',
            'nav'   => 'halaman'
        );
        return view('admin.pages.halaman.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->allslots = array('Draf', 'Aktif', 'Nonaktif');

        $validator = Validator::make($request->all(), [
            'judul' => 'required|max:255',
            'status' => ['required', Rule::in($this->allslots)],
        ], [
            'judul.required' => 'judul harus diisi',
            'judul.max' => 'judul maksimal 255 karakter',
            'status.required' => 'status harus diisi',
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        else {
            $data = Halaman::create([
                'judul' => $request->judul,
                'konten' => $request->konten,
                'status' => $request->status,
                'link' => Str::slug($request->judul),
            ]);
            return redirect('/app-admin/halaman')->with('success', "Halaman $request->judul Telah Ditambahkan");
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
        $data =  array(
            'title' => 'Halaman',
            'nav' => 'halaman',
            'item' => Halaman::find(decrypt($id)),
        );

        return view('admin.pages.halaman.edit', $data);
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
        $this->allslots = array('Draf', 'Aktif', 'Nonaktif');

        $validator = Validator::make($request->all(), [
            'judul' => 'required|max:255',
            'status' => ['required', Rule::in($this->allslots)],
        ], [
            'judul.required' => 'judul harus diisi',
            'judul.max' => 'judul maksimal 255 karakter',
            'status.required' => 'status harus diisi',
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        else {
            $update = Halaman::find(decrypt($id));
            $update->judul   = $request['judul'];
            $update->konten  = $request->konten;
            $update->status  = $request->status;   
            $update->link    = Str::slug($request->judul);
            $update->save();

            return redirect('/app-admin/halaman')->with('success', "Halaman $request->judul Telah Diubah");
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
        $data = Halaman::find(decrypt($id));
        $judul = $data->judul;
        $data->delete();

        return back()->with('success', "Halaman $judul Telah Dihapus");
    }
}
