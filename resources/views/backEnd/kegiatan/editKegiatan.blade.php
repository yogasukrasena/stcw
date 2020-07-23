@extends('layoutEnd.app2')
@section('title','Input Artikel')
@section('content')  

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Kegiatan
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
          <h3 class="box-title">Input Kegiatan</h3>
        </div>
        @foreach($editKegiatan as $data)
          <form class="forms-sample" method="POST" action="{{ route('Kegiatan.update', $data->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
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
                <label for="exampleInputName1">Nama Kegiatan</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Judul" name="namaKegiatan" value="{{ $data->nama_kegiatan }}">
              </div>                                                                                     
              <div class="form-group">
                <label for="exampleInputCity1">Tanggal Mulai</label>
                <input type="date" class="form-control" id="exampleInputCity1" placeholder="Location" name="tanggalMulai" value="{{ $data->tanggal_mulai }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Tanggal Berakhir</label>
                <input type="date" class="form-control" id="exampleInputCity1" placeholder="Location" name="tanggalBerakhir" value="{{ $data->tanggal_berakhir }}">
              </div>                                       
            </div>                                    
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>              
            </div>
          </form>
          @endforeach
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
