<template>
<div>
   <modal
      :show="show"
      @close="close"
   >
      <template #title>{{ props.id === 'new' ? 'Tambah Gambar' : 'Sunting Gambar' }}</template>

      <div class="grid grid-cols-1 gap-4">
         <div>
            <label for="image" class="block text-gray-600 text-sm">
               Gambar
            </label>
            <input
               type="file"
               accept="image/*"
               class="w-full mt-1 p-2 rounded border px-2 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 file:hover:bg-blue-100"
               @change="(evt) => form.image = evt.target.files[0]"
            />
            <p
               v-if="props.errors && props.errors.image"
               class="text-red text-sm"
            >
               {{ props.errors.image }}
            </p>
         </div>
         <div class="flex gap-2 items-center">
            <input
               v-model="form.is_cover"
               type="checkbox"
            />
            <label for="is_cover" class="block">
               Jadikan cover?
            </label>
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
            class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 hover:shadow-lg hover:shadow-blue-300 transition-all duration-300 disabled:bg-blue-400 disabled:hover:shadow-none"
            :disabled="!isEdit && !form.image"
            @click.stop="submit"
         >
            Submit
         </button>
      </div>
   </modal>
</div>
</template>

<script setup>
import Modal from '@/components/modal/modal.vue'
import { useForm, router } from '@inertiajs/vue3'
import { watch } from 'vue'

const props = defineProps({
   show: {
      type: Boolean,
      required: true
   },
   id: {
      type: String,
      required: false,
   },
   slug: {
      type: String,
      required: true
   },
   isEdit: {
      type: Boolean,
      required: true,
   },
   data: {
      required: false
   },
   callback: {
      type: Function,
      required: false,
      default: () => {}
   },
   errors: Object
})

const emit = defineEmits(['close'])

const form = useForm({
   slug: '',
   uuid: '',
   image: null,
   is_cover: false
})

watch(() => props.id, () => {
   form.slug = props.slug
   form.uuid = props.id
})

const submit = async () => {
   if (props.id === 'new') {
      await new Promise (resolve => {
         form.post('/api/admin/product-image', {
            onSuccess: () => {
               close()
               props.callback()
            }
         })
         resolve()
      })
   } else {
      await new Promise (resolve => {
         router.post('/api/admin/product-image', {
            _method: 'PUT',
            ...form,
         })
         resolve()
      })
      .then(() => {
         close()
         setTimeout(() => {
            props.callback()
         }, 100)
      })
   }
}

const close = () => {
   emit('close')
}
</script>