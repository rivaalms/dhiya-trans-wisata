<template>
<Head :title="product.name"></Head>

<default-layout>
   <Hero
      height-class="h-[calc((100vh-72px)*0.35)]"
      md-height-class="h-[650px]"
      bg-class="bg-gray-50"
      hide-overlay
   >
      <p class="font-serif uppercase text-gray-800 tracking-wide font-semibold text-3xl md:text-5xl">
         {{ product.name }}
      </p>
   </Hero>

   <div class="container mx-auto">
      <div class="grid grid-cols-1 gap-12 py-40">
         <div class="w-2/3 mx-auto text-lg">
            <p class="mb-4">
               Sewa <b>{{ product?.name }}</b> Bandung dengan harga yang terjangkau didukung dengan fasilitas yang bagus. {{ company.name }} merupakan perusahaan penyedia jasa transportasi di Bandung.
            </p>
            <p class="mb-4">
               Didukung dengan armada dengan kondisi yang selalu prima dan pelayanan crew yang selalu ramah dalam melayani serta memiliki fasilitas yang sudah memiliki standar pariwisata, kami siap melayani anda yang akan berwisata di dalam Kota Bandung maupun keluar kota.
            </p>
            <p class="mb-4">
               Penggunaan <b>{{ product?.name }}</b> Bandung untuk di dalam Kota Bandung maksimal penggunaan adalah 12 jam, dan untuk keluar Kota Bandung maksimal penggunaan adalah 18 jam (pada hari yang sama).
            </p>
            <p class="mb-4">
               Jam sewa <b>{{ product?.name }}</b> minimal penggunaan pukul 03.00 dan maksimal kembali pukul 23.00. Jika penggunaan sewa kurang dari jam yang ditentukan (cth: 5 jam), maka akan tetap dihitung sebagai 1 hari.
            </p>
         </div>

         <div class="w-2/3 mx-auto relative overflow-hidden">
            <div class="relative overflow-auto">
               <div class="relative w-full flex gap-6 p-8 snap-x snap-mandatory overflow-x-auto">
                  <template v-for="image in product.images">
                     <div class="snap-center h-48 w-64 shrink-0">
                        <img class="shrink-0 h-full w-full object-cover rounded-lg shadow hover:shadow-md bg-white transition-all" :src="image.path">
                     </div>
                  </template>
               </div>
            </div>
         </div>

         <div class="w-2/3 mx-auto">
            <h2 class="font-serif font-bold text-2xl pb-6 text-center">
               Detail Produk
            </h2>
            <div class="relative overflow-x-auto">
               <table class="w-full text-gray-600 text-left">
                  <tbody>
                     <tr class="border-b">
                        <td scope="row" class="px-6 py-4 font-semibold whitespace-nowrap">Nama Produk</td>
                        <td class="px-6 py-4 text-gray-900">{{ product.name }}</td>
                     </tr>
                     <tr class="border-b">
                        <td scope="row" class="px-6 py-4 font-semibold whitespace-nowrap">Kapasitas</td>
                        <td class="px-6 py-4 text-gray-900">{{ product.capacity }} seats</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>

         <div class="w-2/3 mx-auto">
            <h2 class="font-serif font-bold text-2xl pb-6 text-center">
               Price List
            </h2>
            <div class="relative overflow-x-auto mb-12">
               <table class="w-full text-gray-600 text-left">
                  <thead class="text-sm uppercase">
                     <tr class="bg-gray-100">
                        <th scope="col" class="px-6 py-3">Tujuan</th>
                        <th scope="col" class="px-6 py-3">Jumlah hari</th>
                        <th scope="col" class="px-6 py-3">Harga</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr class="border-b text-gray-900">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">Bandung (dalam kota)</th>
                        <td class="px-6 py-4">1 hari</td>
                        <td class="px-6 py-4">{{ useFormatCurrency(product.price) }}</td>
                     </tr>

                     <tr v-for="item in product?.price_by_destination" :key="item.destination" class="border-b text-gray-900">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ item.destination }}</th>
                        <td class="px-6 py-4">{{ item.days }} hari</td>
                        <td class="px-6 py-4">{{ useFormatCurrency(item.price) }}</td>
                     </tr>
                  </tbody>
               </table>
            </div>

            <div class="">
               <p class="font-serif font-bold text-2xl pb-6 text-center">
                  Catatan
               </p>
               <ul class="list-disc ps-8 text-lg">
                  <li class="mb-2">
                     <span class="font-semibold">Harga termasuk:</span> BBM, jasa driver.
                  </li>
                  <li class="mb-2">
                     <span class="font-semibold">Harga tidak termasuk:</span> biaya tol, biaya parkir, tip dan konsumsi driver, tiket masuk lokasi wisata, biaya penyeberangan.
                  </li>
                  <li class="mb-2">
                     Untuk penggunaan ke luar kota yang lebih dari 3 hari pengunaan, pengemudi yang bertugas adalah 2 orang demi keselamatan dan kenyamanan Anda dan rombongan.
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</default-layout>
</template>

<script setup>
import Hero from '@/components/hero.vue'
import DefaultLayout from '@/layouts/default.vue'
import { computed } from 'vue'
import { Head, usePage } from '@inertiajs/vue3'
import { useFormatCurrency } from '@/helpers'
const props = defineProps({
   product: Array
})

const company = computed(() => usePage().props.company)
</script>