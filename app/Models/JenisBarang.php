<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisBarang extends Model
{
    use SoftDeletes;

    protected $table = 'jenis_barang';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    
    public $timestamps = false;

    protected $fillable = [
        'jenis_barang',
        'created_id',
        'updated_id',
        'deleted_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
