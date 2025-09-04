<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipe extends Model
{
    use SoftDeletes;

    protected $table = 'tipe';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    
    public $timestamps = false;

    protected $fillable = [
        'tipe',
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
