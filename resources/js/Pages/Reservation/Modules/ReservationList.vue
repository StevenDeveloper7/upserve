<template>
  <div class="flex flex-col gap-6 p-6" >
    <!-- <ProductForm 
    v-if="isVisibleForm" 
    @updateList="updateList"
    @showProductForm="showProductForm" 
    :productItem="productItem" 
    :categories="categories"
    >
  </ProductForm> -->

    <h1 class="text-center text-2xl font-bold" >Listado de reservas</h1>
    <div>
        <table class="w-full" >
          <tr>
            <th>Nombre CLiente</th>
            <th>Telefono</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Valor total</th>
            <th>Acciones</th>
          </tr>
          <tr class=" " v-for="reservation in reservations" :key="reservation.id">
            <td>{{ reservation.customer.name }} {{ reservation.customer.last_name }}</td>
            <td>{{ reservation.customer.phone }}</td>
            <td>{{ reservation.date_reservation }}</td>
            <td>{{ reservation.hour}}</td>
            <td>{{ reservation.value }}</td>
            <td>
                <Tooltip content="Ver detalle de la Reservación" width="w-auto">
                <i @click="showReservationDetail(reservation)"  class="fa-solid fa-eye cursor-pointer hover:text-pwr-white p-3 rounded-full hover:bg-pwr-orange"></i>
              </Tooltip>
              <!-- <Tooltip content="Editar" width="w-auto">
                <i @click="editProduct(product)"  class="fa-solid fa-pencil cursor-pointer hover:text-pwr-white p-3 rounded-full hover:bg-pwr-orange"></i>
              </Tooltip>
              <Tooltip content="Eliminar" width="w-auto">
                <i @click="deleteProduct(product.id)" class="fa-solid fa-trash-can cursor-pointer hover:text-pwr-white p-3 rounded-full hover:bg-pwr-orange"></i>
              </Tooltip> -->
            </td>
          </tr>
        </table>
      </div>

      <Modal :show="isVisibleModal" @close="closeModal">
        <div class="p-10 flex flex-col gap-8 bg-slate-100">
            <h1 class="text-xl my-6 text-center font-semibold">Detalles de la Reservación</h1>
            <div class="flex flex-col gap-4">
                <h1 class="text-xl font-semibold">Datos del cliente</h1>
                <div class="grid grid-cols-2 gap-6">
                    <div class="">
                        <p>Nombre del Cliente:</p>
                        <p>Telefono:</p>
                        <p>Correo:</p>
                    </div>
                    <div>
                        <p>{{ reservationActive.customer.name }} {{ reservationActive.customer.last_name }}</p>
                        <p>{{ reservationActive.customer.phone }}</p>
                        <p>{{ reservationActive.customer.email }}</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-4">
                <h1 class="text-xl font-semibold">Datos de Reserva</h1>
                <div class="grid grid-cols-2 gap-6">
                    <div class="">
                        <p>Fecha:</p>
                        <p>Hora:</p>
                        <p>Valor Total:</p>
                    </div>
                    <div>
                        <p>{{ reservationActive.date_reservation }}</p>
                        <p>{{ reservationActive.hour }}</p>
                        <p>$ {{ reservationActive.value }}</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-4">
                <h1 class="text-xl font-semibold">Detalle del pedido</h1>
                <table class="w-full p-10 text-left">
                <thead class="mb-4">
                    <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Valor total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in reservationActive.reservationDetails" :key="product.id">
                        <td>{{ product.product_name }}</td>
                        <td>{{ product.quantity }}</td>
                        <td>$ {{ product.cost }}</td>
                    </tr>
                    <!-- <tr>
                        <td></td>
                        <td>Valor Total</td>
                        <td> {{ totalValue }} </td>
                    </tr> -->
                </tbody>
                </table>
            </div>

        </div>

      </Modal>
    </div>
</template>

<script setup>
import axios from 'axios'
import { ref } from 'vue'
import { toast } from 'vue3-toastify'
import { useForm } from '@inertiajs/vue3'
import Modal from '@/Components/Modal.vue';
// import ProductForm from './ProductForm.vue'
import Tooltip from '@/Components/Tooltip.vue'

const emit = defineEmits([
  'updateList'
])
const props = defineProps({
  reservations: Object,
})
console.log(props.reservations)

const form = useForm({})
// const productItem = ref({})
const isVisibleForm = ref(false)
const isVisibleModal = ref(false)
const reservationActive = ref([])
const products = props.reservations.reseravationDetails

const showProductForm = () => {
    isVisibleForm.value = !isVisibleForm.value
}

const showReservationDetail = (reservation) => {
    console.log('Ver detalle de oferta')
    reservationActive.value = reservation
    isVisibleModal.value = true

}

const closeModal = () => {
    isVisibleModal.value = false
};

// const editProduct = (product) => {
//   productItem.value = product
//   showProductForm()
// }

// const deleteProduct = (productId) => {
//   axios.post(route('product.delete'), {
//     productId
//   })
//   .then(response => {
//         emit('updateList', (response.data)) 
//         toast.success('El producto ha  sido eliminado')
//       })
//   .catch(error => {
//     console.error(error);
//   });

// }

const updateList = () => {
  emit('updateList')
}

</script>
