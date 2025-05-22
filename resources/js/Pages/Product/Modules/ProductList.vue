<template>
  <div class="flex flex-col gap-6 p-6" >
    <ProductForm 
    v-if="isVisibleForm" 
    @updateList="updateList"
    @showProductForm="showProductForm" 
    :productItem="productItem" 
    :categories="categories"
    >
  </ProductForm>

    <h1 class="text-center text-2xl font-bold" >Listado de productos</h1>
    <div>
        <table class="w-full" >
          <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Categoria</th>
            <th>Acciones</th>
          </tr>
          <tr class=" " v-for="product in products" :key="product.id">
            <td>{{ product.name }}</td>
            <td>{{ product.description }}</td>
            <td>{{ product.cost }}</td>
            <td>{{ product.quantity }}</td>
            <td>{{ product.category }}</td>
            <td>
              <Tooltip content="Editar" width="w-auto">
                <i @click="editProduct(product)"  class="fa-solid fa-pencil cursor-pointer hover:text-pwr-white p-3 rounded-full hover:bg-pwr-orange"></i>
              </Tooltip>
              <Tooltip content="Eliminar" width="w-auto">
                <i @click="deleteProduct(product.id)" class="fa-solid fa-trash-can cursor-pointer hover:text-pwr-white p-3 rounded-full hover:bg-pwr-orange"></i>
              </Tooltip>
            </td>
          </tr>
        </table>
      </div>
    </div>
</template>

<script setup>
import axios from 'axios'
import { ref } from 'vue'
import { toast } from 'vue3-toastify'
import { useForm } from '@inertiajs/vue3'
import ProductForm from './ProductForm.vue'
import Tooltip from '@/Components/Tooltip.vue'

const emit = defineEmits([
  'updateList'
])
const props = defineProps({
  products: Object,
  categories: Array
})

const form = useForm({})
const productItem = ref({})
const isVisibleForm = ref(false)

const showProductForm = () => {
    isVisibleForm.value = !isVisibleForm.value
}

const editProduct = (product) => {
  productItem.value = product
  showProductForm()
}

const deleteProduct = (productId) => {
  axios.post(route('product.delete'), {
    productId
  })
  .then(response => {
        emit('updateList', (response.data)) 
        toast.success('El producto ha  sido eliminado')
      })
  .catch(error => {
    console.error(error);
  });

}

const updateList = () => {
  emit('updateList')
}

</script>
