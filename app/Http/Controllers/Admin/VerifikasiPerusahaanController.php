<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

use Artesaos\SEOTools\Facades\SEOTools;

use DB;
use App\User;
use App\Models\BidangKeahlian;
use App\Models\ProgramKeahlian;
use App\Models\Perusahaan;
use App\Models\Lowongan;

class VerifikasiPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function menungguVerifikasi()
    {
        $data = array(
            'items' => User::join('model_has_permissions', 'users.id', '=', 'model_has_permissions.model_id')
                                ->where('model_has_permissions.permission_id', 2)
                                ->get(),
            'title' => 'Perusahaan Menunggu Verifikasi',
            'nav'   => 'menunggu-verifikasi',
        );

        return view('admin.pages.perusahaan.menunggu-verifikasi', $data);
    }


    public function terimaVerifikasi($id)
    {
        $user = User::find(decrypt($id));

        $user->revokePermissionTo('menunggu verifikasi diterima');
        $user->givePermissionTo('terverifikasi');

        return back()->with('success', 'Perusahaan ' . $user->name . ' telah terverifikasi');
    }

    public function tolakVerifikasi($id)
    {
        $user = User::find(decrypt($id));
        $permissions = DB::table('model_has_permissions')
                            ->select('permission_id')
                            ->where('model_type', 'App\User')
                            ->where('model_id', decrypt($id))->get();

        foreach ($permissions as $permission) {
            $user->revokePermissionTo($permission->permission_id);
        }

        $roles = DB::table('model_has_roles')
                            ->select('role_id')
                            ->where('model_type', 'App\User')
                            ->where('model_id', decrypt($id))->get();

        foreach ($roles as $role) {
            $user->removeRole($role->role_id);
        }

        $perusahaan = Perusahaan::where('user_id', decrypt($id))->get();

        foreach ($perusahaan as $prhs) {
            Perusahaan::destroy($prhs->id);
        }

        User::destroy(decrypt($id));

        return back()->with('success', 'Perusahaan ' . $user->name . ' telah ditolak kerjasama');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function terverifikasi()
    {
        $data = array(
            'items' => Perusahaan::orderBy('created_at', 'DESC')->get(),
            'title' => 'Perusahaan Terverifikasi',
            'nav'   => 'terverifikasi',
        );

        return view('admin.pages.perusahaan.terverifikasi', $data);
    }

    public function lihat($id)
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

        $data = [
            'user'       => Auth::user(),
            'perusahaan' => Perusahaan::find(decrypt($id)),
            'jmlLowongan' => Lowongan::where('perusahaan_id', decrypt($id))
                                    ->count(),
        ];  

        return view('pages.portal-perusahaan.show', $data);
    }
}
