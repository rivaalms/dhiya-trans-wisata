<template>
<default-layout>
   <Head title="Landing"/>
   <Hero
      height-class="h-[500px]"
      md-height-class="h-[650px]"
      bg-class="bg-[url('/img/gedung-sate.jpg')]"
      hide-overlay
   >
   </Hero>

   <div class="container mx-auto">
      <div class="grid grid-cols-1 gap-24 py-12">
         <div class="flex flex-col items-center">
            <p class="font-serif tracking-wide font-bold text-3xl md:text-6xl mb-6">
               Trans Wisata Bandung
            </p>
            <div class="relative mb-12">
               <p class="font-bold text-3xl">
                  Safe, Reliable, Unforgettable Journeys
               </p>
               <div class="bg-amber-200 absolute h-6 -inset-x-8 top-5 -z-10"></div>
            </div>
            <Link href="/contacts" class="py-3 px-5 bg-amber-500 text-white font-semibold text-xl hover:bg-amber-600 transition-all duration-300">
               Reservasi Sekarang
            </Link>
         </div>

         <!-- SECTION: Product -->
         <div class="grid grid-cols-3 gap-4 place-content end w-2/3 mx-auto">
            <p class="col-span-3 font-bold uppercase text-2xl text-center">
               Produk Kami
            </p>
            <template v-for="item in props.products">
               <Link :href="`/products/${item.slug}`">
                  <div class="card p-0 hover:shadow-lg hover:text-amber-500 hover:cursor-pointer transition-all duration-300">
                     <div class="aspect-[1.5/1] border-b">
                        <img :src="item.image" alt="" class="object-cover object-center h-full w-auto rounded-t-[0.425rem]">
                     </div>
                     <div class="p-6">
                        <p class="text-center text-lg font-semibold">
                           {{ item.name }}
                        </p>
                     </div>
                  </div>
               </Link>
            </template>
            <div class="col-span-3 pt-4 flex justify-center">
               <Link href="/products" class="px-4 py-2 bg-amber-500 text-white font-semibold hover:bg-amber-600 transition-all duration-300">
                  Lihat Selengkapnya
               </Link>
            </div>
         </div>
         <!-- !SECTION -->
      </div>
   </div>

</default-layout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3'
import Hero from '../components/hero.vue'
import DefaultLayout from '../layouts/default.vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
   products: {
      type: Array,
      required: true,
      default: []
   }
})
</script>
