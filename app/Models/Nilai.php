<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';
    protected $fillable = ['karyawan_id','kriteria_1','kriteria_2','kriteria_3','kriteria_4','kriteria_5','kriteria_6','kriteria_7'];

    public function karyawan()
    {
        return $this->hasOne(Karyawan::class,'id');
    }
}
