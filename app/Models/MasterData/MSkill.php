<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MSkill extends Model
{
    use HasFactory;

    protected $table = 'tb_skill';
    protected $primaryKey = 'sId';
    protected $guarded = [];
}