<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;
use App\Models\TipoMuestra;
use App\Models\Servicio;
class Muestra extends Model
{
    use HasFactory;
    protected $fillable = ["paciente_id", "tipo_muestra_id", "subtipo_muestra_id", "punto_generacion_id", "material", "localizacion", "diagnostico", "observaciones", "frascos", "medico", "preparador", "atb"];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function tipoMuestra() {
        return $this->belongsTo(TipoMuestra::class, 'tipo_muestra_id');
    }

    public function subtipoMuestra() {
        return $this->belongsTo(SubtipoMuestra::class, 'subtipo_muestra_id');
    }

    public function servicio() {
        return $this->belongsTo(Servicio::class, "punto_generacion_id");
    }

    public function trazabilidades() {
        return $this->morphMany("App\Models\Trazabilidad", 'model');
    }
}
