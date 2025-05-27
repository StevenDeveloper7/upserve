<template>

    <!-- Produc Category -->
    <Head title="Categoria de productos" /> 

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Categoria de Productos</h2>
        </template>
        
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 flex flex-col gap-6">
                      Modulo de categoria de productos
                      <div>
                        <PrimaryButton @click="showCategoryForm()" >Agregar</PrimaryButton>
                      </div>

                      <CategoryForm @updateList="updateList" v-if="isVisibleForm" @showCategoryForm="showCategoryForm"  :categories="categories" />

                      <CategoryList @updateList="updateList" :categories="categories"></CategoryList>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import CategoryForm from './Modules/CategoryForm.vue';
import CategoryList from './Modules/CategoryList.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    categories: Array
})

const isVisibleForm = ref(false)
const productsList = ref(props.products)

const showCategoryForm = () => {
    isVisibleForm.value = !isVisibleForm.value
}

const updateList = (products) => {
    if (products) {
        productsList.value = products
    } else {
        console.log(props.products)
        productsList.value = props.products
    }
}
</script>
