@extends('layoutEnd.app2')
@section('title','Dokumen Stcw')
@section('content')  

  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dokumen
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
            <h3 class="box-title">Input Dokumen Foto</h3>
          </div>
            <form class="forms-sample" method="POST" action="{{ route('admin.storeFotoDoc') }}" enctype="multipart/form-data">
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
                  <label>Media Dokumen Foto</label>
                  <input type="file" name="DokumenFoto[]" class="file-upload-default" multiple="multiple">
                  <p class="help-block">Example block-level help text here.</p>
                </div>            
                <input type="hidden" class="form-control" id="exampleInputName1" placeholder="Judul" name="jenisMedia" value="1">
                <input type="hidden" class="form-control" id="exampleInputName1" placeholder="Judul" name="admin" value="yoga">             
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Dokumentasi Untuk</label>
                  <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="dokumenUntuk">
                    <option value="">Dokumentasi</option>
                    <option value="0">STCW</option>
                    <option value="1">Mata Hati</option>
                    <option value="2">Sekaan Gong</option>                  
                  </select>
                </div>                                                                                    
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>              
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>  

    <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Input Dokumen Video</h3>
          </div>
            <form class="forms-sample" method="POST" action="{{ route('admin.storeVideoDoc') }}" enctype="multipart/form-data">
              @csrf
              <div class="box-body">                
                <div class="form-group">
                  <label>Media Dokumen Video</label>
                  <input type="text" class="form-control" id="exampleInputName1" placeholder="Link Video" name="DokumenVideo">
                </div>            
                <input type="hidden" class="form-control" id="exampleInputName1" placeholder="Judul" name="jenisMedia" value="0">
                <input type="hidden" class="form-control" id="exampleInputName1" placeholder="Judul" name="admin" value="yoga">             
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Dokumentasi Untuk</label>
                  <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="dokumenUntuk">
                    <option value="">Dokumentasi</option>
                    <option value="0">STCW</option>
                    <option value="1">Mata Hati</option>
                    <option value="2">Sekaan Gong</option>                  
                  </select>
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
              <a href="{{ route('admin.trashDokumen') }}" class="btn btn-block btn-danger btn-xs">Trash</a>
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
                 @foreach($showDokumen as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($data->jenis_media == 1) <img src="{{ asset('images/fotoDokumen/'.$data->media) }}" height="100" width="150">
                        @else {{ $data->media }}
                        @endif</td>
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
                      <a href="{{ route('admin.deleteDokumen', $data->id) }}" class="btn btn-block btn-danger btn-xs">Hapus</a>
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