<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat extends Model
{
    use HasFactory;
    protected $table = "riwayat";
    protected $fillable = ['judul', 'tipe', 'tanggal_mulai', 'tanggal_akhir', 'info1', 'info2', 'info3', 'isi'];

    protected $appends = ['tanggal_mulai_indo', 'tanggal_akhir_indo'];

    public function getTanggalMulaiIndoAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_mulai'])->translatedFormat('d F Y');
    }
    public function getTanggalAkhirIndoAttribute()
    {
        if ($this->attributes['tanggal_akhir']) {
            return Carbon::parse($this->attributes['tanggal_akhir'])->translatedFormat('d F Y');
        } else {
            return 'Present';
        }
    }
}
