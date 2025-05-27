<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Crea la tabla 'respuestas_pqrs' para almacenar las respuestas a las PQRS.
     */
    public function up(): void
    {
        Schema::create('respuestas_pqrs', function (Blueprint $table) {
            // Columna de ID autoincremental y clave primaria.
            $table->id();

            // Clave foránea para relacionar la respuesta con la PQRS a la que pertenece.
            // 'pqrs_id' apunta a la columna 'id' de la tabla 'pqrs'.
            // 'onDelete('cascade')' asegura que si una PQRS es eliminada, todas sus respuestas también se eliminen.
            $table->foreignId('pqrs_id')->constrained('pqrs')->onDelete('cascade');

            // Clave foránea para el usuario que envió esta respuesta.
            // Puede ser el cliente que añade un comentario o un empleado/administrador que responde.
            // 'user_id' apunta a la columna 'id' de la tabla 'users'.
            // También la haremos nullable aquí, en caso de que una respuesta pueda ser "automática" o de un user_id borrado.
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');

            // Contenido textual de la respuesta o comentario.
            $table->text('contenido');

            // Columnas 'created_at' y 'updated_at' para el registro de tiempo.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Elimina la tabla 'respuestas_pqrs' si la migración es revertida.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas_pqrs');
    }
};