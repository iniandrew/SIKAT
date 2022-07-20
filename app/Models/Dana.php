<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dana extends Model
{
    use HasFactory;

    protected $table = 'danas';
    protected $guarded = [];

    PUBLIC CONST CATEGORY_INCOME = 'income';
    PUBLIC CONST CATEGORY_OUTCOME = 'outcome';

    public function getTransactionDateAttribute(): string
    {
        return Carbon::parse($this->attributes['tgl_transaksi'])->translatedFormat('d F Y');
    }

    public function getAmountAttribute(): string
    {
        return number_format($this->attributes['total'], 0, ',','.');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
