<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use App\User;

class DaftarPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'items' => User::orderBy('level', 'ASC')->get(),
            'title' => 'Daftar Pengguna',
            'nav'   => 'daftar-pengguna',
        );

        return view('admin.pages.daftar-pengguna.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Pengguna',
            'nav'   => 'tambah-pengguna',
        );

        return view('admin.pages.daftar-pengguna.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Cek Apakah Password dan Konfirmasi Password Sama
        if( $request->password != $request->confPassword ) return back()
                                                                  ->with('gagal', 'Konfirmasi Password Tidak Sama')
                                                                  ->withInput();  
        $validation = Validator::make($request->all(), [
            'name'      => "required|string|max:255",
            'username'  => "required|string|max:255|unique:users",
            'email'     => "required|string|email|max:255|unique:users",
            'password'  => "required|string|min:8",
            'level'     => "required|in:superadmin,admin,guru,perusahaan"
        ], [
            "name.required"      => "nama tidak boleh kosong",
            "name.max"           => "nama max: 255 karakter",
            "username.required"  => "username tidak boleh kosong",
            "username.max"       => "username max: 255 karakter",
            "username.unique"    => "username sudah digunakan",
            "email.required"     => "email tidak boleh kosong",
            "email.email"        => "email harus valid",
            "email.max"          => "email max: 255 karakter",
            "email.unique"       => "email sudah digunakan",
            "level.required"     => "level tidak boleh kosong",
            "level.in"           => "level harus diantara superadmin, admin, guru, dan perusahaan",
            "password.required"  => "password tidak boleh kosong",
            "password.min"       => 'password minimal 8 karakter',
        ]);

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput();
        } else {
            $data = User::create([
                'name'      => $request['name'],
                'username'  => $request['username'],
                'email'     => $request['email'],
                'password'  => Hash::make($request['password']),
                'level'     => $request['level'],
            ]);

            return redirect('/app-admin/daftar-pengguna/' . encrypt($data->id))->with('success', "Pengguna $request->name telah ditambahkan");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'title' => 'Profil',
            'nav'   => 'daftar-pengguna',
            'item'  => User::find(decrypt($id)),
        );

        return view('admin.pages.daftar-pengguna.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
