<template>
  <Link :href="route(routingName)" >
    <div class="flex flex-col gap-3 items-center rounded-lg shadow-md w-[250px] p-3 border-2 border-orange-300 text-pwr-brown bg-slate-50 hover:scale-110 hover:bg-gray-300 hover:border-black">
      <!-- Icon -->
      <div>
        <i :class="iconName" class="fa-solid text-6xl"></i>
      </div>

      <!-- Message -->
      <div>
        <h1 class="font-semibold text-xl uppercase" >{{ messageContent }}</h1>
      </div>
    </div>
  </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
  iconName: String,
  routingName: String,
  messageContent: String
})

</script>

