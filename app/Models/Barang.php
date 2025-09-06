<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use SoftDeletes;

    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    public $timestamps = true;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'id_jenis',
        'nomor_register',
        'id_merk',
        'id_tipe',
        'tahun_pembelian',
        'harga',
        'no_pabrik',
        'no_rangka',
        'no_mesin',
        'keterangan',
        'created_id',
        'updated_id',
        'deleted_id',
    ];

    /**
     * Relasi ke JenisBarang
     */
    public function jenis()
    {
        return $this->belongsTo(JenisBarang::class, 'id_jenis', 'id');
    }

    /**
     * Relasi ke Merk
     */
    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk', 'id');
    }

    /**
     * Relasi ke Tipe
     */
    public function tipe()
    {
        return $this->belongsTo(Tipe::class, 'id_tipe', 'id');
    }
}
