<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory; // Utilizar el trait HasFactory en este modelo
    protected $guarded = [];// Propiedad para especificar qué atributos no se pueden asignar masivamente

    protected $hidden = ['created_at', 'updated_at'];//Ocultar peticiones del crud que queremos que no se vean 
}
