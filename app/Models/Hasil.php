<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    protected $table = 'hasil';
    protected $fillable = ['hasil_penilaian','tahun','karyawan_id'];

    public function karyawan()
    {
        return $this->hasOne(Karyawan::class,'id','karyawan_id');
    }
}
