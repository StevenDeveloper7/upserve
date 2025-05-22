<template>
    <Head title="Pagina de inicio" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img
            id="background"
            class="absolute"
            src="/img/restaurant_into_bn.jpg"
        />
        <div
            class="relative flex min-h-screen flex-col items-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full">
                <header
                    class="grid items-center gap-2"
                >
                   
                    <!-- <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end w-full">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Iniciar Sesión
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Registrarse
                            </Link>
                        </template>
                    </nav> -->

                      <!-- NavBar -->
                    <div class="grid grid-cols-6 uppercase text-xl bg-gray-100 border-b-2 border-gray-400 relative shadow-md cursor-pointer" >
                        <!-- logo upserve -->
                    <div class="text-center border-r-2 border-black w-[90px]">
                        <img class="w-[75px] h-[75px]" src="img/logo_upserve.png" alt="Logo UPSERVE">
                    </div>
                        <div id="dropdownBtn_1" class="border-r-2 border-black px-3 py-5 hover:bg-[#322203] hover:text-[#f8dd6f] hover:scale-110">
                        <h1 class="">¿Quienes Somos?</h1>
                        </div>
                        <div id="dropdownBtn_2" class="text-center border-r-2 border-black py-5 hover:bg-[#322203] hover:text-[#f8dd6f] hover:scale-110">
                        <h1>SERVICIOS</h1>
                        </div>
                        <!-- logo rancho de hojaldras -->
                    <div class="w-[220px] border-r-2 border-black">
                        <img class="absolute w-[200px] h-[130px]" src="img/logo_rancho_hojaldras.png" alt="Logo Restaurante">
                    </div>
                        <div id="dropdownBtn_3" class="text-center border-r-2 border-black py-5 hover:bg-[#322203] hover:text-[#f8dd6f] hover:scale-110">
                        <h1>MENU</h1>
                        </div>
                        <div id="dropdownBtn_4" class="text-center  py-5 hover:bg-[#322203] hover:text-[#f8dd6f]">
                        <h1>CONTACTO</h1>
                        </div>
                    </div>
                </header>

                <main class="mt-6">
                    <div>
                         <!-- Promotional message -->
                        <div class="flex m-16 justify-center">
                            <div class="text-center border-2 border-[#f8dd6f] uppercase text-xl p-3 rounded-xl font-bold bg-[#322203] text-[#f8dd6f] w-[500px] opacity-75">
                            <p>“Vive una experiencia única en 'El Rancho de Hojaldras' – ¡Reserva tu mesa hoy y descubre los sabores más auténticos!"</p>
                            </div>
                        </div>

                        <!-- Login form -->
                        <div class="bg-gray-100 px-4 py-10 rounded-md w-[270px] h-[270px] absolute right-[2%] top-[40%] opacity-90">
                            <div class="bg-[#322203] rounded-md w-full h-full py-8 px-4 relative">
                            <!-- User logo -->
                            <div class="rounded-full p-4 bg-[#322203] absolute -top-[40%] right-[38%]">
                                <i class="fa-solid fa-user text-white text-[45px]"></i>
                            </div>

                            <!-- Username input -->
                            <!-- <div class="flex gap-3 items-center bg-white p-2 rounded-md">
                                <i class="fa-solid fa-user text-[#322203]"></i>
                                <input class="outline-none" type="text" placeholder="Nombre de usuario" >
                            </div> -->

                            <!-- Password input -->
                            <!-- <div class="flex gap-3 items-center bg-white p-2 rounded-md mt-8">
                                <i class="fa-solid fa-lock text-[#322203]"></i>
                                <input class="outline-none" type="password" placeholder="Contraseña" >
                            </div> -->

                            <!-- Password reset link -->
                            <!-- <div class="text-right mt-1">
                                <a class="text-md text-white underline hover:text-[#f8dd6f]" href="/">¿Olvidaste la contraseña?</a>
                            </div> -->

                            <!-- Login options -->
                                <div class="text-center p-2 flex flex-col gap-4">
                                <!-- <button class="rounded-full px-6 py-2 bg-gray-100 hover:bg-[#f8dd6f]">
                                    Iniciar sesión
                                </button> -->
                                    <Link
                                    :href="route('login')"
                                    class="rounded-full px-6 py-2 bg-gray-100 hover:bg-[#f8dd6f]"
                                    >
                                        Iniciar Sesión
                                    </Link>

                                    <Link
                                        :href="route('register')"
                                        class="rounded-full px-6 py-2 bg-gray-100 hover:bg-[#f8dd6f]"
                                    >
                                        Registrarse
                                    </Link>
                                </div>

                                <!-- Regster link -->
                                <!-- <div class="text-center flex gap-3 mt-8">
                                <h4 class="text-white">¿No tienes cuenta?</h4>
                                <a class="text-md text-white underline hover:text-[#f8dd6f]" href="/">Registrarse</a>
                                </div> -->

                            </div>
                        </div>

                        <!-- Reservation button -->
                        <div class="text-center mt-8 absolute bottom-[20%] right-[42%] text-xl font-bold">
                            <button class="border-2 border-black shadow-md rounded-full px-6 py-2 bg-gradient-to-r from-teal-400 to-green-500 hover:from-pink-500 hover:to-[#f8dd6f] hover:scale-110">
                            Reservar Mesa
                            </button>
                        </div>

                        <!-- Promotional images -->
                        <div class="relative p-10 flex">
                            <div class="z-10 h-[300px] w-[300px] border-dotted border-4 border-gray-100 rounded-full absolute -top-[20%] bg-cover bg-center bg-no-repeat" style="background-image: url('img/plato_5.png')">
                    
                            </div>
                            <div class="z-50 h-[170px] w-[170px] border-dotted border-2 border-gray-100 rounded-full absolute top-[150%] left-[21%] bg-cover bg-center bg-no-repeat" style="background-image: url('img/plato_2.jpg')">
                    
                            </div>
                            <div class="z-10 h-[240px] w-[240px] border-dotted border-4 border-gray-100 rounded-full absolute -top-[20%] left-[25%] bg-cover bg-center bg-no-repeat" style="background-image: url('img/plato_3.jpg')">
                    
                            </div>

                        </div>

                        <!-- Dropdown menus -->
                        <div>
                        <!-- menu 1 -->
                        <div id="dropdownMenu_1" class="hidden w-[235px] text-center absolute top-[12%] left-[16%] border-2  border-gray-200 bg-gradient-to-r from-teal-400 to-green-500 shadow-md opacity-80">
                            <ul  class="font-bold">
                            <li class="p-6 border-b-2 border-black cursor-pointer hover:scale-110"><a href="#">MISIÓN</a></li>
                            <li class="p-6 cursor-pointer hover:scale-110"><a href="#">VISIÓN</a></li>
                            </ul>
                        </div>

                        <!-- menu 2 -->
                        <div id="dropdownMenu_2" class="hidden w-[235px] text-center absolute top-[12%] left-[33%] border-2  border-gray-200 bg-gradient-to-r from-teal-400 to-green-500 shadow-md opacity-80">
                            <ul  class="font-bold">
                            <li class="p-6 border-b-2 border-black cursor-pointer hover:scale-110"><a href="#">RESERVACIÓN DE MESA</a></li>
                            <li class="p-6 cursor-pointer hover:scale-110"><a href="#">RESERVACIÓN DE SALON</a></li>
                            </ul>
                        </div>

                        <!-- menu 3 -->
                        <div id="dropdownMenu_3" class="hidden w-[235px] text-center absolute top-[12%] left-[66%] border-2  border-gray-200 bg-gradient-to-r from-teal-400 to-green-500 shadow-md opacity-80">
                            <ul  class="font-bold">
                            <li class="p-6 border-b-2 border-black cursor-pointer hover:scale-110"><a href="#">ENTRADAS</a></li>
                            <li class="p-6 border-b-2 border-black cursor-pointer hover:scale-110"><a href="#">PLATOS FUERTES</a></li>
                            <li class="p-6 border-b-2 border-black cursor-pointer hover:scale-110"><a href="#">POSTRES</a></li>
                            <li class="p-6 cursor-pointer hover:scale-110"><a href="#">BEBIDAS</a></li>
                            </ul>
                        </div>

                        <!-- menu 4 -->
                        <div id="dropdownMenu_4" class="hidden w-[235px] text-center absolute top-[12%] right-0 border-2  border-gray-200 bg-gradient-to-r from-teal-400 to-green-500 shadow-md opacity-80">
                            <ul  class="font-bold">
                            <li class="p-6 cursor-pointer"><a href="#">CONTACTANOS</a></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                </main>

            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}

 // dorpdown menus
 const dropdownMenu_1 = document.getElementById('dropdownMenu_1');
  const dropdownMenu_2 = document.getElementById('dropdownMenu_2');
  const dropdownMenu_3 = document.getElementById('dropdownMenu_3');
  const dropdownMenu_4 = document.getElementById('dropdownMenu_4');

  // dorpdown buttons
  const dropdownBtn_1 = document.getElementById('dropdownBtn_1');
  const dropdownBtn_2 = document.getElementById('dropdownBtn_2');
  const dropdownBtn_3 = document.getElementById('dropdownBtn_3');
  const dropdownBtn_4 = document.getElementById('dropdownBtn_4');

  // events
