# Nueva PQRS Recibida

Se ha enviado una nueva PQRS en el sistema.

**Tipo:** {{ $pqrs->tipo_pqrs }}
**Asunto:** {{ $pqrs->asunto }}
**Descripción:**
{{ $pqrs->descripcion }}

**Enviado por:** {{ $pqrs->user->name ?? 'Usuario Desconocido' }} ({{ $pqrs->user->email ?? 'Sin Email' }})
**Teléfono:** {{ $pqrs->user->telefono ?? 'N/A' }}
**Identificación:** {{ $pqrs->user->numero_identificacion ?? 'N/A' }}

**Fecha de Creación:** {{ $pqrs->created_at->format('d/m/Y H:i') }}

Puedes ver los detalles completos en el panel de administración.

Saludos,
Sistema de Notificaciones de {{ config('app.name') }}
