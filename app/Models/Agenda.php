<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = 'agendas';
    protected $guarded = [];

    PUBLIC CONST STATUS_DRAFT = 'draft';
    PUBLIC CONST STATUS_PUBLISHED = 'published';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
