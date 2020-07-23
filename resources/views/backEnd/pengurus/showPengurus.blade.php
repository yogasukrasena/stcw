@extends('layoutEnd.app2')
@section('title','Pengurus Stcw')
@section('content')  

  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pengurus
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Advanced Elements</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Input Pengurus</h3>
          </div>
            <form class="forms-sample" method="POST" action="{{ route('Pengurus.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  @if (session('alert'))
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <strong>Sukses!!!</strong> {{ session('alert') }} <a href="" class="alert-link">Lanjutkan</a>.
                    </div>
                  @endif
                </div> 
                <div class="form-group">
                  <label>Tingkat Pengurus</label>
                  <input type="text" class="form-control" id="exampleInputName1" placeholder="Tingkat Pengurus" name="tingkatPengurus">
                </div>                                                                          
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>              
              </div>
            </form>
          </div>
        </div>
      </div>
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
              <a href="{{ route('admin.trashPengurus') }}" class="btn btn-block btn-danger btn-xs">Trash</a>
            </div>            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tingkat Pengurus</th>                                  
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($pengurus as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>                                                               
                    <td>{{ $data->nama_kepengurusan }}</td>
                    <td>                                          
                      <a href="{{ route('admin.deletePengurus', $data->id) }}" class="btn btn-block btn-danger btn-xs">Hapus</a>
                    </td>                  
                  </tr>
                  @endforeach                 
                </tbody>               
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Tingkat Pengurus</th>                                  
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