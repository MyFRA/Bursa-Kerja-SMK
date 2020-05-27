<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Pelamaran;

class LamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'lamaran' => Pelamaran::where('siswa_id', Auth::user()->siswa->id)->get(),
        ];

        return view('siswa.lamaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'pelamaran' => Pelamaran::find(decrypt($id))
        ];

        return view('siswa.lamaran.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'pelamaran' => Pelamaran::find(decrypt($id)),
        ];

        return view('siswa.lamaran.edit', $data);
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
        $pelamaran = Pelamaran::find(decrypt($id));

        $pelamaran->update([
            'proposal_pelamaran' => $request->proposal_pelamaran
        ]);

        return redirect('/siswa/lamaran')->with('success', 'Pelamaran ' . $pelamaran->lowongan->jabatan . ' telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pelamaran::find(decrypt($id));
        Pelamaran::destroy(decrypt($id));
        return back()->with('success', 'Pelamaran ' . $data->lowongan->jabatan . ' telah dihapus');
    }
}
