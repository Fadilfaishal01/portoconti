<?php

namespace App\Http\Controllers;

use App\Continuar\Models\UserContinuar;
use App\Models\MProfile;
use App\Models\MRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authLogin(Request $req)
    {
        $validateData = Validator::make($req->all(), [
            'email' => 'required|email:dns',
            'password' => 'required|min:8'
        ], [
            'email.required'    => 'Email Harus Diisi!',
            'email.email'       => 'Masukan Email yang valid',
            'password.required' => 'Kata Sandi Harus Diisi!',
            'password.min'      => 'Kata Sandi Minimal 8 Karakter!'
        ]);

        if ($validateData->fails()) {
            return redirect()->back()->with('loginError', true)->withErrors($validateData, 'login');
        }

        if (Auth::attempt([
            'email' => $req->email,
            'password' => $req->password
        ])) {
            $req->session()->regenerate();
            return redirect()->route('dashboard.index')->with('loginSuccess', 'Selamat Datang di Contiporto ' . Auth::user()->getProfile->pNama);
        } else {
            // Cek directory akun di continuar jika ada maka masuk menggunakan akun continuar
            $cekDataUserContinuar = UserContinuar::where('email', $req->email)->first();

            if (!empty($cekDataUserContinuar)) {
                $profile = MProfile::create([
                    'pNama' => $cekDataUserContinuar->name,
                    'pTanggalLahir' => 'Null',
                    'pTelepon' => 'Null',
                    'pJenisKelamin' => 'L'
                ]);

                User::create([
                    'pId'               => $profile->pId,
                    'rId'               => MRole::where('rNama', 'Admin')->first()->rId,
                    'email'             => $cekDataUserContinuar->email,
                    'email_verified_at' => $cekDataUserContinuar->email_verified_at,
                    'password'          => $cekDataUserContinuar->password,
                    'tokenUser'         => rand(10, 1000),
                    'directoryLogin'    => 'active',
                    'remember_token'    => $cekDataUserContinuar->remember_token,
                ]);

                if (Auth::attempt([
                    'email' => $req->email,
                    'password' => $req->password
                ])) {
                    $req->session()->regenerate();
                    return redirect()->route('dashboard.index')->with('loginSuccess', 'Selamat Datang di Contiporto ' . Auth::user()->getProfile->pNama);
                } else {
                    return back()->with('loginError', true);
                }
            }
        }

        return back()->with('loginError', true);
    }

    public function registerAccount(Request $req)
    {
        $validateData = Validator::make($req->all(), [
            'fullname'                      => 'required|string',
            'emailRegister'                 => 'required|email:dns',
            'passwordRegister'              => 'required|min:8|same:passwordKonfirmasiRegister',
            'passwordKonfirmasiRegister'    => 'required|min:8'
        ], [
            'fullname.required'                     => 'Nama Lengkap Harus Diisi!',
            'fullname.string'                       => 'Nama Lengkap Hanya Bisa Huruf!',
            'emailRegister.required'                => 'Email Harus Diisi!',
            'emailRegister.email'                   => 'Masukan Email Yang Valid!',
            'passwordRegister.required'             => 'Kata Sandi Harus Diisi!',
            'passwordRegister.min'                  => 'Kata Sandi Minimal 8 Karakter!',
            'passwordRegister.same'                 => 'Konfirmasi Kata Sandi Tidak Sesuai!',
            'passwordKonfirmasiRegister.required'   => 'Konfirmasi Kata Sandi Harus Diisi!',
            'passwordKonfirmasiRegister.min'        => 'Konfirmasi Kata Sandi Minimal 8 Karakter!',
        ]);

        if ($validateData->fails()) {
            return redirect()->back()->with('register', 'Validasi Gagal')->withErrors($validateData, 'register');
        }

        try {
            $profile = MProfile::create([
                'pNama' => $req->fullname,
                'pTanggalLahir' => 'Null',
                'pTelepon' => 'Null',
                'pJenisKelamin' => 'L'
            ]);

            User::create([
                'pId'               => $profile->pId,
                'rId'               => MRole::where('rNama', 'User')->first()->rId,
                'email'             => $req->emailRegister,
                'password'          => Hash::make($req->passwordRegister),
                'tokenUser'         => rand(10, 1000),
            ]);

            $response = redirect()->back()->with('success', 'Register Account Successfully!');
        } catch (\Throwable $th) {
            $response = redirect()->back()->with('register', 'Register Gagal ' . $th->getMessage());
        }

        return $response;
    }

    public function lupaPassword()
    {
    }

    public function logout()
    {
        Auth::logout();
        session_unset();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}