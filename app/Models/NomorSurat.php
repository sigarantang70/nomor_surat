<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomorSurat extends Model
{
    use HasFactory;
    protected $table = 'tbl_nomor_surat';
    protected $fillable = ['tgl_surat', 'nomor_surat', 'sub_nomor_surat', 'perihal', 'tgl_permintaan'];
}
