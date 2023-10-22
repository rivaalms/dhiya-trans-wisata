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
               <Link href="/admin/dashboard" class="py-2 px-2 hover:text-amber-500 transition-all">Dashboard</Link>
               <Link href="/admin/products" class="py-2 px-2 hover:text-amber-500 transition-all">Produk</Link>
               <Link href="/admin/destinations" class="py-2 px-2 hover:text-amber-500 transition-all">Destinasi</Link>
               <Link href="/admin/prices" class="py-2 px-2 hover:text-amber-500 transition-all">Harga</Link>
               <Link href="#" class="py-2 px-2 hover:text-amber-500 transition-all">Gambar</Link>
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
</script>