<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use SoftDeletes;

    protected $table = 'pegawai';

    protected $primaryKey = 'id_pegawai';

    protected $keyType = 'int';

    protected $fillable = [
        'nip_nik',
        'username',
        'password',
        'nama',
        'id_jabatan',
        'id_bidang',
        'status_pegawai',
        'created_id',
        'updated_id',
        'deleted_id'
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'id_bidang', 'id_bidang');
    }
}
