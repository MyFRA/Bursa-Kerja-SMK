<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use App\Models\Siswa;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'nav' => 'dashboard',
            'jmlSiswa' => Siswa::count(),
            'jmlPerusahaan' => Perusahaan::count(),
            'jmlLowongan' => Lowongan::count(),
            'jmlPengguna' => User::count(),
        );
        return view('admin.dashboard', $data);
    }
}
