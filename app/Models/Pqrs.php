<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pqrs extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada al modelo
    protected $table = 'pqrs';

    // Define los atributos que pueden ser asignados masivamente.
    protected $fillable = [
        'radicado_code',      // Campo añadido: el controlador lo genera y guarda
        'user_id',
        'tipo_pqrs',
        'asunto',
        'descripcion',
        'estado',
        'prioridad',          // Campo añadido por el usuario
        'archivo_adjunto',    // Campo añadido por el usuario
        'contact_email',      // Campo añadido: el controlador lo guarda
        'contact_phone',      // Campo añadido: el controlador lo guarda
        'contact_cedula',     // Campo añadido: el controlador lo guarda
        'fecha_incidente',    // Campo añadido: el controlador lo guarda
        'area',               // Campo añadido: el controlador lo guarda
    ];

    // Define la relación de la PQRS con el usuario que la creó.
    // Una PQRS pertenece a un usuario (Many to One).
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define la relación de la PQRS con sus respuestas.
    // Una PQRS puede tener muchas respuestas (One to Many).
    public function respuestas()
    {
        return $this->hasMany(RespuestaPqrs::class, 'pqrs_id');
    }
}
