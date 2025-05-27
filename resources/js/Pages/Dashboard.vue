<script setup>
import { Head } from '@inertiajs/vue3';
import CardAdminSection from '@/Components/CardAdminSection.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const dashboardSections = [
    {id: 1, iconName: 'fa-cart-shopping', messageContent: 'Productos', routingName: "product.index"},
    {id: 2, iconName: 'fa-clipboard', messageContent: 'Reservaciones', routingName: "reservation.index"},
    {id: 3, iconName: 'fa-bookmark', messageContent: 'Categoria de Productos', routingName: "category.index"}
]
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 flex gap-6 justify-center">
                        
                        <CardAdminSection 
                            v-for="dashboardSection in dashboardSections" :key="dashboardSection.id" 
                            :iconName="dashboardSection.iconName" 
                            :messageContent="dashboardSection.messageContent" 
                            :routingName="dashboardSection.routingName" >
                        </CardAdminSection>
                    
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
