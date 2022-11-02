<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\MRole;
use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataRole = [['Admin', '0', 'Role Sebagai Admin'], ['User', '0', 'Role Sebagai User']];

        foreach ($dataRole as $key => $value) {
            MRole::create([
                'rNama'         => $value[0],
                'rStatus'       => $value[1],
                'rDeskripsi'    => $value[2],
                'created_at'    => Carbon::now(),
            ]);
        }
    }
}