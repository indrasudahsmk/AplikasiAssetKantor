<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jabatan extends Model
{
    use SoftDeletes;

    protected $table = 'jabatan';
    protected $primaryKey = 'id_jabatan';
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'jabatan',
        'created_id',
        'updated_id',
        'deleted_id'
    ];

    protected $dates = ['deleted_at'];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_jabatan', 'id_jabatan');
    }
}
