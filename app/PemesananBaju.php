<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemesananBaju extends Model
{
    //
	use SoftDeletes;

	protected $table = 'pemesan_baju_stcw';
    
    protected $fillable = [
        'id_baju', 'nama_pemesan', 'ukuran_baju', 'jumlah_baju', 'gender_baju', 'status', 'created_at'
    ];

    protected $dates = ['deleted_at'];

}
