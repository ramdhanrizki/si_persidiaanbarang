<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';
    
    public function barang()
    {
        return $this->belongsTo('App\Katalog', 'kode_barang', 'kode_barang');
    }
}
