@extends('layoutEnd.app2')
@section('title','Input Artikel')
@section('content')  

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Anggota
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
          <h3 class="box-title">Input Anggota</h3>
        </div>
          <form class="forms-sample" method="POST" action="{{ route('Anggota.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
              <div class="form-group">
                @if (session('alert'))
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Perhatian !!</h4>
                    Data Anggota Sukses Di Tambahkan.
                  </div>
                @endif
              </div>            
              <div class="form-group">
                <label for="exampleInputName1">Nama Anggota</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama" name="namaAnggota">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Foto Profile</label>
                <input type="file" name="fotoAnggota[]" class="file-upload-default">
                <p class="help-block">Example block-level help text here.</p>
              </div>                   
              <div class="form-group">
                <label for="exampleInputName1">Email</label>
                <input type="email" class="form-control" id="exampleInputName1" placeholder="Email" name="emailAnggota">
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Nomer Telepon</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Nomer Hp" name="nomerTlpn">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Status Anggota</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="statusAnggota">
                  <option value="">Status</option>
                  <option value="1">Aktif</option>                  
                  <option value="2">Non Aktif (Menikah)</option>
                  <option value="3">Non Aktif (Meninggal)</option>
                  <option value="4">Non Aktif (Diberhentikan)</option>                 
                  <option value="5">Belum di Verifikasi</option>
                </select>
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