<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    protected $table = "katalog";
    protected $primaryKey="kode_barang";
    public $incrementing = false;

    public function pemasukan()
    {
        return $this->hasMany('App\Pemasukan');
    }

    public function pengeluaran()
    {
        return $this->hasMany('App\pengeluaran');
    }
}
