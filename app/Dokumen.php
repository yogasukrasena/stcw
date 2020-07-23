<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokumen extends Model
{
    //
	use SoftDeletes;

	protected $table = 'dokumentasi_stcw';
  
  protected $fillable = [
      'media', 'jenis_media', 'doc_for', 'uploaded'
  ];

  protected $dates = ['deleted_at'];
}
