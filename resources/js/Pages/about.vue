<template>
<Head title="Tentang"/>
<default-layout>
   <Hero
      height-class="h-[calc((100vh-72px)*0.5)]"
      md-height-class="h-[650px]"
      bg-class="bg-[url('/img/bus-bg.jpg')]"
   >
      <h1 class="font-serif uppercase text-gray-200 tracking-wide font-semibold text-3xl md:text-5xl">
         Tentang
      </h1>
   </Hero>

   <div class="container mx-auto">
      <div class="grid grid-cols-1 gap-12 py-40">
         <div class="w-1/2 mx-auto grid gap-4">
            <h2 class="font-serif font-bold text-2xl pb-2 text-center">
               Tentang Kami
            </h2>
            <p class="text-lg">
               {{ company.name }} adalah perusahaan yang bergerak di bidang jasa penyedia transportasi pariwisata dan layanan jasa peralanan pariwisata. kami memberikan pelayanan jasa transportasi yang sesuai dengan kebutuhan anda.
            </p>
            <p class="text-lg">
               Dengan tim yang berpengalaman dan performa layanan terbaik, kami siap melayani kebutuhan pariwisata anda dengan harga yang bersahabat.
            </p>
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
                  Menjadi penyedia layanan transportasi terkemuka yang memungkinkan konektivitas global, memberikan nilai tambah bagi pelanggan, dan berkomitmen pada mobilitas yang berkelanjutan.
               </p>
            </div>
            <div class="text-gray-200">
               <h2 class="font-serif font-bold text-2xl pb-2">
                  Misi
               </h2>
               <p class="text-lg">
                  Memberikan layanan transportasi yang aman dan andal dengan komitmen mutlak pada kepuasan pelanggan.
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