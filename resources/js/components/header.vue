<template>
<header>
   <div class="shadow">
      <div class="container mx-auto">
         <div class="flex justify-around items-center py-3">
            <div class="flex gap-8 uppercase">
               <Link
                  href="/"
                  class="p-2 hover:text-amber-500 transition-colors duration-300"
               >
                  Home
               </Link>

               <Link
                  href="/products"
                  class="p-2 hover:text-amber-500 transition-colors duration-300"
               >
                  Produk
               </Link>
            </div>

            <div class="relative hidden md:block group">
               <Link
                  href="/"
                  class="font-serif text-2xl font-semibold uppercase"
               >
                  {{ company.name }}
               </Link>
               <div class="absolute bg-amber-200 h-3 -z-10 -inset-x-2 bottom-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>

            <div class="flex gap-8 uppercase">
               <Link
                  href="/about"
                  class="p-2 hover:text-amber-500 transition-colors duration-300"
               >
                  Tentang
               </Link>

               <Link
                  href="/contacts"
                  class="p-2 hover:text-amber-500 transition-colors duration-300"
               >
                  Kontak
               </Link>
            </div>
         </div>
      </div>
   </div>
</header>
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const company = computed(() => usePage().props.company)
</script>
