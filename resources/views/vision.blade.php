<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visión</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-[url('img/restaurant_into_bn.jpg')] bg-cover bg-center flex flex-col min-h-screen relative">
<!--barra de navegación-->
    <header class="bg-gray-50 text-black py-1 relative w-full">
        <nav class="container mx-auto flex items-center justify-between">
            <a href="/" class="flex items-center">
                <img src="img/logo_upserve.png" width="75" alt="Logo Upserve">
            </a>
            <ul class="flex space-x-4">
                <li class="hover:text-gray-500">
                    <a href="/" class="inline-block px-2 py-1 text-sm font-medium text-green-200 bg-green-700 border border-green-300 rounded-md shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Regresar</a>
                </li>
            </ul>
        </nav>
        <div class="absolute top-[90%] left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-20">
            <img src="img/logo_rancho_hojaldras.png" alt="Logo de Rancho de Hojaldras" width="200">
        </div>
    </header>

 <!--sección de la visión-->
    <main class="flex-grow flex flex-col md:flex-row-reverse items-center md:items-start justify-between px-10 py-6">
        <article class="py-5 max-w-full md:w-3/5 lg:w-1/2 mt-8 md:mt-16">
            <h3 class="text-yellow-300 text-2xl font-bold mb-4">VISIÓN</h3>
            <p class="text-gray-800 text-justify bg-yellow-200 p-4 border-2 border-dashed rounded-lg">SER EL REFERENTE GASTRONÓMICO DE LA REGIÓN, OFRECIENDO UNA EXPERIENCIA CULINARIA AUTÉNTICA Y MEMORABLE QUE RESALTE LOS SABORES TRADICIONALES DE COLOMBIA, CONECTANDO A NUESTROS CLIENTES CON LAS RAICES DE NUESTRA CULTURA.</p>
        </article>
<!--imagen del comedor-->
        <div class="flex flex-col items-center mt-8 md:mt-16 md:mr-auto md:w-1/2 lg:w-2/5">
            <img src="img/comedor.jpg" alt="comedor" class="mx-auto w-120 h-100 object-cover rounded-full shadow-md -mt-16 mb-4">
            <p class="text-sm text-gray-800 bg-lime-300 text-center max-w-prose p-4 border-2 border-dashed rounded-lg"> BRINDAMOS UNA EXPERIENCIA GASTRONÓMICA AMPLIA, DONDE ENCONTRARÁS COMIDA TÍPICA, CRIOLLA Y DE MAR. </p>
        </div>
    </main>
    <!--terminos y condiciones-->
    <footer class="bg-gray-200 text-gray-700 py-2 mt-auto">
        <div class="container mx-auto flex justify-end items-center">
            <p class="flex items-center space-x-4">
                <a href="/terminos" target="_blank" rel="noopener noreferrer" class="underline hover:text-gray-900">Términos y Condiciones</a>
                <span>|</span>
                <a href="/privacidad" target="_blank" rel="noopener noreferrer" class="underline hover:text-gray-900">Políticas de Privacidad</a>
            </p>
        </div>
    </footer>
</body>
</html>