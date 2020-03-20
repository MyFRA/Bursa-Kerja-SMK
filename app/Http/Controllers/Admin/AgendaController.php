<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

use App\Models\Agenda;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'items' => Agenda::orderBy('updated_at', 'DESC')->get(),
            'title' => 'Agenda',
            'nav'   => 'agenda',
        );

        return view('admin.pages.agenda.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Agenda',
            'nav'   => 'agenda'
        );
        return view('admin.pages.agenda.create', $data);
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
            'pelaksanaan' => 'max:255',
            'lokasi'      => 'max:255',
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
        }else {
            if ( $request->file('image') == null ) {
                $jawaban = $this->uploadAgenda($request);
            } else {
                $jawaban = $this->uploadAgenda($request, $request->file('image'));
            }

            if ($jawaban) {
                return redirect('/app-admin/agenda')
                       ->with('success', "Agenda $request->judul Telah Ditambahkan");
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
            'title' => 'Agenda',
            'nav'   => 'agenda',
            'item'  => Agenda::find(decrypt($id)),
        );

        return view('/admin.pages.agenda.edit', $data);
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
            'pelaksanaan' => 'max:255',
            'lokasi'      => 'max:255',
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
        }else {
            if ( $request->file('image') == null ) {
                $jawaban = $this->updateAgenda($request, $id);
            } else {
                $jawaban = $this->updateAgenda($request, $id, $request->file('image'));
            }

            if ($jawaban) {
                return redirect('/app-admin/agenda')
                       ->with('success', "Agenda $request->judul Telah Diubah");
            } else {
                return redirect()->back()
                             ->withErrors($validator)
                             ->withInput()
                             ->with('alert', true);
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
        $data = Agenda::find(decrypt($id));
        $nama = $data->judul;
        $exists = Storage::disk('local')->exists('/public/assets/agenda/' . $data->image);
        if ( $exists === true ) {
            Storage::disk('local')->delete('/public/assets/agenda/' . $data->image);
        }
        Agenda::destroy(decrypt($id));

        return back()->with('success', "Agenda $nama Telah Dihapus");
    }

    public function uploadAgenda($request, $fileGambar = null)
    {
        if ( is_null($fileGambar) ) {
            Agenda::create([
                'judul' => $request->judul,
                'link'  => Str::slug($request->judul),
                'pelaksanaan' => $request->pelaksanaan,
                'deskripsi' => $request->deskripsi,
                'lokasi'      => $request->lokasi,
                'status'    => $request->status
            ]);
            return true;
        }

        else {
            $ekstensiValid = ['jpeg', 'png', 'bmp', 'gif', 'svg','webp', 'jpg'];
            if (!in_array($fileGambar->getClientOriginalExtension(), $ekstensiValid)) {
                return false;
            }

            else {
                $namaGambar = explode('.', $fileGambar->getClientOriginalName());
                $namaGambar = $namaGambar[0] . '-' . time() . '.' . $fileGambar->getClientOriginalExtension();
                $fileGambar->storeAs('public/assets/agenda', $namaGambar);

                Agenda::create([
                    'judul' => $request->judul,
                    'link'  => Str::slug($request->judul),
                    'pelaksanaan' => $request->pelaksanaan,
                    'deskripsi' => $request->deskripsi,
                    'lokasi'      => $request->lokasi,
                    'status'    => $request->status,
                    'image'      => $namaGambar,
                ]);

                return true;
            }
        }
    }

    public function updateAgenda($request, $id, $fileGambar = null)
    {
        if ( is_null($fileGambar) ) {
            $update = Agenda::find(decrypt($id));
            $update->judul = $request->judul;
            $update->pelaksanaan = $request->pelaksanaan;
            $update->link = Str::slug($request->judul);
            $update->lokasi = $request->lokasi;
            $update->status = $request->status;
            $update->deskripsi = $request->deskripsi;
            $update->save();

            return true;
        }

        else {
            $agendaById = Agenda::find(decrypt($id));
            $ekstensiValid = ['jpeg', 'png', 'bmp', 'gif', 'svg','webp', 'jpg'];
            if (!in_array($fileGambar->getClientOriginalExtension(), $ekstensiValid)) {
                return false;
            }
            else {
                $exists = Storage::disk('local')->exists('/public/assets/agenda/' . $agendaById->image);
                if ( $exists === true ) {
                    Storage::disk('local')->delete('/public/assets/agenda/' . $agendaById->image);
                }

                $namaGambar = explode('.', $fileGambar->getClientOriginalName());
                $namaGambar = $namaGambar[0] . '-' . time() . '.' . $fileGambar->getClientOriginalExtension();
                $fileGambar->storeAs('public/assets/agenda', $namaGambar);

                $update = Agenda::find(decrypt($id));
                $update->judul = $request->judul;
                $update->pelaksanaan = $request->pelaksanaan;
                $update->link = Str::slug($request->judul);
                $update->lokasi = $request->lokasi;
                $update->status = $request->status;
                $update->deskripsi = $request->deskripsi;
                $update->image = $namaGambar;
                $update->save();

                return true;
            }
        }
    }
}
