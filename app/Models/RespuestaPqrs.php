<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaPqrs extends Model
{
    use HasFactory;

    // Define el nombre de la tabla.
    protected $table = 'respuestas_pqrs';

    // Define los atributos que pueden ser asignados masivamente.
    protected $fillable = [
        'pqrs_id',
        'user_id',
        'contenido',
    ];

    // Define la relación de la respuesta con la PQRS a la que pertenece.
    // Una respuesta pertenece a una PQRS (Many to One).
    public function pqrs()
    {
        return $this->belongsTo(Pqrs::class);
    }

    // Define la relación de la respuesta con el usuario que la creó.
    // Una respuesta pertenece a un usuario (Many to One).
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
