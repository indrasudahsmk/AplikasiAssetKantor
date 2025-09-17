<?php

namespace App\Traits;

use App\Models\HistoryPengembalianBarang;
use Illuminate\Support\Facades\Auth;

trait HistoryLoggable
{
    public static function bootHistoryLoggable()
    {
        static::created(function ($model) {
            $model->saveHistory('store');
        });

        static::updated(function ($model) {
            $model->saveHistory('update');
        });

        static::deleted(function ($model) {
            $model->saveHistory('delete');
        });
    }

    public function saveHistory($aksi)
    {
        $mapping = $this->historyMapping ?? [];
        $userId  = Auth::check() ? Auth::user()->id_pegawai : null;

        $data = [
            'tanggal'         => now(),
            'id_pegawai'      => $userId,
            'keterangan_aksi' => $aksi,
            'jenis_aset'      => class_basename($this),

            'created_id'      => $aksi === 'store'  ? $userId : null,
            'updated_id'      => $aksi === 'update' ? $userId : null,
            'deleted_id'      => $aksi === 'delete' ? $userId : null,
        ];

        foreach ($mapping as $targetColumn => $modelColumn) {
            $value = $this->{$modelColumn} ?? null;

            if (in_array($targetColumn, [
                'id_aset',
                'id_barang',
                'id_bidang',
                'id_pegawai',
                'created_id',
                'updated_id',
                'deleted_id'
            ])) {
                $data[$targetColumn] = $value;
            } else {
                $data[$targetColumn] = $value ?? '-';
            }
        }

        HistoryPengembalianBarang::create($data);
    }
}
