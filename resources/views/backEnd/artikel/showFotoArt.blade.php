@extends('layoutEnd.app2')
@section('title','Artikel Stcw')
@section('content')  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Foto Artikel
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input Foto Artikel</h3>
            </div>
              <form class="forms-sample" method="POST" action="{{ route('admin.storeFotoArt') }}" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                  <div class="form-group">
                    @if (session('alert'))
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Perhatian !!</h4>
                        {{ session('alert') }}
                      </div>
                    @elseif (count($errors) > 0)
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Perhatian !!</h4>
                        @foreach ($errors->all() as $error)
                          {{ $error }}
                        @endforeach
                      </div>
                    @endif
                  </div>  

                  <input type="hidden" class="form-control" id="exampleInputName1" placeholder="Judul" name="idArtikel" value="{{ $idFoto->id_artikel }}">            

                  <div class="form-group">
                    <label for="exampleInputCity1">Sumber Foto</label>
                    <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location" name="sumberFoto">
                  </div>                   
                  <div class="form-group">
                    <label>Foto-foto Artikel</label>
                    <input type="file" name="fotoArtikel[]" class="file-upload-default" multiple>
                    <p class="help-block">Example block-level help text here.</p>
                  </div>                                                                                    
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>              
                </div>
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
                <a href="{{ route('admin.trashFotoArtikel') }}" class="btn btn-block btn-danger btn-xs">Trash</a>
            </div>            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Foto</th>
                  <th>Foto</th>                  
                  <th>Opsi</th> 
                </tr>
                </thead>
                <tbody>
                  @foreach($showFoto as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->foto_artikel }}</td>
                    <td><img src="{{ asset('images/fotoArtikel/'.$data->foto_artikel) }}" height="100" width="150"></td>
                    <td>
                      <a href="{{ route('admin.deleteFotoArt', $data->id) }}" class="btn btn-block btn-danger btn-xs">
                      Hapus</a>                                       
                    </td>                  
                  </tr>
                  @endforeach                
                </tbody>               
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Foto</th>
                  <th>Foto</th>                  
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