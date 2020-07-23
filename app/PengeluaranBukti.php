<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengeluaranBukti extends Model
{
    //
	use SoftDeletes;

		protected $table = 'bukti_pengeluaran_stcw';
    
    protected $fillable = [
        'id_pengeluaran', 'foto_bukti'
    ];

    protected $dates = ['deleted_at'];
}
