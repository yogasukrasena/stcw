<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestasi extends Model
{
    //
	//
	use SoftDeletes;

		protected $table = 'prestasi_stcw';
    
    protected $fillable = [
        'nama_prestasi', 'juara', 'tingkat_prestasi', 
        'isi_prestasi', 'bukti_prestasi'
    ];

    protected $dates = ['deleted_at'];
}
