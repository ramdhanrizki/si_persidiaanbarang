@extends('template.admin')
@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Barang Keluar</h3>
                <a href="barangkeluar/input" class="btn btn-success pull-right"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
            </div>
            <div class="box-body">
                @if (\Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p>{{ \Session::get('success') }}</p>
                    </div><br />
                @endif
                @if (\Session::has('error'))
                    <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p>{{ \Session::get('error') }}</p>
                    </div><br />
                @endif
                <table class="table table-bordered" id="datatable">
                    <thead>
                        <th>#</th>
                        <th width="10%">Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Keluar</th>
                        <th>Tanggal Keluar</th>
                        <th>Keterangan</th>
                        <th width="15%">Action</th>
                    </thead>
                    <tbody>
                        <?php 
                            $no=0; 
                            $total = 0;
                        ?>
                        @foreach($pengeluaran as $item)
                        <tr>
                            <?php 
                                $no++;
                                $total += $item->total;
                            ?>
                            <td>{{$no}}</td>
                            <td>{{$item->kode_barang}}</td>
                            <td>{{$item->barang->nama_barang}}</td>
                            <td>{{$item->jumlah}}</td>
                            <td>{{$item->tanggal_keluar}}</td>
                            <td>{{$item->keterangan}}</td>
                            <td>
                                <a href="barangkeluar/update/{{$item->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i>&nbsp;Update</a>
                                <a href="barangkeluar/hapus/{{$item->id}}" onclick="return confirm('Apakah anda yakin akan menghapus data barang keluar untuk {{$item->barang->nama_barang}}?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>
@endpush