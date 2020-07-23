<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemasukanBukti extends Model
{
    //
		use SoftDeletes;

		protected $table = 'bukti_pemasukan_stcw';
    
    protected $fillable = [
        'id_pemasukan', 'foto_bukti'
    ];

    protected $dates = ['deleted_at'];

}
