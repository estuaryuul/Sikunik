<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    protected $table = 'kunjungan';
    protected $fillable = ['user_id', 'instansi', 'tujuan', 'name', 'jabatan', 'jenis', 'jumlah', 'hp', 'surel', 'tanggal', 'waktu', 'pdf_file', 'mentor', 'ulasan', 'status', 'mail'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
