<template>
  <div class="flex flex-col gap-6 p-6" >
    <CategoryForm 
    v-if="isVisibleForm" 
    @updateList="updateList"
    @showCategoryForm="showCategoryForm" 
    :categoryItem="categoryItem" 
    >
  </CategoryForm>

    <h1 class="text-center text-2xl font-bold" >Listado de categoria de productos</h1>
    <div>
        <table class="w-full" >
          <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
          </tr>
          <tr class=" " v-for="category in categories" :key="category.id">
            <td>{{ category.name }}</td>
            <td>{{ category.description }}</td>
            <td>
              <Tooltip content="Editar" width="w-auto">
                <i @click="editCategory(category)"  class="fa-solid fa-pencil cursor-pointer hover:text-pwr-white p-3 rounded-full hover:bg-pwr-orange"></i>
              </Tooltip>
              <Tooltip content="Eliminar" width="w-auto">
                <i @click="deleteCategory(category.id)" class="fa-solid fa-trash-can cursor-pointer hover:text-pwr-white p-3 rounded-full hover:bg-pwr-orange"></i>
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
import CategoryForm from './CategoryForm.vue'
import Tooltip from '@/Components/Tooltip.vue'

const emit = defineEmits([
  'updateList'
])

const props = defineProps({
  categories: Array
})

const form = useForm({})
const categoryItem = ref({})
const isVisibleForm = ref(false)

const showCategoryForm = () => {
    isVisibleForm.value = !isVisibleForm.value
}

const editCategory = (category) => {
  categoryItem.value = category
  showCategoryForm()
}

const deleteCategory = (categoryId) => {
  axios.post(route('category.delete'), {
    categoryId
  })
  .then(response => {
        emit('updateList', (response.data)) 
        toast.success('La categoria ha  sido eliminada')
      })
  .catch(error => {
    console.error(error);
  });

}

const updateList = () => {
  emit('updateList')
}

</script>
