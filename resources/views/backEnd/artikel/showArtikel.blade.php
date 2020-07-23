@extends('layoutEnd.app2')
@section('title','Artikel Stcw')
@section('content')  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Artikel
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
              <a href="{{ route('Artikel.create') }}" class="btn btn-block btn-primary btn-xs">+ Tambahkan</a>
              <a href="{{ route('admin.trashArtikel') }}" class="btn btn-block btn-danger btn-xs">Trash</a>
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
                  <th>Judul</th>
                  <th>Penulis</th>
                  <th>Tanggal di Post</th>
                  <th>Detail</th>                  
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($showArtikel as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->judul }}</td>
                    <td>{{ $data->penulis }}</td>
                    <td>{{ $data->created_at }}</td>                    
                    <td><a href="{{ route('admin.editFotoArt', $data->id) }}" class="btn btn-block btn-info btn-xs">Detail</a></td>
                    <td>                    
                      <a href="{{ route('Artikel.edit', $data->id) }}" class="btn btn-block btn-primary btn-xs">Edit</a> 
                      <a href="{{ route('admin.deleteArtikel', $data->id) }}" class="btn btn-block btn-danger btn-xs">Hapus</a>
                    </td>                  
                  </tr>
                  @endforeach                 
                </tbody>               
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Penulis</th>
                  <th>Tanggal di Post</th>
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