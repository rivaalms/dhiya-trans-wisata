<template>
<div>
   <modal
      :show="show"
      @close="close"
   >
      <template #title>{{ props.id === 'new' ? 'Tambah Destinasi' : 'Sunting Destinasi' }}</template>

      <div class="grid grid-cols-2 gap-4">
         <div>
            <label for="name" class="block text-gray-600 text-sm">
               Destinasi
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
            <p
               v-if="props.errors && props.errors.name"
               class="text-red-500 text-sm"
            >
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
   </modal>
</div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { onUpdated } from 'vue'
import Modal from '@/components/modal/modal.vue'
import { useGenerateSlug } from '@/helpers'

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
      type: Function,
      required: false,
      default: () => {}
   },
   errors: Object
})

const emit = defineEmits(['close'])

const form = useForm({
   name: '',
   slug: '',
})

onUpdated(() => {
   if (props.data) {
      form.name = props.data.name
      form.slug = props.data.slug
   } else {
      form.reset()
   }
})

const submit = async () => {
   if (props.id === 'new') {
      await new Promise (resolve => {
         form.post('/api/admin/destinations', {
            onSuccess: () => {
               close()
               props.callback()
            }
         })
         resolve()
      })
   } else {
      await new Promise (resolve => {
         form.put(`/api/admin/destinations/${props.id}`, {
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