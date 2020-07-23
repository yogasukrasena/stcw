<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengurus extends Model
{
    //
	use SoftDeletes;

		protected $table = 'pengurus_stcw';
    
    protected $fillable = [
        'nama_pengurus'
    ];

    protected $dates = ['deleted_at'];
}
