<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMuestra extends Model
{
    use HasFactory;
    protected $table = 'tipo_muestras';
    protected $fillable = ["nombre", "disponible"];

    public function muestras()
    {
        return $this->hasMany(Muestra::class, 'tipo_muestra_id');
    } 
    
    public function subtipoMuestras()
    {
        return $this->hasMany(SubtipoMuestra::class, 'tipo_muestra_id');
    }
}
