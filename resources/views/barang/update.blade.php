@extends('template.admin')
@section('content')
<div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Barang</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="">
            @csrf
            <div class="box-body">
            <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Masukkan Kode Barang" data-validation="required" value="{{$katalog->kode_barang}}">
            </div>
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" data-validation="required" value="{{$katalog->nama_barang}}">
            </div>
            <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan Jenis Satuan Barang, Contoh : Pak, Dus, Paket.." data-validation="required" value="{{$katalog->satuan}}">
            </div>
            <div class="form-group">
                <label for="nama_barang">Spesifikasi</label>
                <textarea name="spesifikasi" id="spesifikasi" class="form-control" data-validation="required">{{$katalog->spesifikasi}}</textarea>
            </div>
            
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        </div>
        <!-- /.box -->

    </div>
</div>
@endsection

@push('script')
    <script>
        $.validate();
    </script>
@endpush