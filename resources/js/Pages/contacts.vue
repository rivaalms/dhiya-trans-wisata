<template>
<Head title="Kontak"/>

<default-layout>
   <Hero
      height-class="h-[calc((100vh-92px)*33%)]"
      md-height-class="h-[650px]"
      bg-class="bg-[url('/img/pangalengan-2.jpg')]"
   >
      <p class="uppercase text-gray-200 tracking-wide font-semibold text-3xl md:text-6xl">
         Kontak
      </p>
   </Hero>

   <div class="container mx-auto">
      <div class="py-40 grid grid-cols-2">
         <div class="col-start-2 grid gap-4">
            <div class="">
               <p class="text-gray-500 text-lg font-bold">Alamat</p>
               <p class="text-xl tracking-wide">{{ company.address }}</p>
            </div>
            <div class="">
               <p class="text-gray-500 text-lg font-bold">Email</p>
               <p class="text-xl tracking-wide">{{ company.email }}</p>
            </div>
            <div class="">
               <p class="text-gray-500 text-lg font-bold">Telepon</p>
               <p class="text-xl tracking-wide">{{ company.phone }}</p>
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