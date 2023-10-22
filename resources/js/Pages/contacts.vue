<template>
<Head title="Kontak"/>

<default-layout>
   <Hero
      height-class="h-[calc((100vh-72px)*0.5)]"
      md-height-class="h-[650px]"
      bg-class="bg-[url('/img/bus-bg.jpg')]"
   >
      <p class="font-serif uppercase text-gray-200 tracking-wide font-semibold text-3xl md:text-5xl">
         Kontak
      </p>
   </Hero>

   <div class="container mx-auto">
      <div class="py-40 grid grid-cols-1 gap-12">
         <h2 class="font-serif font-bold text-2xl pb-2 text-center">
            Kontak
         </h2>
         <div class="grid grid-cols-2">
            <div class="flex items-center justify-center">
               <img src="/img/contact.png" class="h-96 w-auto" alt="">
            </div>
            <div class="col-start-2 grid gap-4 place-content-start text-lg">
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
import { Head, Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import Hero from '../components/hero.vue'
import DefaultLayout from '../layouts/default.vue'

const company = computed(() => usePage().props.company)
</script>