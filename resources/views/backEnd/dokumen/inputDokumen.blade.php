@extends('layoutEnd.app2')
@section('title','Input DokumenFoto')
@section('content')  

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dokumen Foto
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
          <form class="forms-sample" method="POST" action="{{ route('Dokumen.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
              <div class="form-group">
                @if (session('alert'))
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Perhatian !!</h4>
                    Data DokumenFoto Sukses Di Tambahkan.
                  </div>
                @endif
              </div> 
              <div class="form-group">
                <label>Media Dokumen Foto</label>
                <input type="file" name="fotoDokumenFoto[]" class="file-upload-default" multiple="multiple">
                <p class="help-block">Example block-level help text here.</p>
              </div>            
              <input type="text" class="form-control" id="exampleInputName1" placeholder="Judul" name="jenisMedia" value="1">
              <input type="text" class="form-control" id="exampleInputName1" placeholder="Judul" name="Uploaded" value="yoga">             
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
</div>

@endsection