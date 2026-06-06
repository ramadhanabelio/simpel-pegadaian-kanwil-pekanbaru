<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = 'surat_keluar';

    protected $fillable = [
        'nomor_agenda',
        'nomor_surat',
        'tanggal_surat',
        'tujuan_surat',
        'perihal',
        'keterangan',
        'file_surat',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
