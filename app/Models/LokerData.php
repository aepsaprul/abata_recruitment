<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokerData extends Model
{
    use HasFactory;

    protected $table = "loker_datas";

    public function jabatan() {
        return $this->belongsTo(MasterJabatan::class, 'jabatan_id', 'id');
    }
}
