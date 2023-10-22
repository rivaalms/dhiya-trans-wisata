<template>
<admin-layout>
   <div class="container mx-auto my-12">
      <div class="relative overflow-x-auto">
         <table class="w-full text-gray-600 text-left">
            <thead class="text-sm uppercase">
               <tr class="bg-gray-100">
                  <th scope="col" class="px-6 py-3">Nama</th>
                  <th scope="col" class="px-6 py-3">Slug</th>
                  <th scope="col" class="px-6 py-3">Kapasitas</th>
                  <th scope="col" class="px-6 py-3">Harga Dalam Kota</th>
               </tr>
            </thead>
            <tbody>
               <tr v-for="item in data.data" class="border-b text-gray-900">
                  <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ item.name }}</th>
                  <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ item.slug }}</th>
                  <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ item.capacity }} seat</th>
                  <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ useFormatCurrency(item.price) }}</th>
               </tr>
            </tbody>
         </table>
      </div>

      <div class="flex justify-center my-8">
         <tailwind-pagination
            :data="data"
            @pagination-change-page="fetchData"
         ></tailwind-pagination>
      </div>
   </div>
</admin-layout>
</template>

<script setup>
import AdminLayout from '@/layouts/admin.vue'
import { ref } from 'vue'
import { TailwindPagination } from 'laravel-vue-pagination'
import { useFormatCurrency } from '@/helpers'

const data = ref([])

const fetchData = async (page = 1) => {
   const url = 'http://dhiya-trans-wisata.test/api/admin/products'
   const response = await fetch(`${url}?page=${page}`)
   data.value = await response.json()
}

fetchData()
</script>