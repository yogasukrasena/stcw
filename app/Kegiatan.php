<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kegiatan extends Model
{
    //
		use SoftDeletes;

		protected $table = 'kegiatan_stcw';
    
    protected $fillable = [
        'nama_kegiatan', 'tanggal_mulai', 'tanggal_berakhir'
    ];

    protected $dates = ['deleted_at'];
}
