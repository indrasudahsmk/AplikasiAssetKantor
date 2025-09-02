<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kantor extends Model
{
    use SoftDeletes;

    protected $table = 'kantor';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'kantor',
        'alamat',
        'created_id',
        'updated_id',
        'deleted_id'
    ];

    protected $dates = ['deleted_at'];

    public function bidang()
    {
        return $this->hasMany(Bidang::class, 'id_kantor', 'id');
    }
}
