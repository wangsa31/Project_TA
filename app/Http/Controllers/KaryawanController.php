<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departemen;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    //

    public function Karyawan(){
        $karyawan = Karyawan::all();
        
        return view('karyawan._karyawan',['karyawan'=>$karyawan]);
    }

    public function KaryawanRegister(){
        $departemen = Departemen::all();
        return view('karyawan._karyawanRegister',['departemen' => $departemen]);
    }

    public function KaryaPost(Request $request){
        $credentials = $request->validate(
            [
            'name' => ['required'],
            'tmp_lahir' => ['required'],
            'depart' => ['required'],
            'dates'=> ['required'],
            'almt'=>['required'],
            ],
            [
                'name.required' => 'the field is required',
                'tmp_lahir.required' => 'the field is required',
                'depart.required' => 'the field is required',
                'dates'=>'the field is required',
                'almt'=>'the field is required',
            ]
        );

        $karyawan = new Karyawan;
        $karyawan->nama_karyawan = $request->name;
        $karyawan->departemen_id = $request->depart;
        $karyawan->tempat_lahir = $request->tmp_lahir;
        $karyawan->tanggal_lahir = $request->dates;
        $karyawan->alamat_karyawan = $request->almt;
        $karyawan->save();
        return redirect('/dashboard')->with('success','Data berhasil ditambahkan');


    }

   public function KaryawanDetail($id){
        $karyawan = Karyawan::find($id);

        return view('karyawan._karyawanDetail',['karyawan'=> $karyawan]);
    }

    public function KaryawanEdit($id){
        $karyawan = Karyawan::find($id);
        $departemen = Departemen::all();

        return view('karyawan._karyawanEdit',['karyawan'=> $karyawan, 'departemen'=>$departemen]); 
    }

    public function KaryaEditPost(Request $request){
        $credentials = $request->validate(
            [
            'name' => ['required'],
            'tmp_lahir' => ['required'],
            'depart' => ['required'],
            'dates'=> ['required'],
            'almt'=>['required'],
            ],
            [
                'name.required' => 'the field is required',
                'tmp_lahir.required' => 'the field is required',
                'depart.required' => 'the field is required',
                'dates'=>'the field is required',
                'almt'=>'the field is required',
            ]
        );

        $karyawan = Karyawan::find($request->id);
        $karyawan->nama_karyawan = $request->name;
        $karyawan->departemen_id = $request->depart;
        $karyawan->tempat_lahir = $request->tmp_lahir;
        $karyawan->tanggal_lahir = $request->dates;
        $karyawan->alamat_karyawan = $request->almt;
        $karyawan->save();

        return redirect('/dashboard')->with('success','Data berhasil diubah');
    }

    public function KaryawanDeletePost($id){
        $karyawan = karyawan::find($id);
        $karyawan->delete();
        return redirect('/dashboard')->with('success','Data berhasil Dihapus');
    }
}
