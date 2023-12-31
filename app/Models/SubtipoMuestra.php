<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubtipoMuestra extends Model
{
    use HasFactory;
    protected $table = 'subtipo_muestras';
    protected $fillable = ["nombre", "disponible"];

    // public function tipoMuestra()
    // {
    //     return $this->belongsTo(TipoMuestra::class, 'tipo_muestra_id');
    // }
}
