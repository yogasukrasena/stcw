@extends('layoutEnd.app2')
@section('title','Input Artikel')
@section('content')  

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Baju
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
          <h3 class="box-title">Input Baju</h3>
        </div>
          <form class="forms-sample" method="POST" action="{{ route('Baju.store') }}" enctype="multipart/form-data">
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
                <label for="exampleInputName1">Nama Baju</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama" name="namaBaju">
              </div>                                                                                                
              <div class="form-group">
                <label for="exampleInputName1">Harga Baju</label>
                <input type="number" class="form-control" id="exampleInputName1" placeholder="Harga" name="hargaBaju">
              </div>  
                         
              <div class="form-group">
                <label>Foto-Baju</label>
                <input type="file" name="fotoBaju[]" class="file-upload-default" >
                <p class="help-block">Example block-level help text here.</p>
              </div>
              <div class="form-group">
                <label>Deskripsi Baju</label>              
                  <textarea id="editor1" rows="10" cols="80" name="isiBaju">
                    Tulis Isi Deskripsi dengan benar dan bijak.
                  </textarea>    
              </div>                                      
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>


@endsection