<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemasukan; 
use App\Katalog; 
use App\Pengeluaran; 

class PersediaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function databarangmasuk()
    {
        $barang = Pemasukan::all();
        return view('persediaan.databarangmasuk')->with('pemasukan',$barang);
    }
    public function barangmasuk()
    {
        return view('persediaan.pemasukan');
    }

    public function post_barangmasuk(Request $request)
    {
        
        $pemasukan = new Pemasukan();
        $barang = Katalog::find($request->input('kode_barang'));
        $barang->stok += $request->input('jumlah');
        $barang->save();
        $pemasukan->kode_barang = $request->input('kode_barang');
        $pemasukan->harga = $request->input('harga');
        $pemasukan->jumlah = $request->input('jumlah');
        $pemasukan->tanggal_masuk = $request->input('tanggal');
        $pemasukan->total = $request->input('jumlah') * $request->input('harga');
        $pemasukan->sisa = $request->input('jumlah');
        $pemasukan->save();
        return redirect('barangmasuk')->with('success','Data barang masuk berhasil dimasukkan');
    }

    public function updatebarangmasuk($id)
    {
        $pemasukan = Pemasukan::find($id);
        return view('persediaan.updatepemasukan')->with('data',$pemasukan);
    }

    public function postupdatebarangmasuk($id,Request $request)
    {
        $pemasukan = Pemasukan::find($id); 
        $barang = Katalog::find($request->input('kode_barang'));
       // dd($request->input('jumlah') < $pemasukan->jumlah);

        if($request->input('jumlah') < $pemasukan->jumlah)
        {
            $selisih = $request->input('jumlah') - $pemasukan->jumlah;
            $barang->stok += $selisih;
        }else if($request->input('jumlah') > $pemasukan->jumlah)
        {
            $selisih = $pemasukan->jumlah - $request->input('jumlah');
            $barang->stok -= $selisih; 
        }
        $pemasukan->kode_barang = $request->input('kode_barang');
        $pemasukan->harga = $request->input('harga');
        $pemasukan->jumlah = $request->input('jumlah');
        $pemasukan->tanggal_masuk = $request->input('tanggal');
        $pemasukan->total = $request->input('jumlah') * $request->input('harga');
        $pemasukan->sisa = $request->input('jumlah');
        $pemasukan->save();
        $barang->save();
        return redirect('barangmasuk')->with('success','Data barang masuk berhasil diupdate');
    }

    public function hapusbarangmasuk($id)
    {
        $pemasukan = Pemasukan::find($id); 
        $barang = Katalog::find($pemasukan->kode_barang); 
        $barang->stok -= $pemasukan->jumlah; 
        $barang->save();
        $pemasukan->delete();
        return redirect('barangmasuk')->with('success','Data barang masuk berhasil dihapus');
    }

    /* FUNGSI UNTUK DATA BARANG KELUAR */
    public function databarangkeluar()
    {
        $pengeluaran = Pengeluaran::all();
        return view('persediaan.databarangkeluar')->with('pengeluaran',$pengeluaran);
    }

    public function barangkeluar()
    {
        return view('persediaan.pengeluaran');
    }

    public function post_barangkeluar(Request $request)
    {
        $pengeluaran = new Pengeluaran();
        $barang = Katalog::find($request->input('kode_barang'));
        $pengeluaran->kode_barang = $request->input('kode_barang');
        $pengeluaran->jumlah = $request->input('jumlah');
        $pengeluaran->tanggal_keluar = $request->input('tanggal');
        $pengeluaran->keterangan = $request->input('keterangan');
        if($barang->stok < $request->input('jumlah'))
        {
            return redirect('barangkeluar/input')->with('error','Stok untuk barang '.$barang->nama_barang.' hanya tinggal : '.$barang->stok);
        }
        else {
            $barang->stok -= $request->input('jumlah');
            $pengeluaran->save();
            $barang->save();
            return redirect('barangkeluar')->with('success','Data barang keluar berhasil ditambahkan');
        }
    }


    public function updatebarangkeluar($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        return view('persediaan.updatepengeluaran')->with('data',$pengeluaran);
    }

    public function postupdatebarangkeluar($id,Request $request)
    {
        $Pengeluaran = Pengeluaran::find($id); 
        $barang = Katalog::find($request->input('kode_barang'));
       // dd($request->input('jumlah') < $pemasukan->jumlah);

        if($request->input('jumlah') < $Pengeluaran->jumlah)
        {
            $selisih = $Pengeluaran->jumlah - $request->input('jumlah');
            $barang->stok += $selisih;
        }else if($request->input('jumlah') > $Pengeluaran->jumlah)
        {
            if($request->input('jumlah') >  $barang->stok)
            {
                return redirect('barangkeluar/update/'.$id)->with('error','Stok untuk barang '.$barang->nama_barang.' hanya tinggal '.$barang->stok);
            }else {
                $selisih = $request->input('jumlah') -  $Pengeluaran->jumlah;
                $barang->stok -= $selisih; 
            }   
        }
        $Pengeluaran->kode_barang = $request->input('kode_barang');
        $Pengeluaran->jumlah = $request->input('jumlah');
        $Pengeluaran->tanggal_keluar = $request->input('tanggal');
        $Pengeluaran->keterangan = $request->input('keterangan');
        $Pengeluaran->save();
        $barang->save();
        return redirect('barangkeluar')->with('success','Data barang keluar berhasil diupdate');
    }

    public function hapusbarangkeluar($id)
    {
        $pengeluaran = Pengeluaran::find($id); 
        $barang = Katalog::find($pengeluaran->kode_barang);
        $barang->stok += $pengeluaran->jumlah; 
        $barang->save(); 
        $pengeluaran->delete();
        return redirect('barangkeluar')->with('success','Data barang keluar berhasil dihapus');
    }
}
