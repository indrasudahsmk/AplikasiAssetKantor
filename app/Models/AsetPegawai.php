<?php

namespace App\Models;

use App\Traits\HistoryLoggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsetPegawai extends Model
{
    use SoftDeletes;
    use HistoryLoggable;

    protected $table = 'aset_pegawai';
    protected $primaryKey = 'id_aset';
    public $timestamps = true;

    protected $fillable = [
        'id_barang',
        'status',
        'id_pegawai',
        'created_id',
        'updated_id',
        'deleted_id',
    ];

    protected $historyMapping = [
        'id_barang'     => 'id_barang',
        'status_barang' => 'status',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
