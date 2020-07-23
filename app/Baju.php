<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Baju extends Model
{
    //
    use SoftDeletes;

	protected $table = 'baju_stcw';
    
    protected $fillable = [
        'nama_baju', 'desk_baju', 'foto_baju', 'harga_baju', 'created_at'
    ];

    protected $dates = ['deleted_at'];
}
