<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     * Crea la tabla 'pqrs' para almacenar las Peticiones, Quejas, Reclamos y Sugerencias.
     */
    public function up(): void
    {
        Schema::create('pqrs', function (Blueprint $table) {
            $table->id(); // Columna de ID autoincremental y clave primaria.

            // Clave foránea para relacionar la PQRS con el usuario que la creó.
            // Es nullable para permitir PQRS de usuarios no registrados.
            // onDelete('set null') para que si el usuario se elimina, este ID se ponga a NULL.
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');

            // Tipo de PQRS: Petición, Queja, Reclamo o Sugerencia.
            $table->enum('tipo_pqrs', ['Petición', 'Queja', 'Reclamo', 'Sugerencia']);

            // Asunto o título breve de la PQRS.
            $table->string('asunto');

            // Descripción detallada de la PQRS.
            $table->text('descripcion');

            // **¡NUEVA COLUMNA!** Código único de radicado.
            // Debe ser único para cada PQRS.
            $table->string('radicado_code')->unique();

            // Estado actual de la PQRS: Pendiente, En Proceso, Resuelta, Cerrada, Rechazada.
            $table->enum('estado', ['Pendiente', 'En Proceso', 'Resuelta', 'Cerrada', 'Rechazada'])->default('Pendiente');

            // Prioridad de la PQRS: Baja, Media, Alta, Urgente.
            $table->enum('prioridad', ['Baja', 'Media', 'Alta', 'Urgente'])->default('Baja');

            // Ruta al archivo adjunto (opcional, puede ser nulo).
            $table->string('archivo_adjunto')->nullable();

            // **¡NUEVAS COLUMNAS!** Campos de contacto para usuarios no registrados.
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_cedula')->nullable();

            // Campos para fecha y área que aparecieron en tu formulario.
            $table->date('fecha_incidente')->nullable(); // Asumiendo que puede no ser siempre necesaria.
            $table->string('area')->nullable(); // Asumiendo que puede ser opcional.

            // Columnas 'created_at' y 'updated_at' para el registro de tiempo.
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     * Elimina la tabla 'pqrs' si la migración es revertida.
     */
    public function down(): void
    {
        Schema::dropIfExists('pqrs');
    }
};

