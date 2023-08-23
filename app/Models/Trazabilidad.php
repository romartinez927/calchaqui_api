<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trazabilidad extends Model
{
    protected $table = 'trazabilidades';
    protected $fillable = ["model_id","model_type", "recibido_por", "entregado_por", "url_informe"];
    use HasFactory;

    public function model()
    {
        return $this->morphTo();
    }

    public function puntoDeControl() {
        return $this->belongsTo(PuntoDeControl::class, 'punto_de_control_id');
    }
}
