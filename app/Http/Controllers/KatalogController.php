<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\katalog;

class KatalogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $katalog = Katalog::all();
        return view('barang.katalog')->with(['katalog'=>$katalog]);
    }

    public function tambah(Request $request)
    {
        return view('barang.tambah');
    }

    public function simpan_tambah(Request $request)
    {
        $katalog = new Katalog();
        $katalog->kode_barang = $request->input('kode_barang');
        $katalog->nama_barang = $request->input('nama_barang');
        $katalog->satuan = $request->input('satuan');
        $katalog->stok = $request->input('stok');
        $katalog->spesifikasi = $request->input('spesifikasi');
        $katalog->save();
        return redirect('katalog')->with('success', 'Data berhasil ditambah');
    }

    public function update($id)
    {
        $katalog = Katalog::find($id); 
        return view('barang.update')->with('katalog',$katalog);
    }
    
    public function simpan_update($id,Request $request)
    {
        $katalog = Katalog::find($id);
        $katalog->kode_barang = $request->input('kode_barang');
        $katalog->nama_barang = $request->input('nama_barang');
        $katalog->satuan = $request->input('satuan');
        $katalog->stok = $request->input('stok');
        $katalog->spesifikasi = $request->input('spesifikasi');
        $katalog->save();
        return redirect('katalog')->with('success', 'Data berhasil diupdate');
    }

    public function hapus($id)
    {
        try{
            $katalog = Katalog::find($id);
            $katalog->delete();
            return redirect('katalog')->with('success', 'Data berhasil dihapus');
        }catch(Exception $e){
            return redirect('katalog')->with('error', 'Terjadi kesalahan server, silakan hubungi bagian IT');
        }
    }
    public function getAllBarang()
    {
        $katalog = Katalog::all();
        if(isset($_GET['q'])){
            $katalog = Katalog::where('nama_barang', 'like', '%' . $_GET['q'] . '%')
                                ->orWhere('kode_barang','like','%'.$_GET['q'].'%')->get();
        }
         
        return response()->json($katalog);
    }
}
