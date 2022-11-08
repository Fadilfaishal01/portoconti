<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MRole;
use App\Models\MProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Continuar\Models\UserContinuar;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function authCallbackGoogle()
    {
        try {
            $user_google    = Socialite::driver('google')->user();
            $user           = User::where('email', $user_google->getEmail())->first();

            if ($user != null) {
                \auth()->login($user, true);
                return redirect()->route('dashboard.index')->with('successLogin', 'Selamat Datang ' . $user_google->name);
            } else {
                $dataProfile = MProfile::create([
                    'pNama'         => $user_google->name,
                    'pTanggalLahir' => 'null',
                    'pTelepon'      => 'null',
                ]);

                $create = User::Create([
                    'pId'               => $dataProfile->pId,
                    'rId'               => MRole::where('rNama', 'User')->first()->rId,
                    'email'             => $user_google->email,
                    'password'          => Hash::make($user_google->email),
                    'tokenUser'         => rand(10, 1000),
                    'google_id'         => $user_google->getId(),
                ]);

                auth()->login($create, true);
                return redirect()->route('dashboard.index')->with('successLogin', 'Selamat Datang ' . $user_google->name);
            }
        } catch (\Exception $e) {
            Log::error('Login Google Error : ' . $e);
            return redirect()->route('login')->with('errorLogin', 'Terjadi Kesalahan Pada Server!');
        }
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
            $data['title']          = "Gagal";
            $data['status']         = "error";
            $data['timer']          = 5000;
            $data['message']        = "Kegagalan Validasi!";
            $data['errorValidasi']  = $validateData->errors();

            return response()->json($data, 400);
            exit;
        }

        if (Auth::attempt([
            'email' => $req->email,
            'password' => $req->password
        ])) {
            $codeApi = 200;
            $req->session()->regenerate();
            $data['title']          = "Berhasil";
            $data['status']         = "success";
            $data['timer']          = 2500;
            $data['message']        = "Selamat Datang " . Auth::user()->getProfile->pNama;
            $data['errorValidasi']  = [];
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
                    $codeApi = 200;
                    $req->session()->regenerate();
                    $data['title']          = "Berhasil";
                    $data['status']         = "success";
                    $data['timer']          = 2500;
                    $data['message']        = "Selamat Datang " . Auth::user()->getProfile->pNama;
                    $data['errorValidasi']  = [];
                }
            } else {
                $codeApi = 400;
                $data['title']          = "Gagal";
                $data['status']         = "error";
                $data['timer']          = 5000;
                $data['message']        = "Masukan email dan kata sandi yang benar!";
                $data['errorValidasi']  = [];
            }
        }

        return response()->json($data, $codeApi);
    }

    public function authCallbackFacebook()
    {
        try {
            $newUser = [];
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect()->route('dashboard.index')->with('successLogin', 'Selamat Datang ' . $finduser->getProfile->pNama);
            } else {

                $cekEmail = User::where('email', $user->email)->first();

                if (!empty($cekEmail)) {
                    User::where('email', $cekEmail->email)->update(['facebook_id' => $user->id]);
                    $newUser = User::where('email', $cekEmail->email)->first();
                } else {
                    $dataProfile = MProfile::create([
                        'pNama'         => $user->name,
                        'pTanggalLahir' => 'null',
                        'pTelepon'      => 'null',
                    ]);

                    $newUser = User::create([
                        'pId'           => $dataProfile->pId,
                        'rId'           => MRole::where('rNama', 'User')->first()->rId,
                        'email'         => $user->email,
                        'facebook_id'   => $user->id,
                        'tokenUser'     => rand(10, 1000),
                        'password'      => Hash::make($user->email),
                    ]);
                }

                \auth()->login($newUser, true);

                return redirect()->route('dashboard.index')->with('successLogin', 'Selamat Datang ' . $finduser->getProfile->pNama);
            }
        } catch (\Exception $e) {
            Log::error('Login Facebook Error : ' . $e);
            return redirect()->route('login')->with('errorLogin', 'Terjadi Kesalahan Pada Server!');
        }
    }

    public function registerAccount(Request $req)
    {
        $codeApi = 200;
        $validateData = Validator::make($req->all(), [
            'fullname'                      => 'required|string',
            'emailRegister'                 => 'required|email:dns|unique:users,email',
            'passwordRegister'              => 'required|min:8|same:passwordKonfirmasiRegister',
            'passwordKonfirmasiRegister'    => 'required|min:8'
        ], [
            'fullname.required'                     => 'Nama Lengkap Harus Diisi!',
            'fullname.string'                       => 'Nama Lengkap Hanya Bisa Huruf!',
            'emailRegister.required'                => 'Email Harus Diisi!',
            'emailRegister.email'                   => 'Masukan Email Yang Valid!',
            'emailRegister.unique'                  => 'Email sudah digunakan!',
            'passwordRegister.required'             => 'Kata Sandi Harus Diisi!',
            'passwordRegister.min'                  => 'Kata Sandi Minimal 8 Karakter!',
            'passwordRegister.same'                 => 'Konfirmasi Kata Sandi Tidak Sesuai!',
            'passwordKonfirmasiRegister.required'   => 'Konfirmasi Kata Sandi Harus Diisi!',
            'passwordKonfirmasiRegister.min'        => 'Konfirmasi Kata Sandi Minimal 8 Karakter!',
        ]);

        if ($validateData->fails()) {
            $data['title']          = "Gagal";
            $data['status']         = "error";
            $data['timer']          = 5000;
            $data['message']        = "Kegagalan Validasi!";
            $data['errorValidasi']  = $validateData->errors();

            return response()->json($data, 400);
            exit;
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

            $data['title']          = "Berhasil";
            $data['status']         = "success";
            $data['timer']          = 2500;
            $data['message']        = "Akun berhasil dibuat, silahkan login kembali";
            $data['errorValidasi']  = [];
        } catch (\Throwable $th) {
            $codeApi = 500;
            $data['title']          = "Gagal";
            $data['status']         = "error";
            $data['timer']          = 5000;
            $data['message']        = "Terjadi Kesalahan Pada Server";
            Log::error('Error Registrasi Akun : ' . $th->getMessage());
            $data['errorValidasi']  = [];
        }

        return response()->json($data, $codeApi);
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