<template>
   <Header></Header>
   <div class="min-h-[calc(100vh-160px-92px)]">
      <slot/>
   </div>
   <Footer></Footer>
</template>

<script setup>
import Header from '../components/header.vue'
import Footer from '../components/footer.vue'
</script>