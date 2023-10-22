<template>
<div>
   <modal
      :show="show"
      @close="close"
   >
      <template #title>{{ props.id === 'new' ? 'Tambah Produk' : 'Sunting Produk' }}</template>

      <!-- <form @submit.prevent="submit"> -->
         <div class="grid grid-cols-2 gap-4">
            <div>
               <label for="name" class="block text-gray-600 text-sm">
                  Nama Produk
               </label>
               <input
                  v-model="form.name"
                  id="name"
                  name="name"
                  type="text"
                  class="w-full mt-1 p-2 rounded border px-3"
                  :class="[props.errors && props.errors.name ? 'border-red-500' : '']"
                  @input="() => { form.slug = useGenerateSlug(form.name) }"
               />
               <p v-if="props.errors && props.errors.name" class="text-red-500 text-sm">
                  {{ props.errors.name }}
               </p>
            </div>
            <div>
               <label for="slug" class="block text-gray-600 text-sm">
                  Slug
               </label>
               <input
                  v-model="form.slug"
                  id="slug"
                  name="name"
                  type="text"
                  readonly
                  class="w-full mt-1 p-2 rounded border px-3"
                  :class="[props.errors && props.errors.slug ? 'border-red-500' : '']"
               />
               <p v-if="props.errors && props.errors.slug" class="text-red-500 text-sm">
                  {{ props.errors.slug }}
               </p>
            </div>
            <div>
               <label for="capacity" class="block text-gray-600 text-sm">
                  Kapasitas
               </label>
               <input
                  v-model="form.capacity"
                  id="capacity"
                  name="capacity"
                  type="text"
                  class="w-full mt-1 p-2 rounded border px-3"
                  :class="[props.errors && props.errors.capacity ? 'border-red-500' : '']"
                  @keypress="useValidateNumber"
               />
               <p v-if="props.errors && props.errors.capacity" class="text-red-500 text-sm">
                  {{ props.errors.capacity }}
               </p>
            </div>
            <div>
               <label for="price" class="block text-gray-600 text-sm">
                  Harga
               </label>
               <input
                  v-model="form.price"
                  id="price"
                  name="price"
                  type="text"
                  class="w-full mt-1 p-2 rounded border px-3"
                  :class="[props.errors && props.errors.price ? 'border-red-500' : '']"
                  @keypress="useValidateNumber"
               />
               <p v-if="props.errors && props.errors.price" class="text-red-500 text-sm">
                  {{ props.errors.price }}
               </p>
            </div>
         </div>
         <div class="mt-4 flex justify-end gap-2">
            <button
               class="px-4 py-2 rounded hover:bg-gray-100 hover:shadow-lg hover:shadow-gray-300 transition-all duration-300"
               @click.stop="close"
            >
               Batal
            </button>
            <button
               class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 hover:shadow-lg hover:shadow-blue-300 transition-all duration-300"
               @click.stop="submit"
            >
               Submit
            </button>
         </div>
      <!-- </form> -->
   </modal>
</div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { onUpdated } from 'vue'
import Modal from '@/components/modal/modal.vue'
import { useGenerateSlug, useValidateNumber } from '@/helpers'

const props = defineProps({
   show: {
      type: Boolean,
      required: true
   },
   id: {
      type: String,
      required: true
   },
   data: {
      required: false
   },
   callback: {
      required: false
   },
   errors: Object
})

const emit = defineEmits(['close'])

const form = useForm({
   name: '',
   slug: '',
   capacity: '',
   price: '',
})

onUpdated(() => {
   if (props.data) {
      form.name = props.data.name
      form.slug = props.data.slug
      form.capacity = props.data.capacity
      form.price = props.data.price
   } else {
      form.reset()
   }
})

const submit = async () => {
   if (props.id === 'new') {
      await new Promise(resolve => {
         form.post('/api/admin/products', {
            onSuccess: () => {
               close()
               props.callback()
            },
         })
         resolve()
      })
   } else {
      await new Promise(resolve => {
         form.put(`/api/admin/products/${props.id}`, {
            onSuccess: () => {
               close()
               props.callback()
            }
         })
         resolve()
      })
   }
}

const close = () => {
   emit('close')
}
</script>