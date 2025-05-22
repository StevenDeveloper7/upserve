<template>
  <div>
    <form @submit.prevent="" class="mt-6 space-y-6">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6" >
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
                <InputLabel for="description" value="Descripcion" />
    
                <TextInput
                    id="description"
                    type="text"
                    class="w-full"
                    v-model="form.description"
                    required
                />
    
                <InputError class="mt-2" :message="form.errors.description" />
            </div>
    
            <div>
                <InputLabel for="cost" value="Valor" />
    
                <TextInput
                    id="cost"
                    type="number"
                    class="w-full"
                    v-model="form.cost"
                    required
                />
    
                <InputError class="mt-2" :message="form.errors.cost" />
            </div>
    
            <div>
                <InputLabel for="quantity" value="Cantidad" />
    
                <TextInput
                    id="quantity"
                    type="number"
                    
                    class="w-full"
                    v-model="form.quantity"
                    required
                />
    
                <InputError class="mt-2" :message="form.errors.quantity" />
            </div>

            <div>
              <InputLabel
                for="category"
                value="Categoria"
              />
    
              <BaseSelect
                id="category"
                v-model="form.category_id"
                class="w-full"
                :options-select="categories"
                required
              />
    
              <InputError class="mt-2" :message="form.errors.category_id" />
            </div>
        </div>

        
        <PrimaryButton @click="storeProduct()" :disabled="form.processing">{{ productItem ? 'Actualizar' : 'Guardar'}}</PrimaryButton>
    </form>
  </div>
</template>

<script setup>
import { toast } from 'vue3-toastify';
import { useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import BaseSelect from '@/Components/BaseSelect.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    categories: Array,
    productItem: Object
})

const emit = defineEmits([
    'showProductForm',
    'updateList'
])

console.log(props.productItem)

const form = useForm({
    name: props.productItem ? props.productItem.name : '',
    description: props.productItem ? props.productItem.description : '',
    cost: props.productItem ? props.productItem.cost : 0,
    quantity: props.productItem ? props.productItem.quantity : 0,
    category_id: props.productItem ? props.productItem.category_id : '',
});

const storeProduct = () => {
    if (props.productItem) {
        form.post(route('product.update',  props.productItem.id), {
            preserveScroll: true,
          onSuccess: () => {
            emit('updateList')
            toast.success('Has actualizado el producto');
            emit('showProductForm')
          }
        })

    } else {
        form.post(route('product.store'), {
            preserveScroll: true,
          onSuccess: () => {
            form.reset()
            emit('updateList')
            toast.success('Has agregado un nuevo producto');
            emit('showProductForm')
          }
        })
    }
};
</script>