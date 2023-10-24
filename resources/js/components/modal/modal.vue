<template>
<transition name="modal">
   <div
      class="fixed z-50 inset-0 bg-black bg-opacity-50 transition-opacity ease-in-out overflow-x-auto flex items-center justify-center"
      v-show="show"
   >
      <div class="modal-container w-1/2 mx-auto bg-white rounded shadow-md transition-all ease-in-out duration-300">
         <div class="p-4 border-b-2 flex justify-between items-center">
            <p class="font-semibold">
               <slot name="title">
                  Title
               </slot>
            </p>
            <button class="" @click.stop="close">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
               </svg>
            </button>
         </div>
         <div class="p-4">
            <slot/>
         </div>
      </div>
   </div>
</transition>
</template>

<script setup>
import { onBeforeMount } from 'vue'
const props = defineProps({
   show: {
      type: Boolean,
      required: true,
      default: false
   }
})

const emit = defineEmits(['close'])

onBeforeMount(() => {
   document.addEventListener("keydown", (e) => {
      if (props.show && e.key == 'Escape') {
            this.close()
      }
   })
})

const close = () => {
   emit('close')
}
</script>

<style scoped>
/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */
.modal-enter {
   opacity: 0;
}

.modal-leave-active {
   opacity: 0;
}

.modal-enter .modal-container, .modal-leave-active .modal-container {
   -webkit-transform: scale(1.1);
   transform: scale(1.1);
}
</style>