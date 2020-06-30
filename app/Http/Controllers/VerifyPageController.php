<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyPageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->hasVerifiedEmail()) {
            if($user->hasRole('siswa')) {
                return redirect('/siswa/beranda');
            } elseif($user->hasRole('perusahaan')) {
                return redirect('/perusahaan');
            } ;
        };

        $data = [
            'navLink' => ''
        ];
        return view('verify-page', $data);
    }
}
