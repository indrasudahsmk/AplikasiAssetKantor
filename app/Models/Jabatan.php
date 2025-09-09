<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jabatan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jabatan';              
    protected $primaryKey = 'id_jabatan';     
    protected $keyType = 'int';               
    public $incrementing = true;              
    public $timestamps = false;                

    protected $fillable = [
        'jabatan',
        'created_id',
        'updated_id',
        'deleted_id',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_jabatan', 'id_jabatan');
    }
}
