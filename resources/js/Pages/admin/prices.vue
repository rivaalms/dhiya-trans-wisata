<template>
<admin-layout title="Harga">
   <div class="flex justify-end mb-4">
      <button class="rounded py-2 px-4 bg-blue-500 text-white hover:bg-blue-600 transition-all duration-300" @click.stop="showModal('new')">
         Tambah Harga
      </button>
   </div>

   <div class="container mx-auto my-12">
      <div class="relative overflow-x-auto">
         <table class="w-full text-gray-600 text-left">
            <thead class="text-sm uppercase">
               <tr class="bg-gray-100">
                  <th scope="col" class="px-6 py-3">Produk</th>
                  <th scope="col" class="px-6 py-3">Tujuan</th>
                  <th scope="col" class="px-6 py-3">Durasi</th>
                  <th scope="col" class="px-6 py-3">Harga</th>
                  <th scope="col" class="px-6 py-3">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <tr v-for="item in data" class="border-b text-gray-900">
                  <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ item.vehicle }}</th>
                  <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ item.destination }}</th>
                  <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ item.duration }}</th>
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
            :data="laravelData"
            @pagination-change-page="fetchData"
         ></tailwind-pagination>
      </div>
   </div>
</admin-layout>

<price-form-modal
   :show="modal.show"
   :id="modal.id"
   :data="modal.data"
   :callback="fetchData"
   :errors="props.errors"
   @close="clearModal"
></price-form-modal>
</template>

<script setup>
import AdminLayout from '@/layouts/admin.vue'
import { ref } from 'vue'
import PriceFormModal from '@/components/modal/price-form.vue'
import { TailwindPagination } from 'laravel-vue-pagination'
import { useFormatCurrency } from '@/helpers'
import { router } from '@inertiajs/vue3'

const props = defineProps({
   errors: Object
})

const data = ref([])
const laravelData = ref([])
const modal = ref({
   show: false,
   id: '',
   data: null
})

const showModal = (id, data) => {
   console.info('tambah')
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
      await new Promise (resolve => {
         router.delete(`/api/admin/prices/${uuid}`, {
            onSuccess: () => {
               fetchData()
            }
         })
         resolve()
      })
   }
}

const fetchData = async (page = 1) => {
   const url = `/api/admin/prices`
   const response = await fetch(`${url}?page=${page}`, {
      method: 'GET'
   }).then(async (resp) => await resp.json())

   data.value = response.data
   laravelData.value = response.laravelData
}

fetchData()
</script>