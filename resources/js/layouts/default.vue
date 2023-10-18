<template>
   <div class="min-h-[calc(100vh-160px-92px)]">
      <Header></Header>
      <slot/>

      <Footer></Footer>
   </div>
</template>

<script setup>
import Header from '../components/header.vue'
import Footer from '../components/footer.vue'
</script>