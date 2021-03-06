<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\Artikel;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Artikel',
            'nav'   => 'artikel',
            'items' => Artikel::orderBy('updated_at', 'DESC')->get(),
        );
        return view('admin.pages.artikel.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Artikel',
            'nav'   => 'artikel'
        );
        return view('admin.pages.artikel.create', $data);
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
            'judul' => 'required|max:255',
            'status' => 'required|in:Aktif,Draf,Nonaktif',
            'konten' => 'required',
            'deskripsi' => 'required',
        ], [
            'judul.required'    => 'judul tidak boleh kosong',
            'judul.max'         => 'judul maksimal 255 karakter',
            'status.required'   => 'status tidak boleh kosong',
            'konten.required'   => 'konten tidak boleh kosong',
            'deskripsi.required' => 'deskripsi tidak boleh kosong',
            'status.in' => 'status harus diantara aktif, nonaktif dan draf',
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            if ( $request->file('image') == null ) {
                $jawaban = $this->uploadArtikel($request);
            } else {
                $jawaban = $this->uploadArtikel($request, $request->file('image'));
            }

            if ($jawaban) {
                return redirect('/app-admin/artikel')
                       ->with('success', "Artikel $request->judul Telah Ditambahkan");
            } else {
                return redirect()->back()
                             ->withErrors($validator)
                             ->withInput()
                             ->with('alert', true);
            }
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
            'title' => 'Artikel',
            'nav'   => 'artikel',
            'item'  => Artikel::find(decrypt($id)),
        );

        return view('admin.pages.artikel.edit', $data);
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
            'judul' => 'required|max:255',
            'status' => 'required|in:Aktif,Draf,Nonaktif',
            'konten' => 'required',
            'deskripsi' => 'required',
            'status.in' => 'status harus diantara aktif, nonaktif dan draf',
        ], [
            'judul.required'    => 'judul tidak boleh kosong',
            'judul.max'         => 'judul maksimal 255 karakter',
            'status.required'   => 'status tidak boleh kosong',
            'konten.required'   => 'konten tidak boleh kosong',
            'deskripsi.required' => 'deskripsi tidak boleh kosong',
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            if ( $request->file('image') == null ) {
                $jawaban = $this->updateArtikel($request, $id);
            } else {
                $jawaban = $this->updateArtikel($request, $id, $request->file('image'));
            }

            if ($jawaban) {
                return redirect('/app-admin/artikel')
                       ->with('success', "Artikel $request->judul Telah Diubah");
            } else {
                return redirect()->back()->withInput()->with('alert', true);
            }
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
        $data = Artikel::find(decrypt($id));
        $exists = Storage::disk('local')->exists('/public/assets/artikel/' . $data->image);
        if ( $exists === true ) {
            Storage::disk('local')->delete('/public/assets/artikel/' . $data->image);
        }
        Artikel::destroy(decrypt($id));

        return back()->with('success', "Artikel $data->judul Telah Dihapus");

    }

    public function uploadArtikel($request, $fileGambar = null)
    {
        if ( is_null($fileGambar) ) {
            Artikel::create([
                'judul' => $request->judul,
                'link'  => Str::slug($request->judul) . '-' . time(),
                'konten' => $request->konten,
                'deskripsi' => $request->deskripsi,
                'tags'      => $request->tags,
                'status'    => $request->status
            ]);
            return true;
        } else {
            $ekstensiValid = ['jpeg', 'png', 'bmp', 'gif', 'svg','webp', 'jpg'];
            if (!in_array($fileGambar->getClientOriginalExtension(), $ekstensiValid)) {
                return false;
            }

            else {
                $namaGambar = explode('.', $fileGambar->getClientOriginalName());
                $namaGambar = $namaGambar[0] . '-' . time() . '.' . $fileGambar->getClientOriginalExtension();
                $fileGambar->storeAs('public/assets/artikel', $namaGambar);

                Artikel::create([
                    'judul'     => $request->judul,
                    'link'      => Str::slug($request->judul) . '-' . time(),
                    'konten'    => $request->konten,
                    'deskripsi' => $request->deskripsi,
                    'tags'      => $request->tags,
                    'image'     => $namaGambar,
                    'status'    => $request->status
                ]);

                return true;
            }
        }
    }

    public function updateArtikel($request, $id, $fileGambar = null)
    {
        if ( is_null($fileGambar) ) {
            $update = Artikel::find(decrypt($id));

            $update->judul = $request->judul;
            $update->konten = $request->konten;
            $update->tags = $request->tags;
            $update->status = $request->status;
            $update->deskripsi = $request->deskripsi;
            $update->save();

            return true;
        } else {
            $artikelById = Artikel::find(decrypt($id));
            $ekstensiValid = ['jpeg', 'png', 'bmp', 'gif', 'svg','webp', 'jpg'];
            if (!in_array($fileGambar->getClientOriginalExtension(), $ekstensiValid)) {
                return false;
            }
            else {
                $exists = Storage::disk('local')->exists('/public/assets/artikel/' . $artikelById->image);
                if ( $exists === true ) {
                    Storage::disk('local')->delete('/public/assets/artikel/' . $artikelById->image);
                }

                $namaGambar = explode('.', $fileGambar->getClientOriginalName());
                $namaGambar = $namaGambar[0] . '-' . time() . '.' . $fileGambar->getClientOriginalExtension();
                $fileGambar->storeAs('public/assets/artikel', $namaGambar);

                $update = Artikel::find(decrypt($id));
                $update->judul = $request->judul;
                $update->konten = $request->konten;
                $update->tags = $request->tags;
                $update->status = $request->status;
                $update->deskripsi = $request->deskripsi;
                $update->image = $namaGambar;
                $update->save();

                return true;
            }
        }
    }


    // Fungsi Hapus Massal
    public function hapusMassal()
    {
        $data = Artikel::get();

        foreach($data as $artikel) {
            $exists = Storage::disk('local')->exists('/public/assets/artikel/' . $artikel->image);
            if ( $exists === true ) {
                Storage::disk('local')->delete('/public/assets/artikel/' . $artikel->image);
            }
            Artikel::destroy($artikel->id);
        }

        return back()->with('success', 'Semua Artikel Telah Dihapus');
    }
}
