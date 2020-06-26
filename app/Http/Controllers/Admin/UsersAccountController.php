<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\User;

class UsersAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'User Account',
            'nav'   => 'administrator',
            'item'  => User::find(Auth::user()->id),
        ];

        return view('admin.pages.users-account.index', $data);
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
        //
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
            'title' => 'User Account',
            'nav' => '',
            'item'  => User::find(Auth::user()->id),
        ];

        return view('admin.pages.users-account.edit', $data);
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
            'name'      => "required|string|max:255",
            'username'  => "required|string|max:255",
            'email'     => "required|string|email|max:255",
        ], [
            "name.required"      => "nama tidak boleh kosong",
            "name.max"           => "nama max: 255 karakter",
            "username.required"  => "username tidak boleh kosong",
            "username.max"       => "username max: 255 karakter",
            "email.required"     => "email tidak boleh kosong",
            "email.email"        => "email harus valid",
            "email.max"          => "email max: 255 karakter",
        ]);

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput();
        } else {
            $user = User::where('username', '=', $request->username)->first();

            if(is_null($user) || $user->username == Auth::user()->username) {

                if( !is_null(User::where('email', $request->email)->first()) &&  $request->email != Auth::user()->email ) {
                    return redirect()->back()
                                    ->withErrors($validation)
                                    ->withInput()
                                    ->with('wrongEmail', 'Email telah digunakan')->withInput();
                }

                $cek = Hash::check($request->password, Auth::user()->password);

                if($cek) {
                    $akun = Auth::user();
                    $akun->update([
                        'name' => $request->name,
                        'username' => $request->username,
                        'email' => $request->email,
                    ]);

                    return redirect('/app-admin/users/account')->with('success', 'profil telah diubah');
                } else {
                    return redirect()->back()
                                ->with('wrongPassword', 'konfirmasi password salah')
                                ->withInput();
                }
            } else {
                return redirect()->back()
                                ->with('wrongUsername', 'username sudah digunakan')
                                ->withInput();
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
        //
    }


    public function passwordEdit()
    {
        $data = [
            'title' => 'User Account',
            'nav'   => 'administrator',
            'item' => Auth::user(),
        ];

        return view('admin.pages.users-account.edit-password', $data);
    }

    public function passwordUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'new_password' => ['required', 'string', 'min:8'],
        ], [
            'new_password.required' => 'password tidak boleh kosong',
            'new_password.min' => 'password minimal 8 karakter',
        ]);

        // Jika Validasi Gagal Maka akan dikembalikan ke halaman sebelumnya
        if ( $validator->fails() ) {
            return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
        } else {
            // cek apakah password baru dan konfirmasi password baru itu sama
            if( $request->new_password != $request->new_password_confirmation ) {
                return redirect()->back()
                        ->with('wrongNewPasswordConfirmation', 'password baru dan ulangi password tidak sama')
                        ->withInput();
            }

            // cek apakah konfirmasi password benar
            if(!Hash::check($request->old_password_confirmation, Auth::user()->password)) {
                return redirect()->back()
                        ->with('wrongOldPasswordConfirmation', 'konfirmasi password salah')
                        ->withInput();
            }

            $user = Auth::user();

            $user->update([
                'password' => Hash::make($request->new_password)
            ]);

            return redirect('/app-admin/users/account')->with('success', 'password telah diubah');
        }
    }
}
