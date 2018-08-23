<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKatalogTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katalog', function (Blueprint $table) {
            $table->string('kode_barang',20);
            $table->string('nama_barang');
            $table->string('satuan');
            $table->text('spesifikasi');
            $table->integer('stok');
            $table->timestamps();
            $table->primary('kode_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('katalog', function (Blueprint $table) {
            //
        });
    }
}
