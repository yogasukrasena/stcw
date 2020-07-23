<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengeluaran extends Model
{
    //
	use SoftDeletes;

		protected $table = 'pengeluaran_stcw';
    
    protected $fillable = [
        'nama_barang_jasa', 'nominal', 'keperluan'
    ];

    protected $dates = ['deleted_at'];
}
