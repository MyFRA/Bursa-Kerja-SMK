<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'navLink' => 'pengumuman',
            'items' => Pengumuman::orderBy('updated_at', 'DESC')->get(),
            'title' => 'Pengumuman',
            'nav' => 'pengumuman'
        ];

        return view('admin.pages.pengumuman.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Pengumuman',
            'nav'   => 'pengumuman'
        );
        return view('admin.pages.pengumuman.create', $data);
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
            'judul'         => 'required|max:255',
            'status'        => 'required|in:Aktif,Nonaktif,Draf',
        ], [
            'judul.required'    => 'judul tidak boleh kosong',
            'judul.max'         => 'judul maksimal 255 karakter',
            'status.required'   => 'status tidak boleh kosong',
            'status.in'         => 'status harus diantara Draf, Aktif dan Nonaktif',
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }else {
            $link = Str::slug($request->judul) . '-' . time();

            Pengumuman::create([
                'judul' => $request->judul,
                'link'  =>  $link,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status
            ]);

            return redirect('/app-admin/pengumuman')->with('success', 'Pengumuman ' . $request->judul . ' Telah Ditambahkan');
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
            'title' => 'Pengumuman',
            'nav'   => 'pengumuman',
            'pengumuman'  => Pengumuman::find(decrypt($id)),
        );

        return view('/admin.pages.pengumuman.edit', $data);
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
            'judul'         => 'required|max:255',
            'status'        => 'required|in:Aktif,Nonaktif,Draf',
        ], [
            'judul.required'    => 'judul tidak boleh kosong',
            'judul.max'         => 'judul maksimal 255 karakter',
            'status.required'   => 'status tidak boleh kosong',
            'status.in'         => 'status harus diantara Draf, Aktif dan Nonaktif',
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }else {
            $id = decrypt($id);
            $data = Pengumuman::find($id);

            $data->update([
                'judul'     => $request->judul,
                'deskripsi' => $request->deskripsi,
                'status'    => $request->status
            ]);

            return redirect('/app-admin/pengumuman')->with('success', 'Pengumuman ' . $request->judul . ' Telah Diupdate');
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
        $data = Pengumuman::find(decrypt($id));
        Pengumuman::destroy($data->id);

        return back()->with('success', "Pengumuman $data->judul Telah Dihapus");
    }

        // Fungsi Hapus Massal
        public function hapusMassal()
        {
            $data = Pengumuman::get();
    
            foreach($data as $pengumuman) {
                Pengumuman::destroy($pengumuman->id);
            }
    
            return back()->with('success', 'Semua Pengumuman Telah Dihapus');
        }
}
