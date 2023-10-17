<template>
   <div class="min-h-[calc(100vh-160px-92px)]">
      <slot/>

      <Footer></Footer>
   </div>
</template>

<script setup>
import Footer from '../components/footer.vue'
</script>