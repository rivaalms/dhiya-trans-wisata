<template>
   <footer class="bg-amber-500">
      <div class="w-1/2 mx-auto">
         <div class="flex justify-between gap-4 py-12 text-gray-50">
            <div class="grid gap-2 place-content-start">
               <p class="font-serif text-xl font-semibold uppercase">
                  Our Company
               </p>
               <ul class="list-disc ms-4">
                  <li>
                     <Link href="/products" class="text-lg hover:underline hover:underline-offset-2">
                        Produk
                     </Link>
                  </li>
                  <li>
                     <Link href="/about" class="text-lg hover:underline hover:underline-offset-2">
                        Tentang
                     </Link>
                  </li>
                  <li>
                     <Link href="/contacts" class="text-lg hover:underline hover:underline-offset-2">
                        Kontak
                     </Link>
                  </li>
               </ul>
            </div>
            <div class="grid gap-4">
               <div>
                  <p class="font-serif text-xl font-semibold">Alamat</p>
                  <p class="font-medium">{{ company.address }}</p>
               </div>
               <div>
                  <p class="font-serif text-xl font-semibold">Email</p>
                  <p class="font-medium">{{ company.email }}</p>
               </div>
               <div>
                  <p class="font-serif text-xl font-semibold">Telepon</p>
                  <p class="font-medium">{{ company.phone }}</p>
               </div>
            </div>
         </div>
      </div>
      <div class="bg-white py-2">
         <div class="container mx-auto">
            <div class="flex justify-between">
               <p class="text-gray-500 text-sm">
                  &copy; 2023 {{ company.name }}
               </p>

               <div class="flex gap-4">
                  <p class="text-gray-500 text-sm">
                     Kebijakan Privasi
                  </p>
                  <p class="text-gray-500 text-sm">
                     Syarat dan Ketentuan
                  </p>
               </div>
            </div>
         </div>
      </div>
   </footer>
</template>

<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'

const company = computed(() => usePage().props.company)
</script>