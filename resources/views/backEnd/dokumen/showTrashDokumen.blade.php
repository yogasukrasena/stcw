@extends('layoutEnd.app2')
@section('title','Dokumen Stcw')
@section('content')  

  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dokumen Trash
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Advanced Elements</li>
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
              <a href="{{ route('admin.restoreDokumenAll') }}" class="btn btn-block btn-primary btn-xs">Restore All</a>
              <a href="{{ route('admin.forceDeleteDokumenAll') }}" class="btn btn-block btn-danger btn-xs">Delete All</a>   
            </div>            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>File</th>
                  <th>Jenis File</th>
                  <th>Dokumentasi Untuk</th>
                  <th>Unggahan</th>                  
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($dokumen as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($data->jenis_media == 1) <img src="{{ asset('images/fotoDokumen/'.$data->media) }}" height="100" width="150">
                        @else {{ $data->media }}
                        @endif
                    </td>
                    <td>
                        @if ($data->jenis_media == 1) Foto 
                        @else Video
                        @endif
                    </td>
                    <td>
                        @if ($data->doc_for == 0) STCW
                        @elseif ($data->doc_for == 1) Mata Hati
                        @elseif ($data->doc_for == 2) Sekaan Gong
                        @endif
                    </td>                    
                    <td>{{ $data->uploaded }}</td>
                    <td>                    
                      <a href="{{ route('admin.restoreDokumen', $data->id) }}" class="btn btn-block btn-primary btn-xs">Restore</a> 
                      <a href="{{ route('admin.forceDeleteDokumen', $data->id) }}" class="btn btn-block btn-danger btn-xs">Delete</a>
                    </td>                  
                  </tr>
                  @endforeach                 
                </tbody>               
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>File</th>
                  <th>Jenis File</th>
                  <th>Dokumentasi Untuk</th>
                  <th>Unggahan</th>                  
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