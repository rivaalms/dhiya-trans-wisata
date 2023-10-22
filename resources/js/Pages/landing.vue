<template>
<default-layout>
   <Head title="Landing"/>
   <Hero
      height-class="h-[calc((100vh-72px)*0.5)]"
      md-height-class="h-[650px]"
      bg-class="bg-[url('/img/bus-bg.jpg')]"
   >
      <p class="font-serif uppercase text-gray-200 tracking-wide font-semibold text-3xl md:text-5xl mb-12">
         Trans Wisata Bandung
      </p>
      <div>
         <Link href="/contacts" class="text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-amber-400/75 font-bold rounded-full tracking-wide px-8 py-4 mb-2 transition-colors text-sm md:text-base">
            RESERVASI SEKARANG
         </Link>
      </div>
   </Hero>

   <div class="container mx-auto">
      <div class="grid grid-cols-1 gap-40 py-40">
         <!-- SECTION: Benefit -->
         <div class="grid grid-cols-3 gap-4 w-2/3 mx-auto">
            <div class="card shadow-none border-0">
               <div class="flex justify-center pb-6 text-amber-500">
                  <svg width="64" height="64" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path d="M2 9h19a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V9Zm1-6h15v4H2V4a1 1 0 0 1 1-1Zm12 11v2h3v-2h-3Z"></path>
                  </svg>
               </div>
               <p class="text-center text-xl font-semibold">
                  Harga Bersahabat
               </p>
            </div>
            <div class="card shadow-none border-0">
               <div class="flex justify-center pb-6 text-amber-500">
                  <svg width="64" height="64" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path d="M17 20H7v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-1H3v-8H2V8h1V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v3h1v4h-1v8h-1v1a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-1ZM5 5v9h14V5H5Zm0 11v2h4v-2H5Zm10 0v2h4v-2h-4Z"></path>
                  </svg>
               </div>
               <p class="text-center text-xl font-semibold">
                  Performa Layanan Terbaik
               </p>
            </div>
            <div class="card shadow-none border-0">
               <div class="flex justify-center pb-6 text-amber-500">
                  <svg width="64" height="64" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path d="M12 11a5 5 0 0 1 5 5v6H7v-6a5 5 0 0 1 5-5Zm-6.712 3.006a6.984 6.984 0 0 0-.28 1.65L5 16v6H2v-4.5a3.5 3.5 0 0 1 3.119-3.48l.17-.014h-.001Zm13.424 0A3.501 3.501 0 0 1 22 17.5V22h-3v-6c0-.693-.1-1.362-.288-1.994ZM5.5 8a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5Zm13 0a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM12 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8Z"></path>
                  </svg>
               </div>
               <p class="text-center text-xl font-semibold">
                  Tim Berpengalaman
               </p>
            </div>
         </div>
         <!-- !SECTION -->

         <!-- SECTION: Product -->
         <div class="grid grid-cols-3 gap-6 place-content end w-2/3 mx-auto">
            <p class="font-serif col-span-3 pb-8 font-bold uppercase text-2xl text-center">
               Produk Kami
            </p>
            <template v-for="item in props.products">
               <Link :href="`/products/${item.slug}`">
                  <div class="card p-0 hover:shadow-md hover:text-amber-500 hover:cursor-pointer transition-all">
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
            <div class="col-span-3 pt-8 flex justify-center">
               <Link href="/products" class="font-semibold bg-amber-500 px-4 py-2 rounded-full text-white hover:bg-amber-600 active:ring-2 active:ring-offset-2 active:ring-amber-300 transition-colors">
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
