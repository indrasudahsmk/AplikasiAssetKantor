<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bidang extends Model
{
    use SoftDeletes;

    protected $table = 'bidang';
    protected $primaryKey = 'id_bidang';
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'nama_bidang',
        'id_kantor',
        'created_id',
        'updated_id',
        'deleted_id'
    ];

    protected $dates = ['deleted_at'];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_bidang', 'id_bidang');
    }

    public function kantor()
    {
        return $this->belongsTo(Kantor::class, 'id_kantor', 'id');
    }
}