//   dropdownBtn_1.addEventListener('click', () => {
//     dropdownMenu_1.classList.toggle('hidden');   
//   });
//   dropdownBtn_2.addEventListener('click', () => {
//     dropdownMenu_2.classList.toggle('hidden');   
//   });
//   dropdownBtn_3.addEventListener('click', () => {
//     dropdownMenu_3.classList.toggle('hidden');   
//   });
//   dropdownBtn_4.addEventListener('click', () => {
//     dropdownMenu_4.classList.toggle('hidden');   
//   });

//   document.addEventListener('click', (event) => {
//     if (!event.target.matches('#dropdownBtn_1') && !event.target.matches('#dropdownMenu_1')) {
//       dropdownMenu_1.classList.add('hidden');
//     }
//     if (!event.target.matches('#dropdownBtn_2') && !event.target.matches('#dropdownMenu_2')) {
//       dropdownMenu_2.classList.add('hidden');
//     }
//     if (!event.target.matches('#dropdownBtn_3') && !event.target.matches('#dropdownMenu_3')) {
//       dropdownMenu_3.classList.add('hidden');
//     }
//     if (!event.target.matches('#dropdownBtn_4') && !event.target.matches('#dropdownMenu_4')) {
//       dropdownMenu_4.classList.add('hidden');
//     }
//   });
</script>

