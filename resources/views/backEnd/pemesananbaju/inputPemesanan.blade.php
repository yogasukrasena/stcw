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
          <form class="forms-sample" method="POST" action="{{ route('Pemesanan.store') }}" enctype="multipart/form-data">
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
              <input type="hidden" class="form-control" id="exampleInputName1" placeholder="Judul" name="idBaju" value="{{ $pemesananBaju->id }}">
              <div class="form-group">
                <label for="exampleInputName1">Nama Pemesan</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Pemesan" name="namaPemesan">
              </div>  

              <div class="form-group">
                <label for="exampleInputName1">Jumlah Baju</label>
                <input type="number" class="form-control" id="exampleInputName1" placeholder="Jumlah" name="jumlahBaju">
              </div> 

              <div class="form-group">
                <label for="exampleFormControlSelect1">Gender Baju</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="genderBaju">
                  <option value="">Gender Baju</option>
                  <option value="Laki-laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>                          
                </select>
              </div>  

              <div class="form-group">
                <label for="exampleFormControlSelect1">Ukuran Baju</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="ukuranBaju">
                  <option value="">Ukuran Baju</option>
                  <option value="S">S</option>
                  <option value="M">M</option>
                  <option value="L">L</option> 
                  <option value="XL">XL</option>
                  <option value="XXL">XXL</option>
                  <option value="XXXL">XXXL</option>                  
                </select>
              </div>  

              <div class="form-group">
                <label for="exampleFormControlSelect1">Status Pembayaran</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="statusPemesan">
                  <option value="0">Belum Bayar</option>
                  <option value="1">Bayar DP</option>
                  <option value="2">Lunas</option>                 
                </select>
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