<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $fillable = ["nombre", "disponible"];

    public function muestra()
    {
        return $this->hasOne(Muestra::class, 'muestra_id');
    }
}
