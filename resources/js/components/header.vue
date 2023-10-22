<template>
<header>
   <div class="shadow">
      <div class="container mx-auto">
         <div class="flex justify-around items-center py-2">
            <div class="flex gap-8 uppercase">
               <Link
                  href="/"
                  class="p-4 hover:text-amber-500 transition-colors"
                  :class="$page.component === 'landing' ? activeClass : ''"
               >
                  Home
               </Link>

               <Link
                  href="/products"
                  class="p-4 hover:text-amber-500 transition-colors"
                  :class="$page.component === 'products' ? activeClass : ''"
               >
                  Produk
               </Link>
            </div>

            <Link
               href="/"
               class="font-serif text-2xl font-semibold uppercase hover:underline hover:decoration-2 hover:decoration-amber-500 hover:underline-offset-2"
            >
               {{ company.name }}
            </Link>

            <div class="flex gap-8 uppercase">
               <Link
                  href="/about"
                  class="p-4 hover:text-amber-500 transition-colors"
                  :class="$page.component === 'about' ? activeClass : ''"
               >
                  Tentang
               </Link>

               <Link
                  href="/contacts"
                  class="p-4 hover:text-amber-500 transition-colors"
                  :class="$page.component === 'contacts' ? activeClass : ''"
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

const activeClass = computed(() => [
   'text-amber-500',
   'font-medium',
])
</script>
