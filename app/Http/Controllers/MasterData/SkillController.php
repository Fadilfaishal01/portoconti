<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Models\MasterData\MSkill;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    public function index(Request $req)
    {
        if (!empty($req->ajax())) {
            $data = MSkill::get();

            return DataTables::of($data)
                ->addColumn('kemampuanStatus', function ($data) {
                    if ($data->sStatus == '0') {
                        return "<i class='fas fa-check text-white bg-info p-2 rounded-circle'></i>";
                    } else {
                        return "<i class='fas fa-times text-white bg-danger p-2 rounded-circle'></i>";
                    }
                })
                ->addColumn('action', function ($data) {
                    $buttonEdit = "<button onclick='editData(" . $data->sId . ")' class='btn btn-sm btn-info'><i class='fa fa-pencil text-white'></i></button>";
                    $buttonDelete = "<button onclick='deleteData(" . $data->sId . ")' class='btn btn-sm btn-primary'><i class='fa fa-trash-alt text-white'></i></button>";

                    return $buttonEdit . ' ' . $buttonDelete;
                })
                ->rawColumns(['action', 'kemampuanStatus'])
                ->make(true);
        }

        return view('admin.master-data.skill.index', [
            'title' => 'Kemampuan'
        ]);
    }

    public function getDataById(Request $req)
    {
        try {
            $codeApi = 200;
            $data = MSkill::find($req->id);
        } catch (\Throwable $th) {
            $codeApi = 500;
            $data['title']        = "Gagal";
            $data['status']       = "error";
            $data['timer']        = 3500;
            $data['message']      = "Terjadi Kesalahan Pada Server!";
            Log::error('Error Get Data Kemampuan : ' . $th->getMessage());
        }

        return response()->json($data, $codeApi);
    }

    public function saveOrUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama'          => ['required'],
            'logo'          => ['required'],
        ], [
            'nama.required' => 'Nama Kemampuan Wajib Diisi!',
            'logo.required' => 'Logo Kemampuan Wajib Diisi!',
        ]);

        try {
            $codeApi = 200;

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
                exit;
            }

            if (empty($req->idKemampuan)) {

                $peran                = new MSkill;
                $peran->sNama         = $req->nama;
                $peran->sLogo         = $req->logo;
                $peran->sStatus       = $req->status == 'on' ? '0' : '1';
                $peran->save();

                $data['title']        = "Berhasil";
                $data['status']       = "success";
                $data['timer']        = 3500;
                $data['message']      = "Menambah Data Kemampuan!";
            } else {
                $peran                = MSkill::find($req->idKemampuan);
                $peran->sNama         = $req->nama;
                $peran->sLogo         = $req->logo;
                $peran->sStatus       = $req->status == 'on' ? '0' : '1';
                $peran->save();

                $data['title']        = "Berhasil";
                $data['status']       = "success";
                $data['timer']        = 3500;
                $data['message']      = "Mengubah Data Kemampuan!";
            }
        } catch (\Throwable $th) {
            $codeApi = 500;

            $data['title']      = "Gagal";
            $data['status']     = "error";
            $data['timer']      = 10000;
            $data['message']    = 'Terjadi Kesalahan Pada Server! Mohon Hubungi Admin';
            Log::info('Error Menambahkan / Mengubah Kemampuan : ' . $th->getMessage());
        }

        return response()->json($data, $codeApi);
    }

    public function delete(Request $req)
    {
        try {
            $codeApi = 200;
            $kemampuan = MSkill::find($req->id)->delete();

            $data['title'] = "Berhasil";
            $data['status'] = "success";
            $data['timer'] = 3500;
            $data['message'] = 'Menghapus Data Kemampuan!';
        } catch (\Throwable $th) {
            $codeApi = 500;
            $data['title']   = "Failed";
            $data['status']  = "error";
            $data['timer']   = 10000;
            $data['message'] = 'Terjadi Kesalahan Pada Server! Mohon Hubungi Admin';
            Log::info('Error Menghapus Kemampuan : ' . $th->getMessage());
        }

        return response()->json($data, $codeApi);
    }
}