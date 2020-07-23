<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArtikelFoto extends Model
{
    //
		use SoftDeletes;

		protected $table = 'image_artikel_stcw';
    
    protected $fillable = [
        'id_artikel', 'foto_artikel', 'sumber_foto'
    ];

    protected $dates = ['deleted_at'];
}
