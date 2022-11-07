<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MHobi extends Model
{
    use HasFactory;

    protected $table = 'tb_hobby';
    protected $primaryKey = 'hId';
    protected $guarded = [];
}