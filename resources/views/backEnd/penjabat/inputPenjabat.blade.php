@extends('layoutEnd.app2')
@section('title','Input Artikel')
@section('content')  

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Penjabat Pengurus
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
          <h3 class="box-title">Input Penjabat</h3>
        </div>
          <form class="forms-sample" method="POST" action="{{ route('Penjabat.store') }}" enctype="multipart/form-data">
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
                <label for="exampleFormControlSelect1">Nama Pengurus</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="namaPengurus">
                  <option value="">Nama Anggota</option>  
                  @foreach($anggota as $data)                  
                    <option value="{{ $data->id }}">{{ $data->nama_anggota }}</option>                    
                  @endforeach  
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Jabatan</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="jabatan">
                  <option value="">Jabatan</option>
                  @foreach($pengurus as $data)                  
                    <option value="{{ $data->id }}">{{ $data->nama_kepengurusan }}</option>                    
                  @endforeach 
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Tanggal Menjabat</label>
                <input type="date" class="form-control" id="exampleInputName1" placeholder="Judul" name="tglMenjabat">
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