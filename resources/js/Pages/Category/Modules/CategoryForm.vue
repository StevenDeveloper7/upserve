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
    
        </div>
        
        <PrimaryButton @click="storeCategory()" :disabled="form.processing">{{ categoryItem ? 'Actualizar' : 'Guardar'}}</PrimaryButton>
    </form>
  </div>
</template>

<script setup>
import { toast } from 'vue3-toastify';
import { useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    categoryItem: Object
})

const emit = defineEmits([
    'showCategoryForm',
    'updateList'
])


const form = useForm({
    name: props.categoryItem ? props.categoryItem.name : '',
    description: props.categoryItem ? props.categoryItem.description : '',
});

const storeCategory = () => {
    if (props.categoryItem) {
        form.post(route('category.update',  props.categoryItem.id), {
            preserveScroll: true,
          onSuccess: () => {
            emit('updateList')
            toast.success('Has actualizado la categoria del producto');
            emit('showCategoryForm')
          }
        })

    } else {
        form.post(route('category.store'), {
            preserveScroll: true,
          onSuccess: () => {
            form.reset()
            emit('updateList')
            toast.success('Has agregado una nueva categoria de producto');
            emit('showCategoryForm')
          }
        })
    }
};
</script>