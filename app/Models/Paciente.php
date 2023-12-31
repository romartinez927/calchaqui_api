<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable = ["nombre", "apellido", "dni", "obra_social"];

    public function muestra() {
        return $this->belongsTo(Muestra::class, 'muestra_id');
    }

    public function trazabilidades() {
        return $this->morphMany("App\Models\Trazabilidad", 'model');
    }
}
