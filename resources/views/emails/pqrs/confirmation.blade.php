# Confirmación de su PQRS

Hola {{ $pqrs->user->name ?? 'Cliente' }},

Hemos recibido su {{ $pqrs->tipo_pqrs }} con el asunto: **{{ $pqrs->asunto }}**.

Número de seguimiento: **#{{ $pqrs->id }}**

Estado actual: **{{ $pqrs->estado }}**

Nos pondremos en contacto con usted lo antes posible.

Gracias por su paciencia.

Saludos,
El equipo de {{ config('app.name') }}