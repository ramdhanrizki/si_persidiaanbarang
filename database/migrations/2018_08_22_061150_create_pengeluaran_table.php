<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengeluaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_barang',20);
            $table->integer('harga');
            $table->integer('jumlah');
            $table->integer('total');
            $table->text('keterangan');
            $table->timestamps();
        });

        Schema::table('pengeluaran', function($table){
            $table->foreign('kode_barang')
            ->references('kode_barang')
            ->on('katalog')
            ->onUpdate('restrict')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengeluaran');
    }
}
