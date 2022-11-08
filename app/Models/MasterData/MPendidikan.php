<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPendidikan extends Model
{
    use HasFactory;

    protected $table = 'tb_pendidikan';
    protected $primaryKey = 'pId';
    protected $guarded = [];
}