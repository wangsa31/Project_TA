<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';
    protected $fillable = ['nama_karyawan','departemen_id','tempat_lahir','tanggal_lahir','alamat_karyawan'];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function nilai()
    {
        return $this->belongsTo(Nilai::class,'id','karyawan_id');
    }


    
}
