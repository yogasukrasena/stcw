@extends('layoutEnd.app2')
@section('title','Edit Artikel')
@section('content')  

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Artikel
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
          <h3 class="box-title">Edit Artikel</h3>
        </div>
        @foreach($editArtikel as $data)
          <form class="forms-sample" method="POST" action="{{ route('Artikel.update', $data->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
              @if (session('alert'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Perhatian !!</h4>
                  Data Artikel Sukses Di Perbaharui.
                </div>
              @endif
            </div>
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputName1">Judul Artikel</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Judul" name="judulArtikel" value="{{ $data->judul }}">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Sumber Foto</label>
                <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location" name="sumberFoto" value="{{ $data->sumber_foto }}">
              </div>                   
              <div class="form-group">
                <label>Foto-foto Artikel</label>
                <a href="{{ route('admin.editFotoArt', $data->id) }}" class="btn btn-block btn bg-navy btn-xs">Detail </a>
              </div>                                                                                    
              <div class="form-group">
                <label>Isi Artikel</label>              
                  <textarea id="editor1" rows="10" cols="80" name="isiArtikel">
                    {{ $data->isi_artikel }}
                  </textarea>              
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