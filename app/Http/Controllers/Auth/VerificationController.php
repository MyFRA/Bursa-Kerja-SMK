<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::EMAILVERIFY;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request)
    {

        if($request->user()->hasVerifiedEmail()) {
            if($user->hasRole('siswa')) {
                $this->redirectTo = RouteServiceProvider::BERANDA;
            } elseif($user->hasRole('perusahaan')) {
                $this->redirectTo = RouteServiceProvider::PERUSAHAAN;
            } ;

            return redirect($this->redirectPath());
        } else {
            return redirect('/email/verify');
        }
    }

        /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function verify(Request $request)
    {
        $user = Auth::user();

        if (! hash_equals((string) $request->route('id'), (string) $request->user()->getKey())) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($request->user()->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($request->user()->hasVerifiedEmail()) {
            if($user->hasRole('siswa')) {
                $this->redirectTo = RouteServiceProvider::BERANDA;
            } elseif($user->hasRole('perusahaan')) {
                $this->redirectTo = RouteServiceProvider::PERUSAHAAN;
            } ;
            
            return redirect($this->redirectPath());
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        // Condition 

        if($user->hasRole('siswa')) {
            $this->redirectTo = RouteServiceProvider::BERANDA;
        } elseif($user->hasRole('perusahaan')) {
            $this->redirectTo = RouteServiceProvider::PERUSAHAAN;
        } ;

        return redirect($this->redirectPath())->with('verified', true);
    }
}
