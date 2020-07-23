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
          <form class="forms-sample" method="POST" action="{{ route('admin.anggotaProfile', $data->id) }}" enctype="multipart/form-data">
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
                 <img src="{{ asset('images/fotoAnggota/'.$data->profile_image) }}" height="300" width="350">                 
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Foto Profile Baru</label>
                <input type="file" name="fotoAnggota[]" class="file-upload-default">
                <p class="help-block">Example block-level help text here.</p>
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