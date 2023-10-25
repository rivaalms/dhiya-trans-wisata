<template>
<Head title="Kontak"/>

<default-layout>
   <Hero
      height-class="h-[300px]"
      bg-class="bg-[url('/img/geometric.jpg')]"
      hide-overlay
   >
      <h1 class="font-serif uppercase tracking-wide font-semibold text-3xl md:text-5xl">
         Kontak
      </h1>
   </Hero>

   <div class="container mx-auto">
      <div class="py-40 grid grid-cols-1 gap-12">
         <div class="w-2/3 mx-auto">
            <p class="text-lg pb-2">
               Silakan melakukan reservasi dengan menghubungi kami melalui kontak yang kami sediakan.
            </p>
            <p class="text-lg pb-2">
               Anda juga bisa mengirimkan pertanyaan, keluhan, dan saran mengenai kualitas produk dan pelayanan kami. Kami menghargai pertanyaan, keluhan, dan saran Anda. Kepuasan Anda adalah prioritas kami, dan kami berkomitmen untuk menjadikan pengalaman Anda bersama kami selancar dan senyaman mungkin.
            </p>
         </div>
         <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="flex items-center justify-center lg:justify-end">
               <img src="/img/contact.png" class="h-96 w-auto pe-20" alt="">
            </div>
            <div class="lg:col-start-2 grid gap-4 place-content-center lg:place-content-start text-lg">
               <div class="">
                  <p class="text-gray-500 font-semibold">Alamat</p>
                  <p class="">{{ company.address }}</p>
               </div>
               <div class="">
                  <p class="text-gray-500 font-semibold">Email</p>
                  <p class="">{{ company.email }}</p>
               </div>
               <div class="">
                  <p class="text-gray-500 font-semibold">Telepon</p>
                  <p class="">{{ company.phone }}</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</default-layout>
</template>

<script setup>
import { Head, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import Hero from '@/components/hero.vue'
import DefaultLayout from '@/layouts/default.vue'

const company = computed(() => usePage().props.company)
</script>