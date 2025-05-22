<template>
    <Head title="Productos" /> 

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Productos</h2>
        </template>
        
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 flex flex-col gap-6">
                      Modulo de productos
                      <div>
                        <PrimaryButton @click="showProductForm()" >Agregar</PrimaryButton>
                      </div>

                      <ProductForm @updateList="updateList" v-if="isVisibleForm" @showProductForm="showProductForm"  :categories="categories" />

                      <ProductList @updateList="updateList" :categories="categories" :products="productsList"></ProductList>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import ProductForm from './Modules/ProductForm.vue';
import ProductList from './Modules/ProductList.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    categories: Array,
    products: Object
})

const isVisibleForm = ref(false)
const productsList = ref(props.products)

const showProductForm = () => {
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
