@extends('layoutEnd.app2')
@section('title','Input Artikel')
@section('content')  

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Pemesanan Baju
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
          <h3 class="box-title">Input Pemesanan</h3>
        </div>
        @foreach($pemesananBaju as $data)
          <form class="forms-sample" method="POST" action="{{ route('Pemesanan.update', $data->id) }}" enctype="multipart/form-data">
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
              <input type="hidden" class="form-control" id="exampleInputName1" placeholder="Judul" name="idBaju" value="{{ $data->id_baju }}">
              <div class="form-group">
                <label for="exampleInputName1">Nama Pemesan</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Pemesan" name="namaPemesan" value="{{ $data->nama_pemesan }}">
              </div>  

              <div class="form-group">
                <label for="exampleInputName1">Jumlah Baju</label>
                <input type="number" class="form-control" id="exampleInputName1" placeholder="Jumlah" name="jumlahBaju" value="{{ $data->jumlah_baju }}">
              </div> 

              <div class="form-group">
                <label for="exampleFormControlSelect1">Gender Baju</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="genderBaju">
                  @if ($data->gender_baju == null) <option value="" selected="selected">Gender Baju</option> @else <option value="">Gender Baju</option> @endif
                  @if ($data->gender_baju == "Laki-laki") <option value="Laki-laki" selected="selected">Laki-Laki</option> @else <option value="Laki-laki">Laki-Laki</option> @endif
                  @if ($data->gender_baju == "Perempuan")<option value="Perempuan" selected="selected">Perempuan</option> @else <option value="Perempuan">Perempuan</option> @endif            
                </select>
              </div>  

              <div class="form-group">
                <label for="exampleFormControlSelect1">Ukuran Baju</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="ukuranBaju">
                  @if ($data->ukuran_baju == null)<option value="" selected="">Ukuran Baju</option> @else <option value="">Ukuran Baju</option> @endif
                  @if ($data->ukuran_baju == "S")<option value="S" selected="">S</option> @else <option value="S">S</option> @endif
                  @if ($data->ukuran_baju == "M")<option value="M" selected="">M</option> @else <option value="M">M</option> @endif
                  @if ($data->ukuran_baju == "L")<option value="L" selected="">L</option> @else <option value="L">L</option> @endif
                  @if ($data->ukuran_baju == "XL")<option value="XL" selected="">XL</option> @else <option value="XL">XL</option> @endif
                  @if ($data->ukuran_baju == "XXL")<option value="XXL" selected="">XXL</option> @else <option value="XXL">XXL</option> @endif
                  @if ($data->ukuran_baju == "XXXL")<option value="XXXL" selected="">XXXL</option> @else <option value="XXXL">XXXL</option> @endif                                    
                </select>
              </div>  

              <div class="form-group">
                <label for="exampleFormControlSelect1">Status Pembayaran</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="statusPemesan">
                  @if ($data->status == 0)<option value="0" selected="">Belum Bayar</option> @else <option value="0">Belum Bayar</option> @endif
                  @if ($data->status == 1)<option value="1" selected="">Bayar DP</option> @else <option value="1">Bayar DP</option> @endif
                  @if ($data->status == 2)<option value="2" selected="">Lunas</option> @else <option value="2">Lunas</option> @endif                     
                </select>
              </div>                                             
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </div>
          </form>
          @endforeach
        </div>
      </div>
    </div>
  </section>
</div>


@endsection