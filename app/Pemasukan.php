<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    protected $table = 'pemasukan';

    public function barang()
    {
        return $this->belongsTo('App\Katalog', 'kode_barang', 'kode_barang');
    }
}
