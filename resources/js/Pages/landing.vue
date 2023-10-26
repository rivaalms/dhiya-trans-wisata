<template>
<default-layout>
   <Head/>
   <Hero
      height-class="lg:h-[500px] md:h-[650px] h-[250px]"
      bg-class="bg-[url('/img/gedung-sate.jpg')]"
      hide-overlay
   >
   </Hero>

   <div class="container mx-auto">
      <div class="grid grid-cols-1 gap-40 py-28">
         <div class="flex flex-col items-center">
            <p class="font-serif tracking-wide font-bold text-3xl md:text-5xl lg:text-6xl mb-2 lg:mb-6">
               Trans Wisata Bandung
            </p>
            <div class="relative mb-12">
               <p class="font-bold text-xl md:text-3xl lg:text-3xl text-center">
                  Safe, Reliable, Unforgettable Journeys
               </p>
               <div class="bg-amber-200 absolute h-4 md:h-6 -inset-x-4 lg:-inset-x-8 top-4 md:top-5 -z-10"></div>
            </div>
            <Link href="/contacts" class="py-3 px-5 bg-amber-500 text-white font-semibold  text-base md:text-lg lg:text-xl hover:bg-amber-600 transition-all duration-300">
               Reservasi Sekarang
            </Link>
         </div>

         <!-- SECTION: Product -->
         <div class="grid grid-cols-1 gap-4 w-full px-2 md:px-0 md:mx-auto">
            <div class="flex justify-center mx-auto md:w-2/3 lg:w-5/6 xl:w-2/3">
               <p class="font-bold uppercase text-2xl">
                  Produk Kami
               </p>
            </div>
            <div class="px-4 lg:px-0 w-full lg:w-5/6 xl:w-2/3 mx-auto grid grid-cols-2 md:grid-cols-3 gap-4">
               <template v-for="item in props.products">
                  <Link :href="`/products/${item.slug}`" class="col-span-2 sm:col-span-1">
                     <div class="card p-0 hover:shadow-lg hover:text-amber-500 hover:cursor-pointer transition-all duration-300">
                        <div class="h-60 border-b">
                           <img :src="item.image" alt="" class="object-cover object-center h-full w-full rounded-t-[0.425rem]">
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
            <div class="pt-4 flex justify-center">
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
