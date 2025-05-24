<template>
  <div>
    <form @submit.prevent="" class="mt-6 space-y-6 flex flex-col gap-8">

        <!-- Customer data -->
        <div>
            <h1 class="text-center text-xl font-semibold uppercase mb-5">datos del cliente</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6" >
                <div>
                    <InputLabel for="name" value="Nombre" />
        
                    <TextInput
                        id="name"
                        type="text"
                        class="w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />
        
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
        
                <div>
                    <InputLabel for="last_name" value="Apellidos" />
        
                    <TextInput
                        id="last_name"
                        type="text"
                        class="w-full"
                        v-model="form.last_name"
                        required
                    />
        
                    <InputError class="mt-2" :message="form.errors.last_name" />
                </div>
        
                <div>
                    <InputLabel for="phone" value="Telefono" />
        
                    <TextInput
                        id="phone"
                        type="number"
                        class="w-full"
                        v-model="form.phone"
                        required
                    />
        
                    <InputError class="mt-2" :message="form.errors.phone" />
                </div>
        
                <div>
                    <InputLabel for="email" value="Correo" />
        
                    <TextInput
                        id="email"
                        type="email"
                        class="w-full"
                        v-model="form.email"
                        required
                    />
        
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
            </div>
        </div>     

        <!-- Reservation data -->
        <div>
            <h1 class="text-center text-xl font-semibold uppercase mb-5">datos de la reserva</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6" >
                <div>
                    <InputLabel for="date_reservation" value="Fecha de reservación" />
        
                    <TextInput
                        id="date_reservation"
                        type="date"
                        class="w-full"
                        v-model="form.date_reservation"
                        required
                        autofocus
                        autocomplete="date_reservation"
                    />
        
                    <InputError class="mt-2" :message="form.errors.date_reservation" />
                </div>
        
                <div>
                    <InputLabel for="hour" value="Hora de reservación" />
        
                    <TextInput
                        id="hour"
                        type="time"
                        class="w-full"
                        v-model="form.hour"
                        required
                    />
        
                    <InputError class="mt-2" :message="form.errors.hour" />
                </div>
            </div>
        </div>    

        <!-- Order data -->
        <div class="grid gap-4">
            <h1 class="text-center text-xl font-semibold uppercase mb-5">datos del pedido</h1>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 items center" >
                <div>
                    <InputLabel
                        value="Producto"
                    />
            
                    <BaseSelect
                        v-model="productId"
                        class="w-full"
                        :options-select="products"
                        required
                    />
                </div>
        
                <div>
                    <InputLabel value="Cantidad" />
                    <TextInput
                        type="number"
                        class="w-full"
                        v-model="quantityProduct"
                        required
                    />
                </div>

                <button type="button" class="h-min mt-1 sm:mt-3 p-3 bg-blue-400 text-white font-semibold rounded-xl" @click="addProduct()" >Agregar producto</button>

            </div>

            <div>
                <h1  class="text-center text-xl font-semibold uppercase my-5">Productos agregados al pedido</h1>
                <table class="w-full p-10 text-left">
                <thead class="mb-4">
                    <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Valor total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in addedProducts" :key="product.productId">
                        <td>{{ product.name }}</td>
                        <td>{{ product.quantity }}</td>
                        <td>$ {{ product.cost }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Valor Total</td>
                        <td> {{ totalValue }} </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>    
        
        <PrimaryButton @click="storeReservation()" :disabled="form.processing">{{ reservationItem ? 'Actualizar' : 'Guardar'}}</PrimaryButton>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { toast } from 'vue3-toastify';
import { useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import BaseSelect from '@/Components/BaseSelect.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    products: Array,
    ReservationItem: Object
})

const emit = defineEmits([
    'showReservationForm',
    'updateList'
])



const productId = ref(0)
const quantityProduct = ref(0)
const addedProducts = ref([])
const products = props.products
const totalValue = ref(0)
const form = useForm({
    name: props.reservationItem ? props.reservationItem.name : '',
    hour: props.reservationItem ? props.reservationItem.hour : '',
    phone: props.reservationItem ? props.reservationItem.phone : '',
    email: props.reservationItem ? props.reservationItem.email : '',
    last_name: props.reservationItem ? props.reservationItem.last_name : '',
    date_reservation: props.reservationItem ? props.reservationItem.date_reservation : '',
    order: '',
    totalValue: ''
});

const storeReservation = () => {
    if (props.reservationItem) {
        form.post(route('product.update',  props.reservationItem.id), {
            preserveScroll: true,
          onSuccess: () => {
            emit('updateList')
            toast.success('Has actualizado la reserva');
            emit('showReservationForm')
          }
        })

    } else {
        form.order = addedProducts.value
        form.totalValue = totalValue.value
        form.post(route('reservation.store'), {
            preserveScroll: true,
          onSuccess: () => {
            // form.reset()
            // emit('updateList')
            toast.success('Has agregado una reservación');
            emit('showReservationForm')
          }
        })
    }
};

const addProduct = () => {
    let productFind = '';
    for (let arrayPosition = 0; arrayPosition < products.length; arrayPosition++) {
        if (products[arrayPosition].id == productId.value) {
            productFind = products[arrayPosition]
        }        
    }

    const productAdded = {
        id: productId.value,
        name: productFind.description,
        quantity: quantityProduct.value,
        cost: productFind.value * quantityProduct.value
    }

    totalValue.value += productAdded.cost
    addedProducts.value.push(productAdded)


    productId.value = 0
    quantityProduct.value = 0
    console.log(addedProducts.value)
}
</script>