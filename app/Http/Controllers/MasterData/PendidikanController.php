<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\MasterData\MPendidikan;

class PendidikanController extends Controller
{
    public function index(Request $req)
    {
        if (!empty($req->ajax())) {
            $data = MPendidikan::distinct()->select('pddkTempat')->get();

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $buttonEdit = "<button style='margin-right:10px;' onclick='pasienDone(" . $data->bjId . ")' class='btn btn-sm btn-info'><i class='fa fa-check text-white'></i></button>";
                    $buttonDelete = "<button onclick='pasienCancel(" . $data->bjId . ")' class='btn btn-sm btn-danger'><i class='fa fa-times text-white'></i></button>";

                    return $buttonDelete . $buttonEdit;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.master-data.pendidikan.index', [
            'title' => 'Pendidikan'
        ]);
    }
}