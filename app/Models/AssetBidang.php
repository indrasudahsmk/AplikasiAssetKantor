<?php

namespace App\Models;

use App\Traits\HistoryLoggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetBidang extends Model
{
    use SoftDeletes;
    use HistoryLoggable;

    protected $table = 'aset_bidang';
    protected $primaryKey = 'id_aset';
    protected $fillable = [
        'id_barang',
        'id_bidang',
        'status',
        'created_id',
        'updated_id',
        'deleted_id',
    ];

    protected $historyMapping = [
        'id_barang'     => 'id_barang',
        'id_bidang'     => 'id_bidang',
        'status_barang' => 'status',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'id_bidang', 'id_bidang');
    }
}
