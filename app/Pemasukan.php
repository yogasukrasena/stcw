<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemasukan extends Model
{
    //
		use SoftDeletes;

		protected $table = 'pemasukan_stcw';
    
    protected $fillable = [
        'nama_barang_jasa', 'nominal', 'sumber_dana'
    ];

    protected $dates = ['deleted_at'];
}
