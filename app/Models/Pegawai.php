<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Pegawai extends Authenticatable
{
    use SoftDeletes, Notifiable;

    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'nip_nik',
        'username',
        'password',
        'email',
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
