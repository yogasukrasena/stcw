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
          <h3 class="box-title">Edit Anggota</h3>
        </div>
        @foreach($anggota as $data)
          <form class="forms-sample" method="POST" action="{{ route('Anggota.update', $data->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
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
                 <img src="{{ asset('images/fotoAnggota/'.$data->profile_image) }}" height="200" width="250">                 
              </div>
              <div class="form-group">
                <a href="{{ route('Anggota.show', $data->id) }}" type="button" class="btn btn-primary">Edit Foto</a></div>             
              <div class="form-group">
                <label for="exampleInputName1">Nama Anggota</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama" name="namaAnggota" value="{{ $data->nama_anggota }}">
              </div>                            
              <div class="form-group">
                <label for="exampleInputName1">Email</label>
                <input type="email" class="form-control" id="exampleInputName1" placeholder="Email" name="emailAnggota" value="{{ $data->email }}">
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Nomer Telepon</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Nomer Hp" name="nomerTlpn" value="{{ $data->no_tlpn }}">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Status Anggota</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="statusAnggota">
                  @if($data->status == null)<option value="" selected="selected">Status</option> @else <option value="">Status</option> @endif
                  @if($data->status == 1)<option value="1" selected="selected">Aktif</option> @else <option value="1">Aktif</option> @endif
                  @if($data->status == 2)<option value="2" selected="selected">Non Aktif (Menikah)</option>
                  @else <option value="2">Non Aktif (Menikah)</option> @endif                 
                  @if($data->status == 3)<option value="3" selected="selected">Non Aktif (Meninggal)</option> @else <option value="3">Non Aktif (Meninggal)</option> @endif
                  @if($data->status == 4)<option value="4" selected="selected">Non Aktif (Diberhentikan)</option> @else <option value="4">Non Aktif (Diberhentikan)</option> @endif       
                  @if($data->status == 5)<option value="5" selected="selected">Belum di Verifikasi</option> @else <option value="5">Belum di Verifikasi</option> @endif           
                </select>
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