<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Nilai;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Hasil;


class PerhitunganController extends Controller
{
    //

    public function Perhitungan(){
        $nilai = Nilai::all();
        return view('perhitungan._perhitungan',['nilai'=>$nilai]);
    }

    public function PerhitunganRegister(){
        $karyawan = Karyawan::all();
        return view('perhitungan._perhitunganRegister',['karyawan'=>$karyawan]);
    }

    public function PerhitunganPost(Request $request){
        $credentials = $request->validate(
            [
                'a1' => 'required',
                'a2' => 'required|numeric|min:1|max:5',
                'a3' => 'required|numeric|min:1|max:5',
                'a4' => 'required|numeric|min:1|max:5',
                'a5' => 'required|numeric|min:1|max:5',
                'a6' => 'required|numeric|min:1|max:5',
                'a7' => 'required|numeric|min:1|max:5',
                'a8' => 'required|numeric|min:1|max:5',
                'a9'=> 'required|numeric|min:1|max:5',
            ],[
                'min' => "harap masukan nilai diantara 1 dan 5",
                'max' => "harap masukan nilai diantara 1 dan 5",
                'required' => "Harap masukan nilai sesuai input",
                'numeric'=> "Harap memasukan data dengan benar"
            ]);

            $data = Nilai::find(2);
           
            // dd($data);
            if($data){
                return redirect("/dashboard")->with("failed","data atas nama ". $data->karyawan->nama_karyawan." sudah tersedia");
            }


            $nilai = new Nilai;
            $nilai->karyawan_id = $request->a1;
            $nilai->kriteria_1 = $request->a2;
            $nilai->kriteria_2 = $request->a3;
            $nilai->kriteria_3 = $request->a4;
            $nilai->kriteria_4 = $request->a5;
            $nilai->kriteria_5 = $request->a6;
            $nilai->kriteria_6 = $request->a7;
            $nilai->kriteria_7 = $request->a8;
            $nilai->kriteria_8 = $request->a9;
            $nilai->save();
            return redirect('/dashboard')->with('success','Data nilai berhasil disimpan');
    }

    
public function PerhitunganHapus($id){
    $karyawan = Nilai::find($id);
    $karyawan->delete();
    
    return redirect('/dashboard')->with('success','Data nilai berhasil Dihapus');
}



public function HitungPost(){
        $nilai = Nilai::all();
        $tampung_baik=[];
        $tampung_buruk=[];
        $alpha = [];
        $R = [];
        $results= [];
        $i =0;

        function keanggotaan_k1_baik($k1){
           
            if($k1<2){
                $nilai = 0;
            }elseif (2<=$k1 && $k1<3) {
                $nilai =  ($k1 - 2) / (3-2);
            }elseif($k1 >= 3){
                $nilai = 1;
            }
    
            return $nilai;
        }
    
        function keanggotaan_k1_buruk($k1){
           
            if($k1>=3){
                $nilai = 0;
            }elseif (2<=$k1 && $k1<3) {
                $nilai =  (3 - $k1) / (3-2);
            }elseif($k1 <= 1){
                $nilai = 1;
            }
    
            return $nilai;
        }
    
        function keanggotaan_k2_baik($k2){
           
            if($k2<2){
                $nilai = 0;
            }elseif (2<=$k2 && $k2<3) {
                $nilai =  ($k2 - 2) / (3-2);
            }elseif($k2 >= 3){
                $nilai = 1;
            }
    
            return $nilai;
        }
    
        function keanggotaan_k2_buruk($k2){
           
            if($k2>=3){
                $nilai = 0;
            }elseif (2<=$k2 && $k2<3) {
                $nilai =  (3 - $k2) / (3-2);
            }elseif($k2 <= 2){
                $nilai = 1;
            }
    
            return $nilai;
        }
    
        function keanggotaan_k3_baik($k3){
           
            if($k3<2){
                $nilai = 0;
            }elseif (2<=$k3 && $k3<4) {
                $nilai =  ($k3 - 2) / (4-2);
            }elseif($k3 >= 4){
                $nilai = 1;
            }
    
            return $nilai;
        }
    
        function keanggotaan_k3_buruk($k3){
           
            if($k3>=4){
                $nilai = 0;
            }elseif (2<=$k3 && $k3<4) {
                $nilai =  (4 - $k3) / (4-2);
            }elseif($k3 <= 2){
                $nilai = 1;
            }
    
            return $nilai;
        }
    
        function keanggotaan_k4_baik($k4){
           
            if($k4<2){
                $nilai = 0;
            }elseif (2<=$k4 && $k4<3) {
                $nilai =  ($k4 - 2) / (3-2);
            }elseif($k4 >= 3){
                $nilai = 1;
            }
    
            return $nilai;
        }
    
        function keanggotaan_k4_buruk($k4){
           
            if($k4>=3){
                $nilai = 0;
            }elseif (2<=$k4 && $k4<3) {
                $nilai =  (4 - $k4) / (4-2);
            }elseif($k4 <= 2){
                $nilai = 1;
            }
    
            return $nilai;
        }
    
        function keanggotaan_k5_baik($k5){
           
            if($k5<2){
                $nilai = 0;
            }elseif (2<=$k5 && $k5<4) {
                $nilai =  ($k5 - 2) / (4-2);
            }elseif($k5 >= 4){
                $nilai = 1;
            }
    
            return $nilai;
        }
    
        function keanggotaan_k5_buruk($k5){
           
            if($k5>=4){
                $nilai = 0;
            }elseif (2<=$k5 && $k5<4) {
                $nilai =  (4 - $k5) / (4-2);
            }elseif($k5 <= 2){
                $nilai = 1;
            }
    
            return $nilai;
        }
    
        function keanggotaan_k6_baik($k6){
           
            if($k6<2){
                $nilai = 0;
            }elseif (2<=$k6 && $k6<5) {
                $nilai =  ($k6 - 2) / (5-2);
            }elseif($k6 >= 5){
                $nilai = 1;
            }
    
            return $nilai;
        }
    
        function keanggotaan_k6_buruk($k6){
           
            if($k6>=5){
                $nilai = 0;
            }elseif (2<=$k6 && $k6<5) {
                $nilai = (5 - $k6) / (5-2);
            }elseif($k6 <= 2){
                $nilai = 1;
            }
    
            return $nilai;
        }
    
        function keanggotaan_k7_baik($k7){
           
            if($k7<2){
                $nilai = 0;
            }elseif (2<=$k7 && $k7<5) {
                $nilai =  ($k7 - 2) / (5-2);
            }elseif($k7 >= 5){
                $nilai = 1;
            }
    
            return $nilai;
        }
    
        function keanggotaan_k7_buruk($k7){
           
            if($k7>=5){
                $nilai = 0;
            }elseif (2<=$k7 && $k7<5) {
                $nilai = (5 - $k7) / (5-2);
            }elseif($k7 <= 2){
                $nilai = 1;
            }
    
            return $nilai;
        }
    
        function keanggotaan_k8_baik($k8){
           
            if($k8<2){
                $nilai = 0;
            }elseif (2<=$k8 && $k8<5) {
                $nilai =  ($k8 - 2) / (5-2);
            }elseif($k8 >= 5){
                $nilai = 1;
            }
    
            return $nilai;
        }
    
        function keanggotaan_k8_buruk($k8){
           
            if($k8>=5){
                $nilai = 0;
            }elseif (2<=$k8 && $k8<5) {
                $nilai = (5 - $k8) / (5-2) ;
            }elseif($k8 <= 2){
                $nilai = 1;
            }
    
            return $nilai;
        }
    
        function kuality_baik($q1){
            if($q1<2){
                $nilai =0;
            }elseif (2<=$q1 && $q1<10) {
                # code...
                $hasil = ($q1 - 2) / (10-2);
    
            }elseif($q1>= 10){
                $hasil = 1;
            }
        }
    
        function kuality_buruk($q1){
            if($q1>=10){
                $nilai =0;
            }elseif (2<=$q1 && $q1<5) {
                # code...
                $hasil = (10 - $q1) / (10-2);
    
            }elseif($q1<=2){
                $hasil = 1;
            }
        }
 foreach ($nilai as $nilais) {
    
    array_push($tampung_baik,keanggotaan_k1_baik($nilais->kriteria_1)); 
    array_push($tampung_buruk, keanggotaan_k1_buruk($nilais->kriteria_1));

    array_push($tampung_baik,keanggotaan_k2_baik($nilais->kriteria_2)); 
    array_push($tampung_buruk, keanggotaan_k2_buruk($nilais->kriteria_2));

    array_push($tampung_baik,keanggotaan_k3_baik($nilais->kriteria_3)); 
    array_push($tampung_buruk, keanggotaan_k3_buruk($nilais->kriteria_3));

    array_push($tampung_baik,keanggotaan_k4_baik($nilais->kriteria_4)); 
    array_push($tampung_buruk, keanggotaan_k4_buruk($nilais->kriteria_4));

    array_push($tampung_baik,keanggotaan_k5_baik($nilais->kriteria_5)); 
    array_push($tampung_buruk, keanggotaan_k5_buruk($nilais->kriteria_5));

    array_push($tampung_baik,keanggotaan_k6_baik($nilais->kriteria_6)); 
    array_push($tampung_buruk, keanggotaan_k6_buruk($nilais->kriteria_6));

    array_push($tampung_baik,keanggotaan_k7_baik($nilais->kriteria_7)); 
    array_push($tampung_buruk, keanggotaan_k7_buruk($nilais->kriteria_7));

    array_push($tampung_baik,keanggotaan_k8_baik($nilais->kriteria_8)); 
    array_push($tampung_buruk, keanggotaan_k8_buruk($nilais->kriteria_8));
     

     $R1_alpa = min($tampung_baik[0], $tampung_baik[1],$tampung_baik[2], $tampung_baik[3],$tampung_baik[4], $tampung_baik[5],$tampung_baik[6], $tampung_baik[7]);
     $R1 = (($R1_alpa * 8) +2);
     array_push($alpha,$R1_alpa);
     array_push($R,$R1);
     
     $R2_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_buruk[2],$tampung_buruk[3],$tampung_buruk[4],$tampung_buruk[5],$tampung_buruk[6],$tampung_buruk[7]);
     $R2 = abs(($R2_alpa * 8) - 10);
     array_push($alpha,$R2_alpa);
     array_push($R,$R2);

     $R3_alpa = min($tampung_baik[0], $tampung_baik[1], $tampung_baik[2], $tampung_baik[3], $tampung_buruk[4], $tampung_buruk[5], $tampung_buruk[6],$tampung_baik[7]);
     $R3 = ($R3_alpa * 8)+2;
     array_push($alpha,$R3_alpa);
     array_push($R,$R3);
     
     $R4_alpa = min($tampung_buruk[0], $tampung_baik[1], $tampung_buruk[2], $tampung_baik[3],$tampung_buruk[4],$tampung_buruk[5],$tampung_buruk[6],$tampung_buruk[7]);
     $R4 = abs(($R4_alpa * 8) - 10);
     array_push($alpha,$R4_alpa);
     array_push($R,$R4);

     $R5_alpa = min($tampung_baik[0],$tampung_baik[1],$tampung_baik[2],$tampung_baik[3],$tampung_buruk[4], $tampung_buruk[5], $tampung_buruk[6],$tampung_buruk[7]);
     $R5 =abs(($R5_alpa * 8) - 10);
     array_push($alpha,$R5_alpa);
     array_push($R,$R5);

     $R6_alpa = min($tampung_baik[0], $tampung_buruk[1], $tampung_baik[2], $tampung_baik[3],$tampung_buruk[4],$tampung_buruk[5],$tampung_buruk[6],$tampung_buruk[7]);
     $R6 =abs(($R6_alpa * 8) - 10);
     array_push($alpha,$R6_alpa);
     array_push($R,$R6);

     $R7_alpa = min($tampung_buruk[0], $tampung_buruk[1], $tampung_baik[2], $tampung_baik[3],$tampung_baik[5], $tampung_baik[6], $tampung_baik[7]);
     $R7 = ($R7_alpa * 8) +2;
     array_push($alpha,$R7_alpa);
     array_push($R,$R7);

     $R8_alpa = min($tampung_baik[0],$tampung_buruk[1],$tampung_baik[2], $tampung_baik[3], $tampung_baik[4], $tampung_baik[5], $tampung_buruk[6], $tampung_buruk[7]);
     $R8 = ($R8_alpa * 8) +2;
     array_push($alpha,$R8_alpa);
     array_push($R,$R8);
     
     $R9_alpa = min($tampung_buruk[0], $tampung_buruk[1], $tampung_buruk[2], $tampung_buruk[3], $tampung_buruk[4], $tampung_baik[5], $tampung_baik[6], $tampung_baik[7]);
     $R9 = abs(($R9_alpa * 8) - 10);
     array_push($alpha,$R9_alpa);
     array_push($R,$R9);
     
     $R10_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_buruk[2],$tampung_buruk[3],$tampung_baik[4],$tampung_baik[5],$tampung_baik[6],$tampung_baik[7]);
     $R10 = ($R10_alpa * 8) +2;
     array_push($alpha,$R10_alpa);
     array_push($R,$R10);
    
