<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan', 50)->nullable(false);
            $table->foreignId('departemen_id')->unsigned()->nullable(false)->constrained('departemen')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tempat_lahir', 50)->nullable(false);
            $table->date('tanggal_lahir')->nullable(false);
            $table->string('alamat_karyawan')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
};
