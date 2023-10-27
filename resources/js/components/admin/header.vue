<template>
<header>
   <div class="shadow">
      <div class="container mx-auto">
         <div class="flex justify-between items-center py-2">
            <div class="flex flex-col">
               <p class="text-lg">
                  {{ company.name }}
               </p>
               <p class="text-gray-500 text-sm">
                  Admin
               </p>
            </div>
            <div class="flex gap-4">
               <Link
                  href="/admin/products"
                  class="py-2 px-2 hover:text-blue-500 transition-all"
                  :class="$page.component === 'admin/products' ? activeClass : ''"
               >
                  Produk
               </Link>
               <Link
                  href="/admin/destinations"
                  class="py-2 px-2 hover:text-blue-500 transition-all"
                  :class="$page.component === 'admin/destinations' ? activeClass : ''"
               >
                  Destinasi
               </Link>
               <Link
                  href="/admin/prices"
                  class="py-2 px-2 hover:text-blue-500 transition-all"
                  :class="$page.component === 'admin/prices' ? activeClass : ''"
               >
                  Harga
               </Link>
            </div>
         </div>
      </div>
   </div>
</header>
</template>

<script setup>
import { computed } from 'vue'
import { usePage, Link } from '@inertiajs/vue3'

const company = computed(() => usePage().props.company)
const activeClass = computed(() => [
   'text-blue-500',
   'font-medium'
])
</script>