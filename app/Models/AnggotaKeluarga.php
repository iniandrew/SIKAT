<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    use HasFactory;

    protected $table = 'anggota_keluargas';
    protected $guarded = [];

    public function keluarga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }
}
