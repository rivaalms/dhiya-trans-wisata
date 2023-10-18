 <template>
<Head title="Tentang"/>
<default-layout>
   <Hero
      height-class="h-[calc((100vh-92px)*33%)]"
      md-height-class="h-[650px]"
      bg-class="bg-[url('/img/pangalengan-2.jpg')]"
   >
      <p class="uppercase text-gray-200 tracking-wide font-semibold text-3xl md:text-6xl">
         Tentang Kami
      </p>
   </Hero>

   <div class="container mx-auto">
      <div class="grid grid-cols-1 gap-12 py-40">
         <div class="w-1/2 mx-auto grid gap-4">
            <p class="text-lg">
               {{ company.name }} adalah perusahaan yang bergerak di bidang jasa penyedia transportasi pariwisata dan layanan jasa peralanan pariwisata. kami memberikan pelayanan jasa transportasi yang sesuai dengan kebutuhan anda.
            </p>
            <p class="text-lg">
               Dengan tim yang berpengalaman dan performa layanan terbaik, kami siap melayani kebutuhan pariwisata anda dengan harga yang bersahabat.
            </p>
         </div>
      </div>
   </div>
</default-layout>
</template>

<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import DefaultLayout from '../layouts/default.vue'
import Hero from '../components/hero.vue'

const company = computed(() => usePage().props.company)
</script>