<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MutasiAsset extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mutasi_aset';
    protected $primaryKey = 'id_mutasi';

    protected $fillable = [
        'id_barang',
        'dari_bidang',
        'ke_bidang',
        'tanggal_mutasi',
        'created_id',
        'updated_id',
        'deleted_id',
    ];

    protected $dates = ['deleted_at'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function dariBidang()
    {
        return $this->belongsTo(Bidang::class, 'dari_bidang', 'id_bidang');
    }

    public function keBidang()
    {
        return $this->belongsTo(Bidang::class, 'ke_bidang', 'id_bidang');
    }
}
