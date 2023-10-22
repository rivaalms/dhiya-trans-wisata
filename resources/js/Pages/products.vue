<template>
<Head title="Produk"/>

<default-layout>
   <Hero
      height-class="h-[calc((100vh-73px)*0.5)]"
      md-height-class="h-[650px]"
      bg-class="bg-[url('/img/bus-bg.jpg')]"
   >
      <h1 class="font-serif uppercase text-gray-200 tracking-wide font-semibold text-3xl md:text-5xl">
         Produk
      </h1>
   </Hero>

   <div class="container mx-auto">
      <div class="grid grid-cols-1 gap-12 py-40">
         <div class="w-2/3 mx-auto grid gap-4 text-lg">
            <h2 class="font-serif font-bold text-2xl pb-2 text-center">
               Produk Kami
            </h2>
            <p>Sewa Bus Bandung di {{ company.name }} yang selalu siap menghantar Anda berwisata murah dengan armada bus pariwisata di Bandung, Indonesia dengan pelayanan profesional, bersahabat, dan memuaskan.
            </p>
            <p>
               {{ company.name }} bekerja sama dengan perusahaan Bus pariwisata di Bandung guna menyediakan Sewa Bus Bandung untuk kebutuhan pariwisata dan lainnya.
            </p>
         </div>
         <div class="grid grid-cols-3 gap-6 place-content-end w-2/3 mx-auto">
            <template v-for="item in props.products">
               <Link :href="`/products/${item.slug}`">
                  <div class="card p-0 hover:shadow-md hover:text-amber-500 hover:cursor-pointer transition-all">
                     <div class="h-60 border-b">
                        <img :src="item.image.path" alt="" class="object-cover h-full w-full rounded-t-[0.425rem]">
                     </div>
                     <div class="p-6">
                        <p class="text-center text-lg font-semibold">
                           {{ item.name }}
                        </p>
                     </div>
                  </div>
               </Link>
            </template>
         </div>
      </div>
   </div>
</default-layout>
</template>

<script setup>
import DefaultLayout from '@/layouts/default.vue'
import Hero from '@/components/hero.vue'
import { Head, Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
   products: Array
})

const company = computed(() => usePage().props.company)
</script>