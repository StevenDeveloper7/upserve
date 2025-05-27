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
                <header class="grid items-center gap-2">
                    <div class="grid grid-cols-6 uppercase text-xl bg-gray-100 border-b-2 border-gray-400 relative shadow-md cursor-pointer" >
                        <div class="text-center border-r-2 border-black w-[90px]">
                            <img class="w-[75px] h-[75px]" src="img/logo_upserve.png" alt="Logo UPSERVE">
                        </div>

                        <div id="dropdownBtn_1" class="relative border-r-2 border-black px-3 py-5 hover:bg-[#322203] hover:text-[#f8dd6f] hover:scale-110">
                            <h1 class="">¿Quienes Somos?</h1>
                            <div id="dropdownMenu_1" class="hidden w-[235px] text-center absolute top-full left-0 border-2 border-gray-200 bg-gradient-to-r from-teal-400 to-green-500 shadow-md opacity-80 z-50">
                                <ul class="font-bold">
                                    <li class="p-6 border-b-2 border-black cursor-pointer hover:scale-110"><a href="/mision">MISIÓN</a></li>
                                    <li class="p-6 cursor-pointer hover:scale-110"><a href="/vision">VISIÓN</a></li>
                                </ul>
                            </div>
                        </div>

                        <div id="dropdownBtn_2" class="relative text-center border-r-2 border-black py-5 hover:bg-[#322203] hover:text-[#f8dd6f] hover:scale-110">
                            <h1>SERVICIOS</h1>
                            <div id="dropdownMenu_2" class="hidden w-[235px] text-center absolute top-full left-0 border-2 border-gray-200 bg-gradient-to-r from-teal-400 to-green-500 shadow-md opacity-80 z-50">
                                <ul class="font-bold">
                                    <li class="p-6 border-b-2 border-black cursor-pointer hover:scale-110"><a href="#">RESERVACIÓN DE MESA</a></li>
                                    <li class="p-6 cursor-pointer hover:scale-110"><a href="#">RESERVACIÓN DE SALON</a></li>
                                </ul>
                            </div>
                   
                        </div>

                        <div class="w-[220px] border-r-2 border-black">
                            <img class="absolute w-[200px] h-[130px]" src="img/logo_rancho_hojaldras.png" alt="Logo Restaurante">
                        </div>

                        <div id="dropdownBtn_3" class="relative text-center border-r-2 border-black py-5 hover:bg-[#322203] hover:text-[#f8dd6f] hover:scale-110">
                            <h1>MENU</h1>
                            <div id="dropdownMenu_3" class="hidden w-[235px] text-center absolute top-full left-0 border-2 border-gray-200 bg-gradient-to-r from-teal-400 to-green-500 shadow-md opacity-80 z-50">
                                <ul class="font-bold">
                                    <li class="p-6 border-b-2 border-black cursor-pointer hover:scale-110"><a href="#">ENTRADAS</a></li>
                                    <li class="p-6 border-b-2 border-black cursor-pointer hover:scale-110"><a href="#">PLATOS FUERTES</a></li>
                                    <li class="p-6 border-b-2 border-black cursor-pointer hover:scale-110"><a href="#">POSTRES</a></li>
                                    <li class="p-6 cursor-pointer hover:scale-110"><a href="#">BEBIDAS</a></li>
                                </ul>
                            </div>
                        </div>

                        <div id="dropdownBtn_4" class="relative text-center py-5 hover:bg-[#322203] hover:text-[#f8dd6f]">
                            <h1>CONTACTO</h1>
                            <div id="dropdownMenu_4" class="hidden w-[235px] text-center absolute top-full right-0 border-2 border-gray-200 bg-gradient-to-r from-teal-400 to-green-500 shadow-md opacity-80 z-50">
                                <ul class="font-bold">
                                    <li class="p-6 border-b-2 border-black cursor-pointer"><a href="#">CONTACTANOS</a></li>
                                    <li class="p-6 cursor-pointer hover:scale-110"> <Link :href="route('pqrs.create')">PQRS</Link></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </header>

                <main class="mt-6">
                    <div>
                        <div class="flex m-16 justify-center">
                            <div class="text-center border-2 border-[#f8dd6f] uppercase text-xl p-3 rounded-xl font-bold bg-[#322203] text-[#f8dd6f] w-[500px] opacity-75">
                            <p>“Vive una experiencia única en 'El Rancho de Hojaldras' – ¡Reserva tu mesa hoy y descubre los sabores más auténticos!"</p>
                            </div>
                        </div>

                        <div class="bg-gray-100 px-4 py-10 rounded-md w-[270px] h-[270px] absolute right-[2%] top-[40%] opacity-90 **z-40**">
                            <div class="bg-[#322203] rounded-md w-full h-full py-8 px-4 relative">
                            <div class="rounded-full p-4 bg-[#322203] absolute -top-[40%] right-[38%]">
                                <i class="fa-solid fa-user text-white text-[45px]"></i>
                            </div>


                            <!-- Login options -->
                                <div class="text-center p-2 flex flex-col gap-4">
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
                            </div>
                        </div>

                        <div class="text-center mt-8 absolute bottom-[20%] right-[42%] text-xl font-bold">
                            <button @click="showReservationForm()" class="border-2 border-black shadow-md rounded-full px-6 py-2 bg-gradient-to-r from-teal-400 to-green-500 hover:from-pink-500 hover:to-[#f8dd6f] hover:scale-110">
                            Reservar Mesa
                            </button>
                        </div>

                        <div class="relative p-10 flex">
                            <div class="z-10 h-[300px] w-[300px] border-dotted border-4 border-gray-100 rounded-full absolute -top-[20%] bg-cover bg-center bg-no-repeat" style="background-image: url('img/plato_5.png')">
                            </div>
                            <div class="z-50 h-[170px] w-[170px] border-dotted border-2 border-gray-100 rounded-full absolute top-[150%] left-[21%] bg-cover bg-center bg-no-repeat" style="background-image: url('img/plato_2.jpg')">
                            </div>
                            <div class="z-10 h-[240px] w-[240px] border-dotted border-4 border-gray-100 rounded-full absolute -top-[20%] left-[25%] bg-cover bg-center bg-no-repeat" style="background-image: url('img/plato_3.jpg')">
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    <Modal :show="isVisibleModal" @close="closeModal">
        <ReservationForm @closeModal="closeModal" :isCustomerView="true" :products="products">

        </ReservationForm>

    </Modal>
    </div>
    <!-- Terminos y condiciones-->
    <!-- <footer class="bg-gray-200 text-gray-700 py-2 mt-auto">
        <div class="container mx-auto flex justify-end items-center">
            <p class="flex items-center space-x-4">
                <a href="/terminos" class="underline hover:text-gray-900">Términos y Condiciones</a>
                <span>|</span>
                <a href="/privacidad" class="underline hover:text-gray-900">Políticas de Privacidad</a>
            </p>
        </div>
    </footer> -->
