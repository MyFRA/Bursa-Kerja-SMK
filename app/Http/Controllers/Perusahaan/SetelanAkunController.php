<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOTools;


use App\User;

class SetelanAkunController extends Controller
{
    public function getSeo()
    {
        SEOTools::setTitle('SMK Bisa Kerja | SMK Negeri 1 Bojongsari', false);
        SEOTools::setDescription('Portal lowongan kerja yang disediakan untuk para pencari pekerjaan bagi lulusan SMK/SMA sederajat');
        SEOTools::setCanonical(URL::current());
        SEOTools::metatags()
            ->setKeywords('Lowongan Kerja, Lulusan SMA/SMK, SMK Negeri 1 Bojongsari, Purbalingga, Bursa Kerja, Portal Lowongan Kerja');
        SEOTools::opengraph()
            ->setUrl(URL::current())
            ->addProperty('type', 'homepage');
        SEOTools::twitter()->setSite('@smkbisakerja');
        SEOTools::jsonLd()->addImage(asset('img/logo.png'));
    }

    public function index()
    {
        $this->getSeo();

        $data = [
            'nav'   => 'profil',
            'user' => Auth::user(),
        ];

        return view('perusahaan.setelan-akun.index', $data);
    }

    public function usernameEdit($id)
    {
        $this->getSeo();

        $data = [
            'nav' => 'profil',
            'user' => User::find(decrypt($id)),
        ];

        return view('perusahaan.setelan-akun.edit-username', $data);
    }

    public function usernameUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255'],
        ], [
            'username.required' => 'username tidak boleh kosong',
            'username.max' => 'username maksimal 255 karakter',
        ]);

        // Jika Validasi Gagal Maka akan dikembalikan ke halaman sebelumnya
        if ( $validator->fails() ) {
            return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
        } else {
            $user = User::where('username', '=', $request->username)->first();

            if(is_null($user) || $user->username == Auth::user()->username) {
                $cek = Hash::check($request->password, Auth::user()->password);

                if($cek) {
                    $akun = Auth::user();
                    $akun->update([
                        'username' => $request->username,
                    ]);

                    return redirect('/perusahaan/profil/setelan-akun')->with('success', 'username telah diubah');
                } else {
                    return redirect()->back()
                                ->with('wrongPassword', 'konfirmasi password salah')
                                ->withInput();
                }
            } else {
                return redirect()->back()
                                ->with('wrongUsername', 'username udah digunakan')
                                ->withInput();
            }
        }

    }

    public function passwordEdit($id)
    {
        $this->getSeo();

        $data = [
            'nav' => 'profil',
            'user' => User::find(decrypt($id)),
        ];

        return view('perusahaan.setelan-akun.edit-password', $data);
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

            return redirect('/perusahaan/profil/setelan-akun')->with('success', 'password telah diubah');
        }
    }
}
