<template>
<Head title="Produk"/>

<default-layout>
   <Hero
      height-class="h-[300px]"
      md-height-class="h-[650px]"
      bg-class="bg-[url('/img/geometric.jpg')]"
      hide-overlay
   >
      <h1 class="font-serif uppercase tracking-wide font-semibold text-3xl md:text-5xl">
         Produk
      </h1>
   </Hero>

   <div class="container mx-auto">
      <div class="grid grid-cols-1 gap-12 py-40">
         <div class="w-2/3 mx-auto grid gap-4 text-lg">
            <p>
               Sewa Bus Bandung di {{ company.name }} siap mengantar Anda pada perjalanan wisata yang ekonomis dengan armada bus pariwisata terbaik di Bandung, Indonesia. Kami bangga memberikan layanan profesional, ramah, dan memuaskan kepada pelanggan kami.
            </p>
            <p>
               {{ company.name }} menjalin kerja sama dengan perusahaan bus pariwisata terkemuka di Bandung untuk menyediakan layanan Sewa Bus Bandung yang dapat memenuhi berbagai kebutuhan perjalanan wisata dan lainnya.
            </p>
         </div>
         <div class="grid grid-cols-3 gap-4 place-content-end w-2/3 mx-auto">
            <template v-for="item in props.products">
               <Link :href="`/products/${item.slug}`">
                  <div class="card p-0 hover:shadow-lg hover:text-amber-500 hover:cursor-pointer transition-all duration-300">
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