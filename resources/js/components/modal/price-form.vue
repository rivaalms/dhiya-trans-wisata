<template>
<div>
   <modal
      :show="show"
      @close="close"
   >
      <template #title>{{ props.id === 'new' ? 'Tambah Harga' : 'Sunting Harga' }}</template>

      <div class="grid grid-cols-2 gap-4">
         <div>
            <label for="vehicle_uuid" class="block text-gray-600 text-sm">
               Produk
            </label>
            <select
               v-model="form.vehicle_uuid"
               id="vehicle_uuid"
               name="vehicle_uuid"
               placeholder="Pilih produk..."
               class="w-full mt-1 p-2 rounded border px-3 bg-white"
               :class="[props.errors && props.errors.vehicle_uuid ? 'border-red-500' : '']"
            >
               <option disabled value="">Pilih produk...</option>
               <option v-for="item in vehicles" :value="item.uuid">
                  {{ item.name }}
               </option>
            </select>
            <p v-if="props.errors && props.errors.vehicle_uuid" class="text-red-500 text-sm">
               {{ props.errors.vehicle_uuid }}
            </p>
         </div>
         <div>
            <label for="vehicle_uuid" class="block text-gray-600 text-sm">
               Destinasi
            </label>
            <select
               v-model="form.destination_uuid"
               id="destination_uuid"
               name="destination_uuid"
               placeholder="Pilih destinasi..."
               class="w-full mt-1 p-2 rounded border px-3 bg-white"
               :class="[props.errors && props.errors.destination_uuid ? 'border-red-500' : '']"
            >
               <option disabled value="">Pilih destinasi...</option>
               <option v-for="item in destinations" :value="item.uuid">
                  {{ item.name }}
               </option>
            </select>
            <p v-if="props.errors && props.errors.destination_uuid" class="text-red-500 text-sm">
               {{ props.errors.destination_uuid }}
            </p>
         </div>
         <div>
            <label for="duration" class="block text-gray-600 text-sm">
               Durasi
            </label>
            <input
               v-model="form.duration"
               id="duration"
               name="duration"
               type="text"
               class="w-full mt-1 p-2 rounded border px-3"
               :class="[props.errors && props.errors.duration ? 'border-red-500' : '']"
               @keypress="useValidateNumber"
            />
            <p v-if="props.errors && props.errors.duration" class="text-red-500 text-sm">
               {{ props.errors.duration }}
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
   </modal>
</div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { onUpdated, onMounted, ref } from 'vue'
import Modal from '@/components/modal/modal.vue'
import { useFormatCurrency, useValidateNumber }from '@/helpers'

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
   vehicle_uuid: '',
   destination_uuid: '',
   duration: '',
   price: '',
})

const vehicles = ref([])
const destinations = ref([])

onUpdated(() => {
   if (props.data) {
      form.vehicle_uuid = props.data.vehicle_uuid
      form.destination_uuid = props.data.destination_uuid
      form.duration = props.data.duration
      form.price = props.data.price
   } else {
      form.reset()
   }
})

const submit = async () => {
   if (props.id === 'new') {
      await new Promise (resolve => {
         form.post(`/api/admin/prices`, {
            onSuccess: () => {
               close()
               props.callback()
            }
         })
         resolve()
      })
   } else {
      await new Promise (resolve => {
         form.put(`/api/admin/prices/${props.id}`, {
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

if (vehicles.value.length < 1) {
   fetch(`/api/admin/options/product`, {
      method: 'GET'
   }).then(async (resp) => {
      vehicles.value = await resp.json()
   })
}

if (destinations.value.length < 1) {
   fetch(`/api/admin/options/destination`, {
      method: 'GET'
   }).then(async (resp) => {
      destinations.value = await resp.json()
   })
}
</script>