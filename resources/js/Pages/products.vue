<template>
<Head title="Produk"/>

<default-layout>
   <Hero
      height-class="h-[calc((100vh-92px)*33%)]"
      md-height-class="h-[650px]"
      bg-class="bg-[url('/img/pangalengan-2.jpg')]"
   >
      <p class="uppercase text-gray-200 tracking-wide font-semibold text-3xl md:text-6xl">
         Produk
      </p>
   </Hero>

   <div class="container mx-auto">
      <div class="grid grid-cols-1 gap-12 py-40">
         <div class="grid grid-cols-3 gap-6 place-content-end w-2/3 mx-auto">
            <template v-for="item in props.products">
               <Link :href="`/products/${item.slug}`">
                  <div class="card p-0 hover:shadow-xl hover:text-amber-500 hover:cursor-pointer transition-all">
                     <div class="aspect-[1.25/1] border-b">
                        <img :src="item.image" alt="" class="object-cover h-full w-auto rounded-t-[0.425rem]">
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
import { Head, Link } from '@inertiajs/vue3'

const props = defineProps({
   products: Array
})
</script>