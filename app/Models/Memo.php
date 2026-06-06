<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $fillable = [
        'nomor_memo',
        'tanggal',
        'tujuan',
        'perihal',
        'isi_memo',
        'status',
        'lampiran',
        'user_id',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
