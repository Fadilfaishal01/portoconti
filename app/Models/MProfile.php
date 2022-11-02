<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MProfile extends Model
{
    use HasFactory;

    protected $table = 'tb_profile';
    protected $primaryKey = 'pId';
    protected $guarded = [];
}