</template>

<script setup>
import { ref, onMounted } from 'vue'
import Modal from '@/Components/Modal.vue'
import { Head, Link } from '@inertiajs/vue3'
import ReservationForm from '@/Pages/Reservation/Modules/ReservationForm.vue'

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
    products: {
        type: Array,
        required: false,
    },
});

const isVisibleModal = ref(false)

const showReservationForm = (reservation) => {
    isVisibleModal.value = true
}

const closeModal = () => {
    isVisibleModal.value = false
};

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}

onMounted(() => {
    // dropdown menus
    const dropdownMenu_1 = document.getElementById('dropdownMenu_1');
    const dropdownMenu_2 = document.getElementById('dropdownMenu_2');
    const dropdownMenu_3 = document.getElementById('dropdownMenu_3');
    const dropdownMenu_4 = document.getElementById('dropdownMenu_4');

    // dropdown buttons
    const dropdownBtn_1 = document.getElementById('dropdownBtn_1');
    const dropdownBtn_2 = document.getElementById('dropdownBtn_2');
    const dropdownBtn_3 = document.getElementById('dropdownBtn_3');
    const dropdownBtn_4 = document.getElementById('dropdownBtn_4');

    // Helper function to hide all dropdowns
    const hideAllDropdowns = () => {
        [dropdownMenu_1, dropdownMenu_2, dropdownMenu_3, dropdownMenu_4].forEach(menu => {
            if (menu && !menu.classList.contains('hidden')) {
                menu.classList.add('hidden');
            }
        });
    };

    // Event listeners para los botones de la barra de navegación
    if (dropdownBtn_1 && dropdownMenu_1) {
        dropdownBtn_1.addEventListener('click', (event) => {
            event.stopPropagation(); // Evita que el clic se propague al documento
            hideAllDropdowns(); // Oculta otros menús
            dropdownMenu_1.classList.toggle('hidden'); // Alterna la visibilidad del menú actual
        });
    }
    if (dropdownBtn_2 && dropdownMenu_2) {
        dropdownBtn_2.addEventListener('click', (event) => {
            event.stopPropagation();
            hideAllDropdowns();
            dropdownMenu_2.classList.toggle('hidden');
        });
    }
    if (dropdownBtn_3 && dropdownMenu_3) {
        dropdownBtn_3.addEventListener('click', (event) => {
            event.stopPropagation();
            hideAllDropdowns();
            dropdownMenu_3.classList.toggle('hidden');
        });
    }
    if (dropdownBtn_4 && dropdownMenu_4) {
        dropdownBtn_4.addEventListener('click', (event) => {
            event.stopPropagation();
            hideAllDropdowns();
            dropdownMenu_4.classList.toggle('hidden');
        });
    }

    // Event listener global para ocultar menús al hacer clic fuera de ellos
    document.addEventListener('click', (event) => {
        // Oculta dropdownMenu_1 si el clic no fue en su botón o en el propio menú
        if (dropdownMenu_1 && !event.target.closest('#dropdownBtn_1') && !event.target.closest('#dropdownMenu_1')) {
            dropdownMenu_1.classList.add('hidden');
        }
        // Oculta dropdownMenu_2 si el clic no fue en su botón o en el propio menú
        if (dropdownMenu_2 && !event.target.closest('#dropdownBtn_2') && !event.target.closest('#dropdownMenu_2')) {
            dropdownMenu_2.classList.add('hidden');
        }
        // Oculta dropdownMenu_3 si el clic no fue en su botón o en el propio menú
        if (dropdownMenu_3 && !event.target.closest('#dropdownBtn_3') && !event.target.closest('#dropdownMenu_3')) {
            dropdownMenu_3.classList.add('hidden');
        }
        // Oculta dropdownMenu_4 si el clic no fue en su botón o en el propio menú
        if (dropdownMenu_4 && !event.target.closest('#dropdownBtn_4') && !event.target.closest('#dropdownMenu_4')) {
            dropdownMenu_4.classList.add('hidden');
        }
    });
});
</script>
