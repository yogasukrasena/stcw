@extends('layoutEnd.app2')
@section('title','Input Artikel')
@section('content')  

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Pemasukan 
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
          <h3 class="box-title">Input Pemasukan</h3>
        </div>
          <form class="forms-sample" method="POST" action="{{ route('Prestasi.store') }}" enctype="multipart/form-data">
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
                <label for="exampleInputName1">Nama Prestasi</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Judul" name="namaPrestasi">
              </div>                                                                                                
              <div class="form-group">
                <label for="exampleFormControlSelect1">Juara Ke</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="juaraIn">
                  <option value="">Juara</option>
                  <option value="1">Juara 1</option>
                  <option value="2">Juara 2</option>
                  <option value="3">Juara 3</option>
                  <option value="4">Juara Harapan 1</option>
                  <option value="5">Juara Harapan 2</option>
                  <option value="6">Juara Harapan 3</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Tingkatan Juara</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="tingkatIn">
                  <option value="">Tingkat Juara</option>
                  <option value="0">Desa</option>
                  <option value="1">Kecamatan</option>
                  <option value="2">Kabupaten</option>
                  <option value="3">Provinsi</option>
                  <option value="4">Nasional</option>
                  <option value="5">Internasional</option>
                </select>
              </div>                    
              <div class="form-group">
                <label>Foto-Prestasi</label>
                <input type="file" name="fotoPrestasi[]" class="file-upload-default" >
                <p class="help-block">Example block-level help text here.</p>
              </div>
              <div class="form-group">
                <label>Deskripsi Prestasi</label>              
                  <textarea id="editor1" rows="10" cols="80" name="isiPrestasi">
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