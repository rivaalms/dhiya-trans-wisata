<template>
<admin-layout title="Produk">
   <div class="flex justify-end mb-4">
      <button class="rounded py-2 px-4 bg-blue-500 text-white hover:bg-blue-600 transition-all duration-300" @click.stop="showModal('new')">
         Tambah Produk
      </button>
   </div>
   <div class="relative overflow-x-auto">
      <table class="w-full text-gray-600 text-left">
         <thead class="text-sm uppercase">
            <tr class="bg-gray-100">
               <th scope="col" class="px-6 py-3">Nama</th>
               <th scope="col" class="px-6 py-3">Kapasitas</th>
               <th scope="col" class="px-6 py-3">Harga Dalam Kota</th>
               <th scope="col" class="px-6 py-3">Aksi</th>
            </tr>
         </thead>
         <tbody>
            <tr v-for="item in data.data" class="border-b text-gray-900">
               <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ item.name }}</th>
               <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ item.capacity }} seat</th>
               <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ useFormatCurrency(item.price) }}</th>
               <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                  <div class="flex gap-4">
                     <button class="p-2 bg-amber-500 rounded text-sm text-white hover:bg-amber-600 transition-all duration-300" @click.stop="showModal(item.uuid, item)">
                        Sunting
                     </button>
                     <button class="p-2 bg-red-500 rounded text-sm text-white hover:bg-red-600 transition-all duration-300" @click.stop="deleteData(item.uuid)">
                        Hapus
                     </button>
                  </div>
               </th>
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
</admin-layout>

<product-form-modal
   :show="modal.show"
   :id="modal.id"
   :data="modal.data"
   :callback="fetchData"
   :errors="props.errors"
   @close="clearModal"
></product-form-modal>
</template>

<script setup>
import AdminLayout from '@/layouts/admin.vue'
import ProductFormModal from '@/components/modal/product-form.vue'
import { ref } from 'vue'
import { TailwindPagination } from 'laravel-vue-pagination'
import { useFormatCurrency } from '@/helpers'
import { router } from '@inertiajs/vue3'

const props = defineProps({
   errors: Object
})

const data = ref([])
const modal = ref({
   show: false,
   id: ''
})

const showModal = (id, data) => {
   modal.value = {
      id,
      show: true,
      data
   }
}

const clearModal = () => {
   modal.value.show = false

   setTimeout(() => {
      modal.value = {
         show: false,
         id: '',
         data: null
      }
   }, 200)
}

const deleteData = async (uuid) => {
   const confirm = window.confirm('Anda yakin ingin menghapus data?')
   if (confirm) {
      await new Promise(resolve => {
         router.delete(`/api/admin/products/${uuid}`, {
            onSuccess: () => {
               fetchData()
            }
         })
         resolve()
      })
   }
}

const fetchData = async (page = 1) => {
   const url = 'http://dhiya-trans-wisata.test/api/admin/products'
   const response = await fetch(`${url}?page=${page}`, {
      method: 'GET'
   })
   data.value = await response.json()
}

fetchData()
</script>