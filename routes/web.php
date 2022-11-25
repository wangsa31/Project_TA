<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginLogout;
use App\Http\Controllers\Admin;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PerhitunganController;

use App\Models\Karyawan;
use App\Models\Departemen;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




// Route Group admin



Route::get('/login',[LoginLogout::class, 'Login'])->name('login');

    Route::middleware(['auth'])->group(function () {
        
        Route::get('/dashboard', function () {
            $count_departemen = Departemen::all()->count();
            $count_karyawan = Karyawan::all()->count();
            return view('admin.dashboard',['count_dept' => $count_departemen, 'count_kar' => $count_karyawan, ]);
        });
        Route::get('/admin',[Admin::class,'Admins']);
        Route::get('/admin/register',[Admin::class,'Register']);
        Route::get('/admin/{id}/ubah',[Admin::class,'Edit']);
        Route::get('/admin/{id}/hapus',[Admin::class,'DeletePost']);
        Route::get('/departemen',[Admin::class, 'Departemen']);
        Route::get('/departemen/{id}/ubah',[Admin::class, 'DepartEdit']);
        Route::get('/departemen/register',[Admin::class, 'DepartRegister']);
        Route::get('/departemen/{id}/hapus',[Admin::class,'DepartDeletePost']);
        Route::get('/karyawan/register',[KaryawanController::class, 'KaryawanRegister']);
        Route::get('/karyawan',[KaryawanController::class,'Karyawan']);
        Route::get('/karyawan/{id}/detail',[KaryawanController::class,'KaryawanDetail']);
        Route::get('/karyawan/{id}/ubah',[KaryawanController::class,'KaryawanEdit']);
        Route::get('/karyawan/{id}/hapus',[KaryawanController::class,'KaryawanDeletePost']);
        Route::get('/karyawan/perhitungan',[PerhitunganController::class,'Perhitungan']);
        Route::get('/karyawan/perhitungan/register',[PerhitunganController::class,'PerhitunganRegister']);
        Route::get('/karyawan/{id}/hapus/perhitungan',[PerhitunganController::class,'PerhitunganHapus']);
        Route::get('/karyawan/hasil',[PerhitunganController::class,'HitungPost']);
        Route::get('/konversi/pdf',[PerhitunganController::class,'CetakPdf']);
    });    

    Route::post('/karyawan/perhitungan',[PerhitunganController::class,'PerhitunganPost']);
    Route::post('/karyawan/ubah',[KaryawanController::class,'KaryaEditPost']);
    Route::post('/karyawan/register',[KaryawanController::class,'KaryaPost']);
    Route::post('/loginPost',[LoginLogout::class,'LoginPost']);
    Route::post('/departemen/ubah',[Admin::class, 'DepartEditPost']);
    Route::post('/departemen/register',[Admin::class,'DepartPost']);
    Route::post('/admin/register',[Admin::class,'RegisterPost']);
    Route::post('/admin/ubah',[Admin::class,'EditPost']);
    Route::POST('/logout',[LoginLogout::class,'Logout']);   








