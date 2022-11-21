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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->unsigned()->nullable(false)->constrained('karyawan')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('kriteria_1')->unsigned()->nullable(false);
            $table->integer('kriteria_2')->unsigned()->nullable(false);
            $table->integer('kriteria_4')->unsigned()->nullable(false);
            $table->integer('kriteria_5')->unsigned()->nullable(false);
            $table->integer('kriteria_6')->unsigned()->nullable(false);
            $table->integer('kriteria_7')->unsigned()->nullable(false);
            $table->integer('kriteria_8')->unsigned()->nullable(false);
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
        Schema::dropIfExists('nilai');
    }
};
