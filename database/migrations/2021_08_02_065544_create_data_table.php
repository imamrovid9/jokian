<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('kelamin', ['p', 'r']);
            $table->enum('gol_darah', ['a', 'b', 'ab', 'o']);
            $table->longText('alamat');
            $table->enum('agama', ['muslim', 'kristen', 'katolik', 'hindu', 'budha']);
            $table->enum('status_perkawinan', ['menikah', 'belum kawin']);
            $table->string('pekerjaan');
            $table->string('kewarganegaraan');
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
        Schema::dropIfExists('data');
    }
}
