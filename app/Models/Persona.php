<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'Personas'; // Nombre de la tabla existente

    public $timestamps = false; // Desactiva las marcas de tiempo

    // Opcional: agrega cualquier otra configuración, como fillable, si deseas habilitar asignación masiva
    protected $fillable = ['Nombre', 'Edad', 'Email']; // Permitir asignación masiva
}
