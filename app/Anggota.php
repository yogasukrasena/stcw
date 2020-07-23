<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    //
		use SoftDeletes;

		protected $table = 'anggota_stcw';
    
    protected $fillable = [
        'nama_anggota', 'profile_image', 'email', 'no_tlpn', 'status', 'created_at'
    ];

    protected $dates = ['deleted_at'];
}
