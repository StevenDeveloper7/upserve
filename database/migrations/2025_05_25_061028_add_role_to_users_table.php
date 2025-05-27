<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones (aplica los cambios a la base de datos).
     * Modifica la tabla 'users' para añadir la columna 'role', 'telefono' y 'numero_identificacion'.
     */
    public function up(): void
    {
        // Usa Schema::table() porque ya existe la tabla 'users' y solo vamos a modificarla.
        Schema::table('users', function (Blueprint $table) {
            // Añade la nueva columna 'role' para definir el tipo de usuario.
            // Será de tipo ENUM con valores permitidos: 'cliente', 'empleado', 'administrador'.
            // El valor por defecto será 'cliente'.
            // Se coloca después de la columna 'email' para una organización lógica.
            $table->enum('role', ['cliente', 'empleado', 'administrador'])->default('cliente')->after('email');

            // Añade la columna 'telefono' para el número de contacto del usuario.
            // Es de tipo string con una longitud máxima de 20 caracteres y puede ser nulo.
            // Se coloca después de la nueva columna 'role'.
            $table->string('telefono', 20)->nullable()->after('role');

            // Añade la columna 'numero_identificacion' para el documento de identidad del usuario.
            // Es de tipo string con longitud máxima de 50 caracteres, puede ser nulo y debe ser único.
            // Se coloca después de la columna 'telefono'.
            $table->string('numero_identificacion', 50)->nullable()->unique()->after('telefono');
        });
    }

    /**
     * Revierte las migraciones (deshace los cambios de la base de datos).
     * Elimina las columnas 'role', 'telefono' y 'numero_identificacion' de la tabla 'users'.
     */
    public function down(): void
    {
        // Para revertir, usamos Schema::table() para eliminar las columnas añadidas.
        // Se pueden eliminar múltiples columnas pasando un array de nombres.
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'telefono', 'numero_identificacion']);
        });
    }
};

