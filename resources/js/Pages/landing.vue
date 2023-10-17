<template>
<default-layout>
   <Head title="Landing"/>
   <Header></Header>
   <Hero
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
</default-layout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3'
import Header from '../components/header.vue'
import Hero from '../components/hero.vue'
import DefaultLayout from '../layouts/default.vue'
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const company = computed(() => usePage().props.company)
</script>
