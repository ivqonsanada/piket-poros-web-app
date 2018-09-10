<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('1A')->default('0');
            $table->tinyInteger('1B')->default('0');
            $table->tinyInteger('1C')->default('0');
            $table->tinyInteger('1D')->default('0');
            $table->tinyInteger('1E')->default('0');
            $table->tinyInteger('2A')->default('0');
            $table->tinyInteger('2B')->default('0');
            $table->tinyInteger('2C')->default('0');
            $table->tinyInteger('2D')->default('0');
            $table->tinyInteger('2E')->default('0');
            $table->tinyInteger('3A')->default('0');
            $table->tinyInteger('3B')->default('0');
            $table->tinyInteger('3C')->default('0');
            $table->tinyInteger('3D')->default('0');
            $table->tinyInteger('3E')->default('0');
            $table->tinyInteger('4A')->default('0');
            $table->tinyInteger('4B')->default('0');
            $table->tinyInteger('4C')->default('0');
            $table->tinyInteger('4D')->default('0');
            $table->tinyInteger('4E')->default('0');
            $table->tinyInteger('5A')->default('0');
            $table->tinyInteger('5B')->default('0');
            $table->tinyInteger('5C')->default('0');
            $table->tinyInteger('5D')->default('0');
            $table->tinyInteger('5E')->default('0');
            $table->String('konfirmasi')->default('-');
            $table->String('anggota_id');
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
        Schema::dropIfExists('jadwals');
    }
}