     $R11_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_baik[2], $tampung_baik[3], $tampung_baik[4], $tampung_buruk[5], $tampung_buruk[6], $tampung_buruk[7]);
     $R11 = abs(($R11_alpa * 8) - 10);
     array_push($alpha,$R11_alpa);
     array_push($R,$R11);

     $R12_alpa = min($tampung_baik[0],$tampung_baik[1],$tampung_baik[2],$tampung_baik[3],$tampung_baik[4],$tampung_baik[5],$tampung_buruk[6],$tampung_buruk[7]);
     $R12 = abs(($R12_alpa * 8) - 10);
     array_push($alpha,$R12_alpa);
     array_push($R,$R12);

     $R13_alpa = min($tampung_buruk[0],$tampung_baik[1],$tampung_buruk[2],$tampung_baik[3],$tampung_buruk[4],$tampung_baik[5],$tampung_buruk[6], $tampung_baik[7]);
     $R13 = ($R13_alpa * 8) +2;
     array_push($alpha,$R13_alpa);
     array_push($R,$R13);

     $R14_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_baik[2],$tampung_baik[3],$tampung_baik[4],$tampung_buruk[5],$tampung_baik[6],$tampung_baik[7]);
     $R14 = ($R13_alpa * 8) +2;
     array_push($alpha,$R14_alpa);
     array_push($R,$R14);

     $R15_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_buruk[2],$tampung_baik[3],$tampung_baik[4],$tampung_buruk[5],$tampung_buruk[6],$tampung_baik[7]);
     $R15 = abs(($R15_alpa * 8) - 10);
     array_push($alpha,$R15_alpa);
     array_push($R,$R15);

     $R16_alpa = min($tampung_baik[0],$tampung_baik[1],$tampung_baik[2],$tampung_baik[3],$tampung_buruk[4],$tampung_baik[5],$tampung_baik[6],$tampung_baik[7]);
     $R16 = ($R16_alpa * 8) +2;
     array_push($alpha,$R16_alpa);
     array_push($R,$R16);

     $R17_alpa = min($tampung_baik[0],$tampung_buruk[1],$tampung_baik[2],$tampung_buruk[3],$tampung_buruk[4],$tampung_buruk[5],$tampung_buruk[6],$tampung_baik[7]);
     $R17 = abs(($R17_alpa * 8) - 10);
     array_push($alpha,$R17_alpa);
     array_push($R,$R17);

     $R18_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_buruk[2],$tampung_buruk[3],$tampung_buruk[4],$tampung_baik[5],$tampung_buruk[6],$tampung_buruk[7]);
     $R18 = abs(($R18_alpa * 8) - 10);
     array_push($alpha,$R18_alpa);
     array_push($R,$R18);

     $R19_alpa = min($tampung_baik[0],$tampung_baik[1],$tampung_baik[2],$tampung_baik[3],$tampung_buruk[4],$tampung_buruk[5],$tampung_buruk[6],$tampung_buruk[7]);
     $R19 = ($R19_alpa * 8) +2;
     array_push($alpha,$R19_alpa);
     array_push($R,$R19);

     $R20_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_buruk[2],$tampung_buruk[3],$tampung_baik[4],$tampung_baik[5],$tampung_baik[6],$tampung_baik[7]);
     $R20 = ($R20_alpa * 8) +2;
     array_push($alpha,$R20_alpa);
     array_push($R,$R20);

     $R21_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_baik[2],$tampung_baik[3],$tampung_buruk[4],$tampung_buruk[5],$tampung_baik[6],$tampung_baik[7]);
     $R21 = abs(($R21_alpa * 8) - 10);
     array_push($alpha,$R21_alpa);
     array_push($R,$R21);

     $R22_alpa = min($tampung_baik[0],$tampung_baik[1],$tampung_buruk[2],$tampung_buruk[3],$tampung_baik[4],$tampung_baik[5],$tampung_buruk[6],$tampung_buruk[7]);
     $R22 = ($R22_alpa * 8) +2;
     array_push($alpha,$R22_alpa);
     array_push($R,$R22);

     $R23_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_buruk[2],$tampung_buruk[3],$tampung_buruk[4],$tampung_buruk[5],$tampung_baik[6],$tampung_baik[7]);
     $R23 = abs(($R23_alpa * 8) - 10);
     array_push($alpha,$R23_alpa);
     array_push($R,$R23);

     $R24_alpa = min($tampung_baik[0],$tampung_baik[1],$tampung_baik[2],$tampung_baik[3],$tampung_baik[4],$tampung_baik[5],$tampung_baik[6],$tampung_buruk[7]);
     $R24 = ($R24_alpa * 8) +2;
     array_push($alpha,$R24_alpa);
     array_push($R,$R24);

     $R25_alpa = min($tampung_baik[0],$tampung_buruk[1],$tampung_baik[2],$tampung_buruk[3],$tampung_baik[4],$tampung_buruk[5],$tampung_baik[6],$tampung_buruk[7]);
     $R25 = ($R25_alpa * 8) +2;
     array_push($alpha,$R25_alpa);
     array_push($R,$R25);

     $R26_alpa = min($tampung_baik[0],$tampung_buruk[1],$tampung_buruk[2],$tampung_buruk[3],$tampung_baik[4],$tampung_buruk[5],$tampung_buruk[6],$tampung_buruk[7]);
     $R26 = abs(($R26_alpa * 8) - 10);
     array_push($alpha,$R26_alpa);
     array_push($R,$R26);

     $R27_alpa = min($tampung_buruk[0],$tampung_baik[1],$tampung_buruk[2],$tampung_baik[3],$tampung_baik[4],$tampung_buruk[5],$tampung_buruk[6],$tampung_buruk[7]);
     $R27 = abs(($R27_alpa * 8) - 10);
     array_push($alpha,$R27_alpa);
     array_push($R,$R27);

     $R28_alpa = min($tampung_buruk[0],$tampung_baik[1],$tampung_baik[2],$tampung_buruk[3],$tampung_buruk[4],$tampung_baik[5],$tampung_buruk[6],$tampung_baik[7]);
     $R28 = ($R28_alpa * 8) +2;
     array_push($alpha,$R28_alpa);
     array_push($R,$R28);

     $R29_alpa = min($tampung_buruk[0],$tampung_baik[1],$tampung_baik[2],$tampung_baik[3],$tampung_baik[4],$tampung_baik[5],$tampung_baik[6],$tampung_buruk[7]);
     $R29 = ($R29_alpa * 8) +2;
     array_push($alpha,$R29_alpa);
     array_push($R,$R29);
    
     $R30_alpa = min($tampung_baik[0],$tampung_buruk[1],$tampung_buruk[2],$tampung_buruk[3],$tampung_buruk[4],$tampung_buruk[5],$tampung_buruk[6],$tampung_baik[7]);
     $R30 = abs(($R30_alpa * 8) - 10);
     array_push($alpha,$R30_alpa);
     array_push($R,$R30);

   
     

     $result_alpa_r = 0;
     $result_alpa = 0;
     $result = 0;
     for ($x=0; $x < count($alpha) ; $x++) { 
         $result_alpa_r += $alpha[$x] * $R[$x];
         $result_alpa += $alpha[$x];
     }

      $result = $result_alpa_r / $result_alpa;

     $results[$i] =$result;
     $tampung_baik=[];
     $tampung_buruk=[];
     $alpha = [];
     $R = [];
    

      $i++;
     }

   return  view('perhitungan_result._result',['nilai'=>$nilai,'data'=>$results]);
    // return dd($tampung_baik);
     
    // dd($tampung_buruk);
    // return "ok";
    // return  view('perhitungan_result._result',['hasil'=>$hasils]);
   }

   public function CetakPdf(){
    $nilai = Nilai::all();
    $tampung_baik=[];
    $tampung_buruk=[];
    $alpha = [];
    $R = [];
    $results= [];
    $i =0;

    function keanggotaan_k1_baik($k1){
       
        if($k1<2){
            $nilai = 0;
        }elseif (2<=$k1 && $k1<3) {
            $nilai =  ($k1 - 2) / (3-2);
        }elseif($k1 >= 3){
            $nilai = 1;
        }

        return $nilai;
    }

    function keanggotaan_k1_buruk($k1){
       
        if($k1>=3){
            $nilai = 0;
        }elseif (2<=$k1 && $k1<3) {
            $nilai =  (3 - $k1) / (3-2);
        }elseif($k1 <= 1){
            $nilai = 1;
        }

        return $nilai;
    }

    function keanggotaan_k2_baik($k2){
       
        if($k2<2){
            $nilai = 0;
        }elseif (2<=$k2 && $k2<3) {
            $nilai =  ($k2 - 2) / (3-2);
        }elseif($k2 >= 3){
            $nilai = 1;
        }

        return $nilai;
    }

    function keanggotaan_k2_buruk($k2){
       
        if($k2>=3){
            $nilai = 0;
        }elseif (2<=$k2 && $k2<3) {
            $nilai =  (3 - $k2) / (3-2);
        }elseif($k2 <= 2){
            $nilai = 1;
        }

        return $nilai;
    }

    function keanggotaan_k3_baik($k3){
       
        if($k3<2){
            $nilai = 0;
        }elseif (2<=$k3 && $k3<4) {
            $nilai =  ($k3 - 2) / (4-2);
        }elseif($k3 >= 4){
            $nilai = 1;
        }

        return $nilai;
    }

    function keanggotaan_k3_buruk($k3){
       
        if($k3>=4){
            $nilai = 0;
        }elseif (2<=$k3 && $k3<4) {
            $nilai =  (4 - $k3) / (4-2);
        }elseif($k3 <= 2){
            $nilai = 1;
        }

        return $nilai;
    }

    function keanggotaan_k4_baik($k4){
       
        if($k4<2){
            $nilai = 0;
        }elseif (2<=$k4 && $k4<3) {
            $nilai =  ($k4 - 2) / (3-2);
        }elseif($k4 >= 3){
            $nilai = 1;
        }

        return $nilai;
    }

    function keanggotaan_k4_buruk($k4){
       
        if($k4>=3){
            $nilai = 0;
        }elseif (2<=$k4 && $k4<3) {
            $nilai =  (4 - $k4) / (4-2);
        }elseif($k4 <= 2){
            $nilai = 1;
        }

        return $nilai;
    }

    function keanggotaan_k5_baik($k5){
       
        if($k5<2){
            $nilai = 0;
        }elseif (2<=$k5 && $k5<4) {
            $nilai =  ($k5 - 2) / (4-2);
        }elseif($k5 >= 4){
            $nilai = 1;
        }

        return $nilai;
    }

    function keanggotaan_k5_buruk($k5){
       
        if($k5>=4){
            $nilai = 0;
        }elseif (2<=$k5 && $k5<4) {
            $nilai =  (4 - $k5) / (4-2);
        }elseif($k5 <= 2){
            $nilai = 1;
        }

        return $nilai;
    }

    function keanggotaan_k6_baik($k6){
       
        if($k6<2){
            $nilai = 0;
        }elseif (2<=$k6 && $k6<5) {
            $nilai =  ($k6 - 2) / (5-2);
        }elseif($k6 >= 5){
            $nilai = 1;
        }

        return $nilai;
    }

    function keanggotaan_k6_buruk($k6){
       
        if($k6>=5){
            $nilai = 0;
        }elseif (2<=$k6 && $k6<5) {
            $nilai = (5 - $k6) / (5-2);
        }elseif($k6 <= 2){
            $nilai = 1;
        }

        return $nilai;
    }

    function keanggotaan_k7_baik($k7){
       
        if($k7<2){
            $nilai = 0;
        }elseif (2<=$k7 && $k7<5) {
            $nilai =  ($k7 - 2) / (5-2);
        }elseif($k7 >= 5){
            $nilai = 1;
        }

        return $nilai;
    }

    function keanggotaan_k7_buruk($k7){
       
        if($k7>=5){
            $nilai = 0;
        }elseif (2<=$k7 && $k7<5) {
            $nilai = (5 - $k7) / (5-2);
        }elseif($k7 <= 2){
            $nilai = 1;
        }

        return $nilai;
    }

    function keanggotaan_k8_baik($k8){
       
        if($k8<2){
            $nilai = 0;
        }elseif (2<=$k8 && $k8<5) {
            $nilai =  ($k8 - 2) / (5-2);
        }elseif($k8 >= 5){
            $nilai = 1;
        }

        return $nilai;
    }

    function keanggotaan_k8_buruk($k8){
       
        if($k8>=5){
            $nilai = 0;
        }elseif (2<=$k8 && $k8<5) {
            $nilai = (5 - $k8) / (5-2) ;
        }elseif($k8 <= 2){
            $nilai = 1;
        }

        return $nilai;
    }

    function kuality_baik($q1){
        if($q1<2){
            $nilai =0;
        }elseif (2<=$q1 && $q1<10) {
            # code...
            $hasil = ($q1 - 2) / (10-2);

        }elseif($q1>= 10){
            $hasil = 1;
        }
    }

    function kuality_buruk($q1){
        if($q1>=10){
            $nilai =0;
        }elseif (2<=$q1 && $q1<5) {
            # code...
            $hasil = (10 - $q1) / (10-2);

        }elseif($q1<=2){
            $hasil = 1;
        }
    }
foreach ($nilai as $nilais) {

array_push($tampung_baik,keanggotaan_k1_baik($nilais->kriteria_1)); 
array_push($tampung_buruk, keanggotaan_k1_buruk($nilais->kriteria_1));

array_push($tampung_baik,keanggotaan_k2_baik($nilais->kriteria_2)); 
array_push($tampung_buruk, keanggotaan_k2_buruk($nilais->kriteria_2));

array_push($tampung_baik,keanggotaan_k3_baik($nilais->kriteria_3)); 
array_push($tampung_buruk, keanggotaan_k3_buruk($nilais->kriteria_3));

array_push($tampung_baik,keanggotaan_k4_baik($nilais->kriteria_4)); 
array_push($tampung_buruk, keanggotaan_k4_buruk($nilais->kriteria_4));

array_push($tampung_baik,keanggotaan_k5_baik($nilais->kriteria_5)); 
array_push($tampung_buruk, keanggotaan_k5_buruk($nilais->kriteria_5));

array_push($tampung_baik,keanggotaan_k6_baik($nilais->kriteria_6)); 
array_push($tampung_buruk, keanggotaan_k6_buruk($nilais->kriteria_6));

array_push($tampung_baik,keanggotaan_k7_baik($nilais->kriteria_7)); 
array_push($tampung_buruk, keanggotaan_k7_buruk($nilais->kriteria_7));

array_push($tampung_baik,keanggotaan_k8_baik($nilais->kriteria_8)); 
array_push($tampung_buruk, keanggotaan_k8_buruk($nilais->kriteria_8));
 

 $R1_alpa = min($tampung_baik[0], $tampung_baik[1],$tampung_baik[2], $tampung_baik[3],$tampung_baik[4], $tampung_baik[5],$tampung_baik[6], $tampung_baik[7]);
 $R1 = (($R1_alpa * 8) +2);
 array_push($alpha,$R1_alpa);
 array_push($R,$R1);
 
 $R2_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_buruk[2],$tampung_buruk[3],$tampung_buruk[4],$tampung_buruk[5],$tampung_buruk[6],$tampung_buruk[7]);
 $R2 = abs(($R2_alpa * 8) - 10);
 array_push($alpha,$R2_alpa);
 array_push($R,$R2);

 $R3_alpa = min($tampung_baik[0], $tampung_baik[1], $tampung_baik[2], $tampung_baik[3], $tampung_buruk[4], $tampung_buruk[5], $tampung_buruk[6],$tampung_baik[7]);
 $R3 = ($R3_alpa * 8)+2;
 array_push($alpha,$R3_alpa);
 array_push($R,$R3);
 
 $R4_alpa = min($tampung_buruk[0], $tampung_baik[1], $tampung_buruk[2], $tampung_baik[3],$tampung_buruk[4],$tampung_buruk[5],$tampung_buruk[6],$tampung_buruk[7]);
 $R4 = abs(($R4_alpa * 8) - 10);
 array_push($alpha,$R4_alpa);
 array_push($R,$R4);

 $R5_alpa = min($tampung_baik[0],$tampung_baik[1],$tampung_baik[2],$tampung_baik[3],$tampung_buruk[4], $tampung_buruk[5], $tampung_buruk[6],$tampung_buruk[7]);
 $R5 =abs(($R5_alpa * 8) - 10);
 array_push($alpha,$R5_alpa);
 array_push($R,$R5);

 $R6_alpa = min($tampung_baik[0], $tampung_buruk[1], $tampung_baik[2], $tampung_baik[3],$tampung_buruk[4],$tampung_buruk[5],$tampung_buruk[6],$tampung_buruk[7]);
 $R6 =abs(($R6_alpa * 8) - 10);
 array_push($alpha,$R6_alpa);
 array_push($R,$R6);

 $R7_alpa = min($tampung_buruk[0], $tampung_buruk[1], $tampung_baik[2], $tampung_baik[3],$tampung_baik[5], $tampung_baik[6], $tampung_baik[7]);
 $R7 = ($R7_alpa * 8) +2;
 array_push($alpha,$R7_alpa);
 array_push($R,$R7);

 $R8_alpa = min($tampung_baik[0],$tampung_buruk[1],$tampung_baik[2], $tampung_baik[3], $tampung_baik[4], $tampung_baik[5], $tampung_buruk[6], $tampung_buruk[7]);
 $R8 = ($R8_alpa * 8) +2;
 array_push($alpha,$R8_alpa);
 array_push($R,$R8);
 
 $R9_alpa = min($tampung_buruk[0], $tampung_buruk[1], $tampung_buruk[2], $tampung_buruk[3], $tampung_buruk[4], $tampung_baik[5], $tampung_baik[6], $tampung_baik[7]);
 $R9 = abs(($R9_alpa * 8) - 10);
 array_push($alpha,$R9_alpa);
 array_push($R,$R9);
 
 $R10_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_buruk[2],$tampung_buruk[3],$tampung_baik[4],$tampung_baik[5],$tampung_baik[6],$tampung_baik[7]);
 $R10 = ($R10_alpa * 8) +2;
 array_push($alpha,$R10_alpa);
 array_push($R,$R10);

 $R11_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_baik[2], $tampung_baik[3], $tampung_baik[4], $tampung_buruk[5], $tampung_buruk[6], $tampung_buruk[7]);
 $R11 = abs(($R11_alpa * 8) - 10);
 array_push($alpha,$R11_alpa);
 array_push($R,$R11);

 $R12_alpa = min($tampung_baik[0],$tampung_baik[1],$tampung_baik[2],$tampung_baik[3],$tampung_baik[4],$tampung_baik[5],$tampung_buruk[6],$tampung_buruk[7]);
 $R12 = abs(($R12_alpa * 8) - 10);
 array_push($alpha,$R12_alpa);
 array_push($R,$R12);

 $R13_alpa = min($tampung_buruk[0],$tampung_baik[1],$tampung_buruk[2],$tampung_baik[3],$tampung_buruk[4],$tampung_baik[5],$tampung_buruk[6], $tampung_baik[7]);
 $R13 = ($R13_alpa * 8) +2;
 array_push($alpha,$R13_alpa);
 array_push($R,$R13);

 $R14_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_baik[2],$tampung_baik[3],$tampung_baik[4],$tampung_buruk[5],$tampung_baik[6],$tampung_baik[7]);
 $R14 = ($R13_alpa * 8) +2;
 array_push($alpha,$R14_alpa);
 array_push($R,$R14);

 $R15_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_buruk[2],$tampung_baik[3],$tampung_baik[4],$tampung_buruk[5],$tampung_buruk[6],$tampung_baik[7]);
 $R15 = abs(($R15_alpa * 8) - 10);
 array_push($alpha,$R15_alpa);
 array_push($R,$R15);

 $R16_alpa = min($tampung_baik[0],$tampung_baik[1],$tampung_baik[2],$tampung_baik[3],$tampung_buruk[4],$tampung_baik[5],$tampung_baik[6],$tampung_baik[7]);
 $R16 = ($R16_alpa * 8) +2;
 array_push($alpha,$R16_alpa);
 array_push($R,$R16);

 $R17_alpa = min($tampung_baik[0],$tampung_buruk[1],$tampung_baik[2],$tampung_buruk[3],$tampung_buruk[4],$tampung_buruk[5],$tampung_buruk[6],$tampung_baik[7]);
 $R17 = abs(($R17_alpa * 8) - 10);
 array_push($alpha,$R17_alpa);
 array_push($R,$R17);

 $R18_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_buruk[2],$tampung_buruk[3],$tampung_buruk[4],$tampung_baik[5],$tampung_buruk[6],$tampung_buruk[7]);
 $R18 = abs(($R18_alpa * 8) - 10);
 array_push($alpha,$R18_alpa);
 array_push($R,$R18);

 $R19_alpa = min($tampung_baik[0],$tampung_baik[1],$tampung_baik[2],$tampung_baik[3],$tampung_buruk[4],$tampung_buruk[5],$tampung_buruk[6],$tampung_buruk[7]);
 $R19 = ($R19_alpa * 8) +2;
 array_push($alpha,$R19_alpa);
 array_push($R,$R19);

 $R20_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_buruk[2],$tampung_buruk[3],$tampung_baik[4],$tampung_baik[5],$tampung_baik[6],$tampung_baik[7]);
 $R20 = ($R20_alpa * 8) +2;
 array_push($alpha,$R20_alpa);
 array_push($R,$R20);

 $R21_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_baik[2],$tampung_baik[3],$tampung_buruk[4],$tampung_buruk[5],$tampung_baik[6],$tampung_baik[7]);
 $R21 = abs(($R21_alpa * 8) - 10);
 array_push($alpha,$R21_alpa);
 array_push($R,$R21);

 $R22_alpa = min($tampung_baik[0],$tampung_baik[1],$tampung_buruk[2],$tampung_buruk[3],$tampung_baik[4],$tampung_baik[5],$tampung_buruk[6],$tampung_buruk[7]);
 $R22 = ($R22_alpa * 8) +2;
 array_push($alpha,$R22_alpa);
 array_push($R,$R22);

 $R23_alpa = min($tampung_buruk[0],$tampung_buruk[1],$tampung_buruk[2],$tampung_buruk[3],$tampung_buruk[4],$tampung_buruk[5],$tampung_baik[6],$tampung_baik[7]);
 $R23 = abs(($R23_alpa * 8) - 10);
 array_push($alpha,$R23_alpa);
 array_push($R,$R23);

 $R24_alpa = min($tampung_baik[0],$tampung_baik[1],$tampung_baik[2],$tampung_baik[3],$tampung_baik[4],$tampung_baik[5],$tampung_baik[6],$tampung_buruk[7]);
 $R24 = ($R24_alpa * 8) +2;
 array_push($alpha,$R24_alpa);
 array_push($R,$R24);

 $R25_alpa = min($tampung_baik[0],$tampung_buruk[1],$tampung_baik[2],$tampung_buruk[3],$tampung_baik[4],$tampung_buruk[5],$tampung_baik[6],$tampung_buruk[7]);
 $R25 = ($R25_alpa * 8) +2;
 array_push($alpha,$R25_alpa);
 array_push($R,$R25);



 $result_alpa_r = 0;
 $result_alpa = 0;
 $result = 0;
 for ($x=0; $x < count($alpha) ; $x++) { 
     $result_alpa_r += $alpha[$x] * $R[$x];
     $result_alpa += $alpha[$x];
 }

  $result = $result_alpa_r / $result_alpa;
  

 $results[$i] =$result;
 $tampung_baik=[];
 $tampung_buruk=[];
 $alpha = [];
 $R = [];

 $i++;
}
$pdf = PDF::Loadview("pdf.pdf",['nilai'=>$nilai,'data'=>$results]);
return $pdf->stream();

}
   
  

}
