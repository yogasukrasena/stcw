@extends('layoutEnd.app2')
@section('title','Input Artikel')
@section('content')  

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Artikel
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
          <h3 class="box-title">Input Artikel</h3>
        </div>
          <form class="forms-sample" method="POST" action="{{ route('Artikel.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
              <div class="form-group">
                @if (session('alert'))
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Perhatian !!</h4>
                    Data Artikel Sukses Di Tambahkan.
                  </div>
                @endif
              </div>            
              <div class="form-group">
                <label for="exampleInputName1">Judul Artikel</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Judul" name="judulArtikel">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Sumber Foto</label>
                <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location" name="sumberFoto">
              </div>                   
              <div class="form-group">
                <label>Foto-foto Artikel</label>
                <input type="file" name="fotoArtikel[]" class="file-upload-default" multiple="multiple">
                <p class="help-block">Example block-level help text here.</p>
              </div>                                                                                    
              <div class="form-group">
                <label>Isi Artikel</label>              
                  <textarea id="editor1" rows="10" cols="80" name="isiArtikel">
                    Tulis Isi Artikel dengan benar dan bijak.
                  </textarea>              
              </div>
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