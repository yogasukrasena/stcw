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
        @foreach($editPrestasi as $data)
          <form class="forms-sample" method="POST" action="{{ route('Prestasi.update', $data->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
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
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Judul" name="namaPrestasi" value="{{ $data->nama_prestasi }}">
              </div>                                                                                                
              <div class="form-group">
                <label for="exampleFormControlSelect1">Juara Ke</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="juaraIn">
                  @if ($data->juara == null) <option value="" selected="">Juara</option>
                  @elseif ($data->juara == 1)<option value="1" selected="">Juara 1</option>
                  @elseif ($data->juara == 2)<option value="2">Juara 2</option>
                  @elseif ($data->juara == 3)<option value="3">Juara 3</option>
                  @elseif ($data->juara == 4)<option value="4">Juara Harapan 1</option>
                  @elseif ($data->juara == 5)<option value="5">Juara Harapan 2</option>
                  @elseif ($data->juara == 6)<option value="6">Juara Harapan 3</option>
                  @endif
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Tingkatan Juara</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="tingkatIn">
                  @if ($data->tingkat_prestasi == null)<option value="">Tingkat Juara</option>
                  @elseif ($data->tingkat_prestasi == 1)<option value="0">Desa</option>
                  @elseif ($data->tingkat_prestasi == 2)<option value="1">Kecamatan</option>
                  @elseif ($data->tingkat_prestasi == 3)<option value="2">Kabupaten</option>
                  @elseif ($data->tingkat_prestasi == 4)<option value="3">Provinsi</option>
                  @elseif ($data->tingkat_prestasi == 5)<option value="4">Nasional</option>
                  @elseif ($data->tingkat_prestasi == 6)<option value="5">Internasional</option>
                  @endif
                </select>
              </div>                                  
              <div class="form-group">
                <label>Deskripsi Prestasi</label>              
                  <textarea id="editor1" rows="10" cols="80" name="isiPrestasi">
                    {{ $data->isi_prestasi }}
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

@endforeach
@endsection