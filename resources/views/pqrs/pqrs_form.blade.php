<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PQRS - El Rancho de Hojaldras</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-brown': '#7C5C41',
                        'secondary-orange': '#D4884B',
                        'accent-green': '#6B8E23',
                        'light-creme': '#F5F5DC',
                        'dark-charcoal': '#2B2B2B',
                        'form-bg': '#FFFBF6',
                        'border-light': '#E0D8D0',
                        'peticion-light': '#D1E8FF',
                        'peticion-dark': '#1A75BB',
                        'queja-light': '#FFD1D1',
                        'queja-dark': '#C93C3C',
                        'reclamo-light': '#FFFACD',
                        'reclamo-dark': '#CC9900',
                        'sugerencia-light': '#D9FFD9',
                        'sugerencia-dark': '#3D9970',
                    },
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                        'playfair': ['Playfair Display', 'serif']
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'float': 'float 3s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite'
                    },
                    keyframes: {
                        fadeIn: { '0%': { opacity: '0' }, '100%': { opacity: '1' } },
                        slideUp: { '0%': { transform: 'translateY(20px)', opacity: '0' }, '100%': { transform: 'translateY(0)', opacity: '1' } },
                        float: { '0%, 100%': { transform: 'translateY(0px)' }, '50%': { transform: 'translateY(-10px)' } }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F5F5DC; /* Color de fondo general */
            color: #827272; /* Color de texto base */
        }

        /* Estilos de fondo del restaurante */
        .restaurant-bg {
            background-image: url('{{ asset('img/fondorestaurante.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            position: relative;
        }

        .restaurant-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('{{ asset('img/fondorestau.png') }}'); /* Imagen de fondo para el blur */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(2px); /* Aplicar el desenfoque */
            background-color: rgba(0, 0, 0, 0.4); /* Capa oscura para mejor contraste y efecto */
            z-index: -1; /* Asegura que esté detrás del contenido */
        }

        /* Estilo para el efecto "glassmorphism" del header */
        .glass-header {
            backdrop-filter: blur(15px) saturate(180%);
            background: rgba(255, 255, 255, 0.05); /* Fondo ligeramente transparente */
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        /* Estilo para el contenedor del formulario */
        .form-container {
            background: #FFFBF6; /* Color de fondo del formulario */
            backdrop-filter: blur(20px) saturate(200%); /* Efecto glassmorphism más fuerte */
            border: 1px solid rgba(224, 216, 208, 0.8);
            box-shadow:
                0 20px 40px rgba(0, 0, 0, 0.1),
                0 10px 20px rgba(0, 0, 0, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.6); /* Sombra interna para relieve */
        }

        /* Estilo para la tarjeta de presentación del restaurante (izquierda) */
        .restaurant-showcase {
            background: linear-gradient(45deg, #7C5C41 0%, #D4884B 50%, #6B8E23 100%);
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .restaurant-showcase::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.2) 0%, transparent 40%),
                radial-gradient(circle at 70% 70%, rgba(255, 255, 255, 0.1) 0%, transparent 40%);
            animation: float 3s ease-in-out infinite; /* Animación de flotación */
        }

        .restaurant-showcase::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.2);
            animation: pulse-slow 3s cubic-bezier(0.4, 0, 0.6, 1) infinite; /* Animación de pulsación */
            display: flex; /* Para centrar el ícono si se agregara uno aquí */
            align-items: center;
            justify-content: center;
        }

        .logo-img {
            width: 100%;
            height: 100%;
            object-fit: contain; /* Ajusta la imagen dentro del contenedor */
            border-radius: inherit; /* Hereda el border-radius del padre */
        }

        /* Estilo para la tarjeta de contacto */
        .contact-card {
            background: #FFFBF6;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(224, 216, 208, 0.8);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
        }

        /* Agrupación de estilos para los campos de entrada de formulario */
        .input-group {
            position: relative;
            margin-bottom: 1.75rem; /* Espaciado entre grupos de input */
        }

        .input-field {
            width: 100%;
            padding: 1.25rem 1rem 0.75rem; /* Padding para el efecto de label flotante */
            border: 2px solid #E0D8D0;
            border-radius: 12px;
            background: #FFFBF6;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 16px;
            font-weight: 400;
            outline: none; /* Eliminar el outline por defecto */
            color: #2B2B2B; /* Color de texto del input */
        }

        .input-field:focus {
            border-color: #D4884B;
            background: white;
            box-shadow:
                0 0 0 4px rgba(212, 136, 75, 0.1), /* Anillo de enfoque */
                0 8px 16px rgba(212, 136, 75, 0.08); /* Sombra al enfocar */
            transform: translateY(-2px); /* Pequeño levantamiento */
        }

        .input-field:hover:not(:focus) {
            border-color: #C2B8AD;
            transform: translateY(-1px); /* Pequeño levantamiento al pasar el mouse */
        }

        .input-label {
            position: absolute;
            top: 1.25rem; /* Posición inicial del label */
            left: 1rem;
            color: #755a45;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none; /* Permite hacer clic a través del label */
            background: #FFFBF6; /* Fondo para que el label no corte el borde del input */
            padding: 0 0.5rem;
            font-weight: 500;
            font-size: 16px;
            z-index: 1; /* Asegura que el label esté por encima del input */
        }

        /* Estilo para el label cuando el input está enfocado o tiene contenido */
        .input-field:focus + .input-label,
        .input-field:not(:placeholder-shown) + .input-label,
        .input-field.has-value + .input-label { /* Clase JS para mejor control */
            top: -0.5rem; /* Mover arriba */
            left: 0.75rem;
            font-size: 12px;
            color: #D4884B;
            font-weight: 600;
        }

        /* Estilos de botones */
        .btn-primary {
            background: linear-gradient(135deg, #D4884B 0%, #B86B33 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow:
                0 4px 16px rgba(212, 136, 75, 0.3),
                0 8px 32px rgba(212, 136, 75, 0.2);
            position: relative;
            overflow: hidden; /* Para el efecto de brillo */
            color: white;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%; /* Inicia fuera de la vista */
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow:
                0 8px 24px rgba(212, 136, 75, 0.4),
                0 16px 48px rgba(212, 136, 75, 0.3);
        }

        .btn-primary:hover::before {
            left: 100%; /* Desliza el brillo hacia la derecha */
        }

        .btn-secondary {
            background: linear-gradient(135deg, #F5F5DC 0%, #E0D8D0 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent; /* Para que el hover no cambie tamaño */
            color: #7C5C41;
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, #E0D8D0 0%, #C2B8AD 100%);
            border-color: #C2B8AD;
            transform: translateY(-2px);
        }

        /* Contenedor de logos en el header */
        .logo-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: all 0.3s ease;
        }

        .logo-container:hover {
            background: rgba(255, 255, 255, 0.12);
            transform: scale(1.05);
        }

        /* Estilos para las insignias de tipo de PQRS */
        .type-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.2rem;
            border-radius: 20px;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid transparent;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            user-select: none; /* Evita selección de texto al hacer clic */
        }

        /* Colores específicos para cada tipo de insignia */
        .type-badge.peticion { background: linear-gradient(135deg, #D1E8FF 0%, #A2CEF5 100%); color: #1A75BB; border-color: #A2CEF5; }
        .type-badge.queja { background: linear-gradient(135deg, #FFD1D1 0%, #F5A2A2 100%); color: #C93C3C; border-color: #F5A2A2; }
        .type-badge.reclamo { background: linear-gradient(135deg, #FFFACD 0%, #FAE08E 100%); color: #CC9900; border-color: #FAE08E; }
        .type-badge.sugerencia { background: linear-gradient(135deg, #D9FFD9 0%, #A7F5A7 100%); color: #3D9970; border-color: #A7F5A7; }

        .type-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        /* Estilo para los mensajes toast */
        .toast {
            background: linear-gradient(135deg, #6B8E23 0%, #4B6B15 100%);
            box-shadow: 0 8px 24px rgba(107, 142, 35, 0.3);
            backdrop-filter: blur(15px);
            opacity: 1; /* Por defecto visible al mostrar */
            transition: opacity 0.5s ease-out, transform 0.5s ease-out; /* Transiciones para ocultar */
        }

        .toast.hidden-state { /* Clase para ocultar con transición */
            opacity: 0;
            transform: translateY(20px) scale(0.95);
            pointer-events: none; /* Permite hacer clic a través cuando está oculto */
        }

        /* Media queries para responsividad */
        @media (max-width: 768px) {
            .restaurant-showcase {
                height: 250px;
                margin-bottom: 2rem;
            }
            .form-container {
                margin: 1rem;
                padding: 1.5rem;
            }
            .input-field {
                padding: 1rem 0.75rem 0.5rem;
            }
            .input-label {
                top: 1rem;
                left: 0.75rem;
            }
        }

        @media (max-width: 640px) {
            .restaurant-showcase::after {
                width: 80px;
                height: 80px;
                font-size: 32px;
            }
            .type-badge {
                padding: 0.5rem 1rem;
                font-size: 14px;
            }
        }
    </style>
</head>
<body class="restaurant-bg">
    <header class="glass-header sticky top-0 z-50">
        <div class="container mx-auto px-4 lg:px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3 animate-fade-in">
                    <div class="logo-container w-18 h-16 rounded-xl flex items-center justify-center">
                        <img src="{{ asset('img/logoupserve.png') }}" alt="Upserve Logo" class="logo-img">
                    </div>
                    <div class="hidden sm:block">
                        <h1 class="text-white font-bold text-xl tracking-tight font-playfair">Upserve</h1>
                        <p class="text-white/70 text-xs font-medium">Sistema de Gestión Restaurantes</p>
                    </div>
                </div>

                <div class="flex items-center space-x-3 animate-fade-in" style="animation-delay: 0.1s">
                    <div class="logo-container w-48 h-32 rounded-xl flex items-center justify-center">
                        <img src="{{ asset('img/logorestaurante.png') }}" alt="El Rancho de Hojaldras Logo" class="logo-img">
                    </div>
                    <div class="hidden md:block">
                        <h2 class="text-white font-bold text-lg font-playfair">El Rancho de Hojaldras</h2>
                        <p class="text-white/70 text-sm">Sabor Campestre y Tradicional</p>
                    </div>
                </div>

                <button type="button" onclick="goBack()" class="logo-container w-12 h-12 rounded-xl flex items-center justify-center group animate-fade-in" style="animation-delay: 0.2s">
                    <svg class="w-6 h-6 text-white group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 lg:px-6 py-8 lg:py-12">
        <div class="max-w-7xl mx-auto">
            <section class="text-center mb-12 lg:mb-16 animate-slide-up">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-primary-brown to-secondary-orange rounded-2xl mb-6 shadow-2xl">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 002 2zm-7.5-11V6m0 0H9m3 0H15m-3 3h.01M12 7.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm0 0H9.75M12 7.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"/>
                    </svg>
                </div>
                <h1 class="text-5xl lg:text-6xl font-bold text-white mb-4 tracking-tight font-playfair">
                    Buzón de Ideas y Sugerencias
                </h1>
                <p class="text-xl lg:text-2xl text-white/90 mb-2 font-medium">
                    Peticiones, Quejas, Reclamos y Sugerencias
                </p>
                <p class="text-lg text-white/75 max-w-2xl mx-auto leading-relaxed">
                    ¡Tu voz es nuestra receta para mejorar! Ayúdanos a crecer compartiendo tu experiencia con nosotros.
                </p>
            </section>

            <div class="grid lg:grid-cols-5 gap-8 lg:gap-12 items-start">
                <aside class="lg:col-span-2">
                    <div class="restaurant-showcase rounded-3xl h-96 lg:h-[600px] shadow-2xl animate-slide-up" style="animation-delay: 0.2s">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-6xl lg:text-7xl mb-4 animate-float">👨‍🍳</div>
                                <h3 class="text-white font-bold text-2xl lg:text-3xl mb-2 font-playfair">El Rancho de Hojaldras</h3>
                                <p class="text-white/90 text-lg font-medium">Sabor Auténtico y Tradicional</p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-card rounded-2xl p-6 mt-6 lg:mt-8 shadow-md">
                        <h4 class="text-2xl font-bold text-primary-brown mb-5 text-center font-playfair">
                            Contáctanos para tus inquietudes
                        </h4>
                        <p class="text-base text-dark-charcoal mb-6 text-center leading-relaxed">
                            En "El Rancho de Hojaldras" brindamos una experiencia gastronómica amplia, donde encontrarás comida típica, criolla y de mar, con el auténtico sabor campestre.
                        </p>
                        <div class="space-y-5">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-secondary-orange to-primary-brown rounded-xl flex items-center justify-center flex-shrink-0 shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Teléfono</p>
                                    <p class="text-lg font-bold text-dark-charcoal">📞 313 6530869</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-accent-green to-primary-brown rounded-xl flex items-center justify-center flex-shrink-0 shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Correo Electrónico</p>
                                    <p class="text-lg font-bold text-dark-charcoal break-all">📧 elranchohojaldras@gmail.com</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-secondary-orange to-accent-green rounded-xl flex items-center justify-center flex-shrink-0 shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Ubicación</p>
                                    <p class="text-lg font-bold text-dark-charcoal">📍 Carrera 5 #4-300 B/ San Isidro, Palmira, Colombia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>

                <section class="lg:col-span-3">
                    <div class="form-container rounded-3xl p-8 lg:p-10 animate-slide-up shadow-xl" style="animation-delay: 0.4s">
                        <div class="flex flex-wrap gap-3 mb-8 justify-center lg:justify-start">
                            <span class="type-badge peticion">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Petición
                            </span>
                            <span class="type-badge queja">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                                Queja
                            </span>
                            <span class="type-badge reclamo">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Reclamo
                            </span>
                            <span class="type-badge sugerencia">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                                Sugerencia
                            </span>
                        </div>

                        <form method="POST" action="{{ route('pqrs.store') }}" class="space-y-6">
                            @csrf <div class="input-group">
                                <select class="input-field @error('tipo_pqrs') border-red-500 @enderror" id="tipo_pqrs" name="tipo_pqrs" required>
                                    <option value="" disabled selected>Seleccionar tipo de solicitud</option> <option value="Petición" {{ old('tipo_pqrs') == 'Petición' ? 'selected' : '' }}>🙋‍♂️ Petición - Solicitud de información o servicio</option>
                                    <option value="Queja" {{ old('tipo_pqrs') == 'Queja' ? 'selected' : '' }}>😔 Queja - Insatisfacción con el servicio</option>
                                    <option value="Reclamo" {{ old('tipo_pqrs') == 'Reclamo' ? 'selected' : '' }}>⚠️ Reclamo - Inconformidad que requiere solución</option>
                                    <option value="Sugerencia" {{ old('tipo_pqrs') == 'Sugerencia' ? 'selected' : '' }}>💡 Sugerencia - Propuesta de mejora</option>
                                </select>
                                <label class="input-label" for="tipo_pqrs">Tipo de PQRS *</label>
                                @error('tipo_pqrs')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="input-group">
                                    <input type="tel" class="input-field @error('telefono') border-red-500 @enderror" id="telefono" name="telefono" placeholder=" " value="{{ old('telefono', Auth::check() ? Auth::user()->telefono : '') }}">
                                    <label class="input-label" for="telefono">Teléfono de contacto (Opcional)</label>
                                    @error('telefono')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <input type="text" class="input-field @error('cedula') border-red-500 @enderror" id="cedula" name="cedula" placeholder=" " value="{{ old('cedula', Auth::check() ? Auth::user()->numero_identificacion : '') }}">
                                    <label class="input-label" for="cedula">Número de identificación (Opcional)</label>
                                    @error('cedula')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-group">
                                <input type="email" class="input-field @error('email_contacto') border-red-500 @enderror" id="email_contacto" name="email_contacto" placeholder=" " value="{{ old('email_contacto', Auth::check() ? Auth::user()->email : '') }}" {{ Auth::check() ? 'readonly' : 'required' }}> <label class="input-label" for="email_contacto">Correo electrónico de contacto {{ Auth::check() ? '(No editable)' : '(Requerido si no estás logueado)' }}</label>
                                @error('email_contacto')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="input-group">
                                <input type="text" class="input-field @error('asunto') border-red-500 @enderror" id="asunto" name="asunto" placeholder=" " value="{{ old('asunto') }}" required>
                                <label class="input-label" for="asunto">Asunto de la solicitud *</label>
                                @error('asunto')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="input-group">
                                <textarea class="input-field resize-none @error('descripcion') border-red-500 @enderror" id="descripcion" name="descripcion" rows="5" placeholder=" " required>{{ old('descripcion') }}</textarea>
                                <label class="input-label" for="descripcion">Descripción detallada de la situación *</label>
                                @error('descripcion')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="input-group">
                                    <input type="date" class="input-field @error('fecha_incidente') border-red-500 @enderror" id="fecha_incidente" name="fecha_incidente" value="{{ old('fecha_incidente') }}">
                                    <label class="input-label" for="fecha_incidente">Fecha del incidente (Opcional)</label>
                                    @error('fecha_incidente')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <select class="input-field @error('area') border-red-500 @enderror" id="area" name="area">
                                        <option value="" disabled selected>Seleccionar área</option>
                                        <option value="servicio" {{ old('area') == 'servicio' ? 'selected' : '' }}>🛎️ Servicio al cliente</option>
                                        <option value="cocina" {{ old('area') == 'cocina' ? 'selected' : '' }}>👨‍🍳 Cocina y alimentos</option>
                                        <option value="administracion" {{ old('area') == 'administracion' ? 'selected' : '' }}>📋 Administración</option>
                                        <option value="ambiente" {{ old('area') == 'ambiente' ? 'selected' : '' }}>🌳 Ambiente del local</option>
                                        <option value="otro" {{ old('area') == 'otro' ? 'selected' : '' }}>💬 Otro</option>
                                    </select>
                                    <label class="input-label" for="area">Área relacionada (Opcional)</label>
                                    @error('area')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                                <button type="submit" class="btn-primary flex-1 py-4 px-6 rounded-xl font-bold text-lg text-center shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                                    Enviar Solicitud
                                </button>
                                <button type="reset" class="btn-secondary flex-1 py-4 px-6 rounded-xl font-bold text-lg text-center border-2 border-border-light shadow-sm transform hover:scale-105 transition duration-300 ease-in-out">
                                    Limpiar Formulario
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </main>

    @if (session('success') || $errors->any())
        <div id="toast-messages" class="fixed bottom-8 right-8 z-50 flex flex-col space-y-4">
            @if (session('success'))
                <div id="success-toast" class="toast p-6 rounded-xl text-white text-lg font-semibold shadow-xl animate-fade-in" style="min-width: 300px;">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div id="error-toast" class="p-6 rounded-xl bg-red-600 text-white text-lg font-semibold shadow-xl animate-fade-in" style="min-width: 300px;">
                    <p>Ocurrieron errores en el formulario:</p>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    @endif

    <script>
        /**
         * Función para retroceder en el historial del navegador.
         * Si no hay historial, redirige a una ruta por defecto.
         */
        function goBack() {
            if (window.history.length > 1) {
                window.history.back();
            } else {
                // Si no hay historial de navegación, puedes redirigir a una página principal
                // Por ejemplo, la ruta de inicio de tu aplicación Laravel
                window.location.href = '/'; // Ajusta esto a tu ruta base si es necesario
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Lógica para el efecto de label flotante en los campos de input y select
            const inputFields = document.querySelectorAll('.input-field');

            inputFields.forEach(input => {
                const updateLabelState = () => {
                    // Si el input tiene valor (o es un select con opción seleccionada que no sea el placeholder)
                    if (input.value || (input.tagName === 'SELECT' && input.selectedIndex !== 0)) {
                        input.classList.add('has-value');
                    } else {
                        input.classList.remove('has-value');
                    }
                };

                // Ejecutar al cargar la página para aplicar el estado inicial (útil para `old()` de Laravel)
                updateLabelState();

                // Actualizar el estado al escribir/cambiar el valor
                input.addEventListener('input', updateLabelState);
                input.addEventListener('blur', updateLabelState); // Cuando pierde el foco
                if (input.tagName === 'SELECT') {
                    input.addEventListener('change', updateLabelState); // Para los selects
                }
            });

            // Lógica para ocultar automáticamente los mensajes toast
            const successToast = document.getElementById('success-toast');
            const errorToast = document.getElementById('error-toast');

            if (successToast) {
                setTimeout(() => {
                    successToast.classList.add('hidden-state');
                    // Remover el toast del DOM después de la transición
                    setTimeout(() => successToast.remove(), 600); // Coincide con la duración de la transición
                }, 8000); // Toast de éxito visible por 8 segundos
            }

            if (errorToast) {
                setTimeout(() => {
                    errorToast.classList.add('hidden-state');
                    // Remover el toast del DOM después de la transición
                    setTimeout(() => errorToast.remove(), 600); // Coincide con la duración de la transición
                }, 10000); // Toast de error visible por 10 segundos
            }
        });
    </script>
</body>
</html>