<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetBidang extends Model
{
    use SoftDeletes;

    protected $table = 'aset_bidang';

    protected $primaryKey = 'id_aset';

    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'id_barang',
        'id_bidang',
        'status',
        'created_id',
        'updated_id',
        'deleted_id',
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
