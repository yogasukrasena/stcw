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
          @foreach($pemasukan as $data)
          <form class="forms-sample" method="POST" action="{{ route('Pemasukan.update', $data->id) }}" >
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
                <label for="exampleInputName1">Nama Barang/Jasa</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Barang/Jasa" name="namaBarang" value="{{ $data->nama_barang_jasa }}">
              </div>                                                                                                
              <div class="form-group">
                <label for="exampleInputCity1">Harga/Nominal</label>
                <input type="number" class="form-control" id="exampleInputCity1" placeholder="Rp.xxxx" name="harga" value="{{ $data->nominal }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Sumber Dana</label>
                <input type="text" class="form-control" id="exampleInputCity1" placeholder="Sumber Dana" name="sumberDana" value="{{ $data->sumber_dana }}">
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