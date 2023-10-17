<template>
   <footer class="bg-amber-500">
      <div class="container mx-auto">
         <div class="grid grid-cols-1 gap-4 py-12 px-4 text-white">
            <p class="text-center text-sm md:text-base">
               {{ company.address }} | {{ company.email }} | {{ company.phone }}
            </p>
            <p class="text-center text-sm md:text-base">
               &copy; 2023 {{ company.name }}
            </p>
         </div>
      </div>
   </footer>
</template>

<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const company = computed(() => usePage().props.company)
</script>