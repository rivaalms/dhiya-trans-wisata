<template>
<default-layout>
   <Head title="Landing"/>
   <Hero
      height-class="h-[calc((100vh-92px)*33%)]"
      md-height-class="h-[650px]"
      bg-class="bg-[url('/img/pangalengan-2.jpg')]"
   >
      <p class="uppercase text-gray-200 tracking-wide font-semibold text-3xl md:text-6xl mb-12">
         Trans Wisata Bandung
      </p>
      <div>
         <Link href="/contacts" class="text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-amber-400/75 font-medium rounded-full tracking-wide px-8 py-4 mb-2 transition-colors text-sm md:text-base">
            RESERVASI SEKARANG
         </Link>
      </div>
   </Hero>

   <div class="container mx-auto">
      <div class="grid grid-cols-1 gap-12 py-40">
         <p class="font-bold uppercase text-4xl text-center">
            Produk Kami
         </p>
         <div class="grid grid-cols-3 gap-6 place-content end w-2/3 mx-auto">
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

         <div class="pt-12 flex justify-center">
            <Link href="/products" class="bg-amber-500 px-4 py-2 rounded-full text-white hover:bg-amber-600 active:ring-2 active:ring-offset-2 active:ring-amber-300 transition-colors">
               Lihat Selengkapnya
            </Link>
         </div>
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
