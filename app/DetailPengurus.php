<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPengurus extends Model
{
    //
	use SoftDeletes;

	protected $table = 'detail_pengurus_stcw';
    
    protected $fillable = [
        'id_pengurus', 'id_anggota', 'mulai_menjabat', 'akhir_menjabat', 'created_at'
    ];

    protected $dates = ['deleted_at'];
}
