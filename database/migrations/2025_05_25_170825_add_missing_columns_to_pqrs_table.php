    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Ejecuta las migraciones.
         */
        public function up(): void
        {
            Schema::table('pqrs', function (Blueprint $table) {
                // Añadir 'radicado_code' si no existe. Asegúrate de que sea único.
                if (!Schema::hasColumn('pqrs', 'radicado_code')) {
                    $table->string('radicado_code')->unique()->nullable()->after('descripcion');
                }

                // Añadir 'contact_email' si no existe
                if (!Schema::hasColumn('pqrs', 'contact_email')) {
                    $table->string('contact_email')->nullable()->after('radicado_code');
                }

                // Añadir 'contact_phone' si no existe
                if (!Schema::hasColumn('pqrs', 'contact_phone')) {
                    $table->string('contact_phone')->nullable()->after('contact_email');
                }

                // Añadir 'contact_cedula' si no existe
                if (!Schema::hasColumn('pqrs', 'contact_cedula')) {
                    $table->string('contact_cedula')->nullable()->after('contact_phone');
                }

                // Añadir 'fecha_incidente' si no existe
                if (!Schema::hasColumn('pqrs', 'fecha_incidente')) {
                    $table->date('fecha_incidente')->nullable()->after('contact_cedula');
                }

                // Añadir 'area' si no existe
                if (!Schema::hasColumn('pqrs', 'area')) {
                    $table->string('area')->nullable()->after('fecha_incidente');
                }

                // Añadir 'estado' si no existe
                if (!Schema::hasColumn('pqrs', 'estado')) {
                    $table->string('estado')->default('Pendiente')->after('area');
                }

                // Añadir 'prioridad' si no existe
                if (!Schema::hasColumn('pqrs', 'prioridad')) {
                    $table->string('prioridad')->nullable()->after('estado');
                }

                // Añadir 'archivo_adjunto' si no existe
                if (!Schema::hasColumn('pqrs', 'archivo_adjunto')) {
                    $table->string('archivo_adjunto')->nullable()->after('prioridad');
                }

                // Si 'user_id' ya existe y quieres que sea nullable (para PQRS anónimas),
                // descomenta la siguiente línea.
                // if (Schema::hasColumn('pqrs', 'user_id')) {
                //     $table->foreignId('user_id')->nullable()->change();
                // }
            });
        }

        /**
         * Revierte las migraciones.
         */
        public function down(): void
        {
            Schema::table('pqrs', function (Blueprint $table) {
                // Eliminar las columnas añadidas en esta migración.
                // Se comprueba si existen antes de intentar eliminarlas.
                $columnsToDrop = [
                    'radicado_code', 'contact_email', 'contact_phone', 'contact_cedula',
                    'fecha_incidente', 'area', 'estado', 'prioridad', 'archivo_adjunto'
                ];

                foreach ($columnsToDrop as $column) {
                    if (Schema::hasColumn('pqrs', $column)) {
                        $table->dropColumn($column);
                    }
                }

                // Si se cambió 'user_id' a nullable en up(), se puede revertir aquí si es necesario.
                // if (Schema::hasColumn('pqrs', 'user_id')) {
                //     $table->foreignId('user_id')->change();
                // }
            });
        }
    };
    
