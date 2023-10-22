<template>
<Header></Header>

<div class="container mx-auto">
   <div class="py-12">
      <h2 class="text-2xl font-bold">
         {{ title }}
      </h2>
   </div>
   <slot/>
</div>
</template>

<script setup>
import Header from '@/components/admin/header.vue'

const props = defineProps({
   title: {
      type: String,
      required: false,
      default: 'Title'
   }
})
</script>