<template>
<admin-layout :title="product?.name || 'Produk'">
   <div class="flex justify-between mb-4">
      <Link
         href="/admin/products"
         class="py-2 px-2 rounded hover:bg-gray-50 hover:shadow-md hover:shadow-gray-200 transition-all duration-300"
      >
         Kembali
      </Link>
      <button class="rounded py-2 px-4 bg-blue-500 text-white hover:bg-blue-600 transition-all duration-300" @click.stop="showModal('new')">
         Tambah Gambar
      </button>
   </div>
   <div v-if="product?.images && product?.images.length > 0" class="grid grid-cols-4 gap-4 place-items-start">
      <template v-for="image in product.images">
         <div class="relative">
            <img :src="image.path" alt="" class="rounded-lg show hover:shadow-lg bg-white transition-all">

            <div class="absolute inset-x-0 top-0 flex justify-end gap-1 p-2">
               <button class="bg-amber-500/70 px-3 py-1 text-xs text-white font-semibold rounded hover:bg-amber-500 hover:shadow hover:shadow-amber-300 transition-all duration-300" @click.stop="showModal(image.uuid, true)">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-4 h-4">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
               </button>
               <button class="bg-red-500/70 px-3 py-1 text-xs text-white font-semibold rounded hover:bg-red-500 hover:shadow hover:shadow-red-300 transition-all duration-300" @click.stop="deleteData(image.uuid)">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-4 h-4">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>
               </button>
            </div>

            <div class="absolute top-2 left-2">
               <span v-if="image.is_cover" class="bg-blue-500/70 px-3 py-1 text-xs text-white font-semibold rounded hover:bg-blue-500 hover:shadow-md hover:shadow-blue-400 transition-all duration-300">
                  Cover
               </span>
            </div>
         </div>
      </template>
   </div>
   <div v-else class="grid grid-cols-1 place-items-center">
      Tidak ada gambar
   </div>
</admin-layout>

<image-form-modal
   :show="modal.show"
   :id="modal.id"
   :slug="props.slug"
   :is-edit="modal.isEdit"
   :callback="fetchData"
   :errors="props.errors"
   @close="clearModal"
></image-form-modal>
</template>

<script setup>
import AdminLayout from '@/layouts/admin.vue'
import imageFormModal from '@/components/modal/image-form.vue'
import { ref } from 'vue'
import { router, Link } from '@inertiajs/vue3'

const props = defineProps({
   slug: String,
   errors: Object
})

const product = ref(null)

const modal = ref({
   show: false,
   id: '',
   slug: props.slug,
   isEdit: false
})

const showModal = (id, isEdit = false) => {
   modal.value = {
      id,
      show: true,
      isEdit,
   }
}

const clearModal = () => {
   modal.value.show = false

   setTimeout(() => {
      modal.value = {
         show: false,
         id: '',
      }
   }, 200)
}

const deleteData = async (uuid) => {
   const confirm = window.confirm('Anda yakin ingin menghapus data?')
   if (confirm) {
      await new Promise (resolve => {
         router.delete(`/api/admin/product-image/${uuid}`, {
            onSuccess: () => {
               fetchData()
            }
         })
         resolve()
      })
   }
}

const fetchData = async () => {
   const url = `/api/admin/product/${props.slug}`
   const response = await fetch(`${url}`, {
      method: 'GET'
   })
   product.value = await response.json()
}

fetchData()
</script>