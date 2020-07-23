@extends('layoutEnd.app2')
@section('title','Artikel Stcw')
@section('content')  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pemesanan Baju
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
                   
              <a href="{{ route('Pemesanan.show', $pemesananBajuid->id) }}" class="btn btn-block btn-primary btn-xs">+ Tambahkan</a>
            
              <a href="{{ route('admin.trashPemesan') }}" class="btn btn-block btn-danger btn-xs">Trash</a>
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
                  <th>Nama Pemesan</th>
                  <th>Ukuran Baju</th>
                  <th>Jumlah Baju</th>
                  <th>Gender Baju</th>
                  <th>Status</th>                              
                  <th>Opsi</th>  
                </tr>
                </thead>
                <tbody>                  
                  @foreach($pemesananBaju as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_pemesan }}</td>
                    <td>{{ $data->ukuran_baju }}</td>
                    <td>{{ $data->jumlah_baju }}</td>
                    <td>{{ $data->gender_baju }}</td>
                    <td>                
                      @if ($data->status == 0) <option value="0">Belum Bayar</option>
                      @elseif ($data->status == 1)<option value="1">Bayar DP</option>
                      @elseif ($data->status == 2)<option value="2">Lunas</option>                      
                      @endif                  
                    </td>                                                          
                    <td> 
                      <a href="{{ route('Pemesanan.edit', $data->id) }}" class="btn btn-block btn-primary btn-xs">Edit</a> 
                      <a href="{{ route('admin.deletePemesan', $data->id) }}" class="btn btn-block btn-danger btn-xs">Hapus</a>
                    </td>                  
                  </tr>
                  @endforeach                 
                </tbody>               
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Pemesan</th>
                  <th>Ukuran Baju</th>
                  <th>Jumlah Baju</th>
                  <th>Gender Baju</th>
                  <th>Status</th>                              
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