@extends('template.admin')
@section('content')
<div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Update Profile</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
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
        <form role="form" method="post" action="">
            @csrf
            <input type="hidden" name="id" value="{{Auth::user()->id}}">
            <div class="box-body">
            <div class="form-group">
                <label for="kode_barang">Nama</label>
                <input type="text" class="form-control" id="kode_barang" name="nama" placeholder="Masukkan Kode Barang" value="{{Auth::user()->name}}" data-validation="required">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Masukkan Email Anda" value="{{Auth::user()->email}}" data-validation="required">
            </div>
            <div class="form-group">
                <label >Password</label>
                <input type="password" class="form-control" name="password" placeholder="Ketikkan password baru apabila ingin mengubah"  > *) Kosongkan apabila tidak ingin mengubah password
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
