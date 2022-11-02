<?php

namespace App\Continuar\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContinuar extends Model
{
    use HasFactory;

    protected $connection = 'mysqlcontinuar';
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $guarded = [];
}