<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;
use App\Models\TipoMuestra;

class Muestra extends Model
{
    use HasFactory;
    protected $fillable = ["paciente_id", "tipo_muestra_id", "subtipo_muestra_id", "punto_generacion", "material", "localizacion", "diagnostico", "observaciones", "frascos"];

    public function paciente()
    {
        return $this->hasOne(Paciente::class);
    }

    public function tipoMuestra()
    {
        return $this->belongsTo(TipoMuestra::class, 'tipo_muestra_id');
    }

    public function subtipoMuestra()
    {
        return $this->belongsTo(SubtipoMuestra::class, 'subtipo_muestra_id');
    }
}
