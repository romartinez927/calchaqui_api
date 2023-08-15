<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMuestra extends Model
{
    use HasFactory;
    protected $fillable = ["nombre", "disponible"];

    public function muestras()
    {
        return $this->hasMany(Muestra::class);
    }
}
