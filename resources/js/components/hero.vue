<template>
<div
   class="backdrop-brightness-50 bg-center bg-no-repeat bg-cover relative"
   :class="[ heightClass, mdHeightClass, bgClass ]"
>
   <div class="absolute h-full w-full bg-black -z-30 opacity-[25%]" />
   <div
      class="container mx-auto h-full grid grid-cols-1 gap-4 place-items-center"
   >
      <div class="grid grid-cols-1 gap-4 place-items-center z-10">
         <slot />
      </div>
   </div>
</div>
</template>

<script setup>
const props = defineProps({
   heightClass: {
      type: String,
      required: false,
      default: 'h-[calc(100vh-92px)]'
   },
   mdHeightClass: {
      type: String,
      required: false,
      default: ''
   },
   bgClass: {
      type: String,
      required: true
   }
})
</script>