@extends('layoutEnd.app2')
@section('title','Artikel Stcw')
@section('content')  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pemasukan
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <div class="box-body">
              <a href="{{ route('Pemasukan.create') }}" class="btn btn-block btn-primary btn-xs">+ Tambahkan</a>
              <a href="{{ route('admin.trashPemasukan') }}" class="btn btn-block btn-danger btn-xs">Trash</a>              
            </div>
            <div class="box-body">
              @if (session('alert'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Sukses!!!</strong> {{ session('alert') }} <a href="" class="alert-link">Lanjutkan</a>.
                </div>
              @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Barang/Jasa</th>
                  <th>Nominal/Harga</th>
                  <th>Sumber Dana</th>
                  <th>Detail</th>
                  <th>Opsi</th>                  
                </tr>
                </thead>
                <tbody>                  
                 @foreach($pemasukan as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_barang_jasa }}</td>
                    <td>Rp.{{ number_format($data->nominal) }}</td>
                    <td>{{ $data->sumber_dana }}</td>
                     <td><a href="{{ route('admin.showFotoIn', $data->id) }}" class="btn btn-block btn-info btn-xs">Detail</a></td>
                    <td>                    
                      <a href="{{ route('Pemasukan.edit', $data->id) }}" class="btn btn-block btn-primary btn-xs">Edit</a> 
                      <a href="{{ route('admin.deletePemasukan', $data->id) }}" class="btn btn-block btn-danger btn-xs">Hapus</a>
                    </td>                  
                  </tr>
                  @endforeach                 
                </tbody>               
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Barang/Jasa</th>
                  <th>Nominal/Harga</th>
                  <th>Sumber Dana</th>
                  <th>Detail</th>
                  <th>Opsi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 @endsection