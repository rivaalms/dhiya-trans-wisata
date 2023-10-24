<template>
<Head title="Tentang"/>
<default-layout>
   <Hero
      height-class="h-[300px]"
      md-height-class="h-[650px]"
      bg-class="bg-[url('/img/geometric.jpg')]"
      hide-overlay
   >
      <h1 class="font-serif uppercase tracking-wide font-semibold text-3xl md:text-5xl">
         Tentang
      </h1>
   </Hero>

   <div class="container mx-auto">
      <div class="grid grid-cols-1 gap-12 py-40">
         <div class="w-2/3 mx-auto grid grid-cols-2 gap-4">
            <div class="flex justify-center">
               <img src="/img/dhiya-rental-logo.png" class="h-80 w-auto" alt="">
            </div>
            <div class="grid gap-4 place-content-center">
               <p class="text-lg">
                  {{ company.name }} adalah perusahaan yang bergerak di bidang jasa penyedia transportasi pariwisata dan layanan jasa perjalanan pariwisata. kami memberikan pelayanan jasa transportasi yang sesuai dengan kebutuhan anda.
               </p>
               <p class="text-lg">
                  Dengan tim yang berpengalaman dan performa layanan terbaik, kami siap melayani kebutuhan pariwisata anda dengan harga yang bersahabat.
               </p>
            </div>
         </div>
      </div>
   </div>

   <div class="bg-emerald-900">
      <div class="w-2/3 mx-auto py-20">
         <div class="grid grid-cols-2 gap-12">
            <div class="text-gray-200">
               <h2 class="font-serif font-bold text-2xl pb-2">
                  Visi
               </h2>
               <p class="text-lg">
                  Kami adalah penyedia layanan transportasi terdepan yang berkomitmen pada konektivitas global, nilai pelanggan, dan mobilitas berkelanjutan. Dengan fokus pada inovasi dan lingkungan, kami menghubungkan destinasi, mempermudah perjalanan, dan menciptakan pengalaman istimewa untuk pelanggan, sambil bersama-sama mencapai misi dunia yang lebih terhubung, berkelanjutan, dan maju.
               </p>
            </div>
            <div class="text-gray-200">
               <h2 class="font-serif font-bold text-2xl pb-2">
                  Misi
               </h2>
               <p class="text-lg">
                  Kami berkomitmen untuk memberikan layanan transportasi yang aman, andal, dan memuaskan. Keamanan adalah prioritas utama kami, dengan pemeliharaan berkala dan standar ketat di seluruh armada kami. Kami mendengarkan kebutuhan pelanggan dengan cermat dan selalu berupaya melebihi harapan mereka. Pelayanan pelanggan adalah inti dari semua yang kami lakukan, dan kami yakin bahwa dengan memberikan layanan yang handal dan memuaskan, kami memperkuat hubungan dengan pelanggan dan terus berkembang di dunia transportasi.
               </p>
            </div>
         </div>
      </div>
   </div>
</default-layout>
</template>

<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import DefaultLayout from '../layouts/default.vue'
import Hero from '../components/hero.vue'

const company = computed(() => usePage().props.company)
</script>