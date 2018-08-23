@extends('template.admin')
@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Input Barang Masuk</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="">
            @csrf
            <div class="box-body">
            <div class="form-group">
                <label for="kode_barang">Nama Barang</label>
                <select class="cari form-control" style="width:500px;" name="kode_barang" placeholder="Ketikkan kata kunci untuk mencari barang">
                    <option value="{{$data->kode_barang}}">{{$data->barang->nama_barang}}</option>
                </select>
                <small>*) Apabila barang tidak ada dalam pencarian, silakan tambahkan pada menu manajemen barang</small>
            </div>
            <div class="form-group">
                <label>Tanggal Masuk</label>
                <input type="date" name="tanggal" data-validation="required" value="{{ $data->tanggal_masuk }}" class="form-control">
            </div>
            <div class="form-group">
                <label >Harga Satuan</label>
                <input type="text" class="form-control"  name="harga" placeholder="Masukkan Harga satuan barang" data-validation="required" value="{{ $data->harga }}">
            </div>
            <div class="form-group">
                <label >Jumlah</label>
                <input type="number" name="jumlah" data-validation="required" class="form-control" value="{{$data->jumlah}}">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
$(document).ready(function(){
    $.validate();
    $('.cari').select2({
    placeholder: 'Ketikkan nama barang..',
    val:123,
    ajax: {
      url: '/api/getAllBarang',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
            return {
              text: item.nama_barang,
              id: item.kode_barang
            }
            
          })
        };
      },
      cache: true
    }
  });
});
</script>

@endpush