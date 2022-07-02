<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatans';
    protected $guarded = [];

    PUBLIC CONST SUPER_ADMIN = 1;
    PUBLIC CONST ADMIN = 2;
    PUBLIC CONST BENDAHARA = 3;
    PUBLIC CONST WARGA = 4;
}
