<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObraSocial extends Model
{
    use HasFactory;
    protected $fillable = ["rnos", "nombre", "sigla", "domicilio", "cp", "provincia", "telefono", "e_mail", "web", "estado", "a", "b", "c"];
}
