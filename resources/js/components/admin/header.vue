<template>
<header>
   <div class="shadow">
      <div class="container mx-auto">
         <div class="flex justify-between items-center py-2">
            <div class="flex flex-col">
               <p class="text-lg">
                  {{ company.name }}
               </p>
               <p class="text-gray-500 text-sm">
                  Admin
               </p>
            </div>
            <div class="flex gap-4">
               <Link
                  href="/admin/products"
                  class="py-2 px-2 hover:text-blue-500 transition-all"
                  :class="$page.component === 'admin/products' ? activeClass : ''"
               >
                  Produk
               </Link>
               <Link
                  href="/admin/destinations"
                  class="py-2 px-2 hover:text-blue-500 transition-all"
                  :class="$page.component === 'admin/destinations' ? activeClass : ''"
               >
                  Destinasi
               </Link>
               <Link
                  href="/admin/prices"
                  class="py-2 px-2 hover:text-blue-500 transition-all"
                  :class="$page.component === 'admin/prices' ? activeClass : ''"
               >
                  Harga
               </Link>
               <button
                  class="py-2 px-2 text-red-500 font-medium rounded transition-all"
                  @click.stop="show = true"
               >
                  Log Out
               </button>
            </div>
         </div>
      </div>
   </div>
</header>
<modal
   :show="show"
   @close="show = false"
>
   <template #title>Log Out</template>
   <p class="text-center py-8">
      Anda yakin ingin keluar?
   </p>

   <div class="mt-4 flex justify-end gap-2">
      <button
         class="px-4 py-2 rounded hover:bg-gray-100 hover:shadow-lg hover:shadow-gray-300 transition-all duration-300"
         @click.stop="show = false"
      >
         Batal
      </button>
      <button
         class="px-4 py-2 rounded bg-red-500 text-white hover:bg-red-600 hover:shadow-lg hover:shadow-red-300 transition-all duration-300 disabled:bg-red-400 disabled:hover:shadow-none"
         @click.stop="logout()"
      >
         Log Out
      </button>
   </div>
</modal>
</template>

<script setup>
import { computed, ref } from 'vue'
import Modal from '../modal/modal.vue'
import { usePage, Link, router } from '@inertiajs/vue3'

const company = computed(() => usePage().props.company)
const activeClass = computed(() => [
   'text-blue-500',
   'font-medium'
])

const show = ref(false)

const logout = () => {
   router.post('/admin/logout', {
      onSuccess: () => show.value = false
   })
}
</script>