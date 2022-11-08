<?php

namespace App\Http\Controllers;

use App\Models\MProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AkunController extends Controller
{
    public function profile()
    {
        return view('admin.profile.index', [
            'title' => 'Profile'
        ]);
    }

    public function ubahKataSandi()
    {
        return view('admin.ubah-kata-sandi.index', [
            'title' => 'Ubah Kata Sandi'
        ]);
    }

    public function updateKataSandi(Request $req)
    {
        $codeApi = 200;
        $validateData = Validator::make($req->all(), [
            'passwordBaru'                      => 'required|min:8',
            'konfirmasiPasswordBaru'            => 'required|same:passwordBaru',
        ], [
            'passwordBaru.required'             => 'Kata Sandi Baru Harus Diisi!',
            'passwordBaru.min'                  => 'Kata Sandi Baru Minimal 8 Karakter!',
            'konfirmasiPasswordBaru.required'   => 'Konfirmasi Kata Sandi Baru Harus Diisi!',
            'konfirmasiPasswordBaru.same'       => 'Konfirmasi Kata Sandi Baru Tidak Sama!',
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
            User::where('email', Auth::user()->email)->update([
                'password' => Hash::make($req->passwordBaru),
            ]);

            $data['title']          = "Berhasil";
            $data['status']         = "success";
            $data['timer']          = 2500;
            $data['message']        = "Kata sandi telah diubah!";
        } catch (\Throwable $th) {
            $codeApi = 500;
            $data['title']          = "Gagal";
            $data['status']         = "error";
            $data['timer']          = 5000;
            $data['message']        = "Terjadi Kesalahan Pada Server";
            Log::error('Ubah Kata Sandi : ' . $th->getMessage());
            $data['errorValidasi']  = [];
        }

        return response()->json($data, $codeApi);
    }

    public function updateProfile(Request $req)
    {
        $codeApi = 200;
        $validateData = Validator::make($req->all(), [
            'email'                 => 'required',
            'nama'                  => 'required',
            'tanggalLahir'          => 'required',
            'telepon'               => 'required',
            'jenisKelamin'          => 'required',
        ], [
            'email.required'        => 'Email Harus Diisi!',
            'nama.required'         => 'Nama Harus Diisi!',
            'tanggalLahir.required' => 'Tanggal Lahir Harus Diisi!',
            'jenisKelamin.required' => 'Jenis Kelamin Harus Diisi!',
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
            $getDataUser = User::where('email', $req->email)->first();
            MProfile::find($getDataUser->pId)->update([
                'pNama'         => $req->nama,
                'pTanggalLahir' => $req->tanggalLahir,
                'pTelepon'      => $req->telepon,
                'pJenisKelamin' => $req->jenisKelamin,
            ]);

            $data['title']          = "Berhasil";
            $data['status']         = "success";
            $data['timer']          = 2500;
            $data['message']        = "Profile telah diubah!";
        } catch (\Throwable $th) {
            $codeApi = 500;
            $data['title']          = "Gagal";
            $data['status']         = "error";
            $data['timer']          = 5000;
            $data['message']        = "Terjadi Kesalahan Pada Server";
            Log::error('Ubah Profile : ' . $th->getMessage());
            $data['errorValidasi']  = [];
        }

        return response()->json($data, $codeApi);
    }
}