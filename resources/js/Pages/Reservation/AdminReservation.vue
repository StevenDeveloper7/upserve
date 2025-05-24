<template>
    <Head title="Reservaciones" /> 

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Reservaciones</h2>
        </template>
        
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 flex flex-col gap-6">
                      Modulo de Reservaciones
                      <div>
                        <PrimaryButton @click="showReservationForm()">Agregar reserva</PrimaryButton>
                      </div>

                      <ReservationForm @updateList="updateList" v-if="isVisibleForm" @showReservationForm="showReservationForm"  :products="products" />

                      <!-- <ProductList @updateList="updateList" :products="products" :products="productsList"></ProductList> -->
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
// import ProductList from './Modules/ProductList.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ReservationForm from './Modules/ReservationForm.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    products: Array,
    reservations: Object
})

const isVisibleForm = ref(false)
const reservationsList = ref(props.reservations)

const showReservationForm = () => {
    isVisibleForm.value = !isVisibleForm.value
}

const updateList = (reservations) => {
    if (reservations) {
        reservationsList.value = reservations
    } else {
        console.log(props.reservations)
        reservationsList.value = props.reservations
    }
}
</script>
