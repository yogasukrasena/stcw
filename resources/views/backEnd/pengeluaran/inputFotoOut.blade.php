@extends('layoutEnd.app')
@section('title','Input Artikel')
@section('content')  

  <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Input Foto</h4>
                  <p class="card-description">
                    Masukan Foto untuk Bukti Pengeluaran yang Sesuai dan Tepat
                  </p>
                  <form class="forms-sample" method="POST" action="{{ route('admin.storeFotoOut') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      @if (session('alert'))
                        <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <strong>Sukses!!!</strong> {{ session('alert') }} <a href="" class="alert-link">Lanjutkan</a>.
                        </div>
                      @endif
                    </div>                    
                      <input type="hidden" class="form-control" id="exampleInputName1" placeholder="Judul" name="idBukti" value="{{ $showFoto->id }}">            
                    <div class="form-group">
                      <label>Foto Bukti Pengeluaran</label>
                      <input type="file" name="fotoPengeluaran[]" class="file-upload-default" multiple="multiple">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>                                                      
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>       
          </div>
        </div>
      </div>
    </div>

@endsection