<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryPengembalianBarang extends Model
{
    use SoftDeletes;

    protected $table = 'table_history_pengembalian_barang';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tanggal',
        'id_pegawai',
        'id_aset',
        'id_bidang',
        'id_barang',
        'status_barang',
        'keterangan',
        'keterangan_aksi',
        'jenis_aset',
        'created_id',
        'updated_id',
        'deleted_id',
    ];

    protected $dates = [
        'tanggal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relasi
    |--------------------------------------------------------------------------
    */

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'id_bidang', 'id_bidang');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function asetPegawai()
    {
        return $this->belongsTo(AsetPegawai::class, 'id_aset', 'id_aset');
    }

    public function asetBidang()
    {
        return $this->belongsTo(AssetBidang::class, 'id_aset', 'id_aset');
    }

    /*
    |--------------------------------------------------------------------------
    | Helper untuk akses aset sesuai jenis_aset
    |--------------------------------------------------------------------------
    */
    public function getAsetAttribute()
    {
        if ($this->jenis_aset === 'aset_pegawai') {
            return $this->asetPegawai;
        } elseif ($this->jenis_aset === 'aset_bidang') {
            return $this->asetBidang;
        }
        return null;
    }
}
