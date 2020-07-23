<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artikel extends Model
{
    //
		use SoftDeletes;

		protected $table = 'artikel_stcw';
    
    protected $fillable = [
        'judul', 'cover_foto', 'tanggal_pembuatan', 'isi_artikel', 'penulis', 'created_at'
    ];

    protected $dates = ['deleted_at'];
}
