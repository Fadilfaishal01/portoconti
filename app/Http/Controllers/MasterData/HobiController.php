<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Models\MasterData\MHobi;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class HobiController extends Controller
{
    public function index(Request $req)
    {
        if (!empty($req->ajax())) {
            $data = MHobi::get();

            return DataTables::of($data)
                ->addColumn('hobiStatus', function ($data) {
                    if ($data->hStatus == '0') {
                        return "<i class='fas fa-check text-white bg-info p-2 rounded-circle'></i>";
                    } else {
                        return "<i class='fas fa-times text-white bg-danger p-2 rounded-circle'></i>";
                    }
                })
                ->addColumn('action', function ($data) {
                    $buttonEdit = "<button onclick='editData(" . $data->hId . ")' class='btn btn-sm btn-info'><i class='fa fa-pencil text-white'></i></button>";
                    $buttonDelete = "<button onclick='deleteData(" . $data->hId . ")' class='btn btn-sm btn-primary'><i class='fa fa-trash-alt text-white'></i></button>";

                    return $buttonEdit . ' ' . $buttonDelete;
                })
                ->rawColumns(['action', 'hobiStatus'])
                ->make(true);
        }

        return view('admin.master-data.hobi.index', [
            'title' => 'Hobi'
        ]);
    }

    public function getDataById(Request $req)
    {
        try {
            $codeApi = 200;
            $data = MHobi::find($req->id);
        } catch (\Throwable $th) {
            $codeApi = 500;
            $data['title']        = "Gagal";
            $data['status']       = "error";
            $data['timer']        = 3500;
            $data['message']      = "Terjadi Kesalahan Pada Server!";
            Log::error('Error Get Data Hobi : ' . $th->getMessage());
        }

        return response()->json($data, $codeApi);
    }

    public function saveOrUpdate(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama'          => ['required'],
            'logo'          => ['required'],
        ], [
            'nama.required' => 'Nama Hobi Wajib Diisi!',
            'logo.required' => 'Logo Hobi Wajib Diisi!',
        ]);

        try {
            $codeApi = 200;

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
                exit;
            }

            if (empty($req->idHobi)) {

                $peran                = new MHobi;
                $peran->hNama         = $req->nama;
                $peran->hLogo         = $req->logo;
                $peran->hStatus       = $req->status == 'on' ? '0' : '1';
                $peran->save();

                $data['title']        = "Berhasil";
                $data['status']       = "success";
                $data['timer']        = 3500;
                $data['message']      = "Menambah Data Hobi!";
            } else {
                $peran                = MHobi::find($req->idHobi);
                $peran->hNama         = $req->nama;
                $peran->hLogo         = $req->logo;
                $peran->hStatus       = $req->status == 'on' ? '0' : '1';
                $peran->save();

                $data['title']        = "Berhasil";
                $data['status']       = "success";
                $data['timer']        = 3500;
                $data['message']      = "Mengubah Data Hobi!";
            }
        } catch (\Throwable $th) {
            $codeApi = 500;

            $data['title']      = "Gagal";
            $data['status']     = "error";
            $data['timer']      = 10000;
            $data['message']    = 'Terjadi Kesalahan Pada Server! Mohon Hubungi Admin';
            Log::info('Error Menambahkan / Mengubah Hobi : ' . $th->getMessage());
        }

        return response()->json($data, $codeApi);
    }

    public function delete(Request $req)
    {
        try {
            $codeApi = 200;
            $hobi = MHobi::find($req->id)->delete();

            $data['title'] = "Berhasil";
            $data['status'] = "success";
            $data['timer'] = 3500;
            $data['message'] = 'Menghapus Data Hobi!';
        } catch (\Throwable $th) {
            $codeApi = 500;
            $data['title']   = "Failed";
            $data['status']  = "error";
            $data['timer']   = 10000;
            $data['message'] = 'Terjadi Kesalahan Pada Server! Mohon Hubungi Admin';
            Log::info('Error Menghapus Hobi : ' . $th->getMessage());
        }

        return response()->json($data, $codeApi);
    }
}