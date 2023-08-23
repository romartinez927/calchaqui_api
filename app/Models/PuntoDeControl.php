<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntoDeControl extends Model
{
    use HasFactory;
    protected $fillable = ["nombre", "disponible", "orden"];

    public function trazabilidades() {
        return $this->hasMany(Trazabilidad::class);
    }
}
