<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;

    protected $table = 'aduans';
    protected $guarded = [];

    PUBLIC CONST STATUS_NEED_REVIEW = 'need_review';
    PUBLIC CONST STATUS_REJECTED = 'rejected';
    PUBLIC CONST STATUS_APPROVED = 'approved';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getStatusAttribute(): string
    {
        return match ($this->attributes['status_aduan']) {
            self::STATUS_NEED_REVIEW => 'Perlu di Tinjau',
            self::STATUS_APPROVED => 'Disetujui',
            self::STATUS_REJECTED => 'Ditolak',
        };
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
}
