<template>
<Head title="Login - Admin"></Head>
<div class="flex justify-center items-center h-screen bg-gray-100">
   <div class="bg-white p-8 rounded-lg shadow-md w-1/3">
      <h2 class="text-2xl font-semibold mb-4">Login</h2>
      <form @submit.prevent="login">
         <div class="mb-4">
            <label for="email" class="block text-gray-600 text-sm"
               >Email</label
            >
            <input
               v-model="form.email"
               id="email"
               type="email"
               class="w-full mt-1 p-2 rounded border px-3"
               :class="[errors.email ? 'border-red-500' : '']"
            />
            <p v-if="errors.email" class="text-red-500 text-sm">{{ errors.email }}</p>
         </div>
         <div class="mb-4">
            <label for="password" class="block text-gray-600 text-sm"
               >Kata sandi</label
            >
            <input
               v-model="password"
               id="password"
               type="password"
               class="w-full mt-1 p-2 rounded border px-3"
               :class="[errors.password ? 'border-red-500' : '']"
            />
            <p v-if="errors.password" class="text-red-500 text-sm">{{ errors.password }}</p>
         </div>
         <button
            type="submit"
            class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition duration-300"
         >
            Log In
         </button>
      </form>
   </div>
</div>
</template>

<script setup>
import { Head, router, useForm } from "@inertiajs/vue3"
import { ref } from 'vue'

const form = useForm({
   email: '',
   password: ''
})
const password = ref('')

defineProps({
   errors: Object
})

const login = async () => {
   form.password = btoa(password.value)
   form.post('/admin/login-handle')
}

// const validate = async () => {
//    await new Promise(resolve => {
//       if (!form.data().email || form.data().email.length < 1) error.value.email = 'Email harus diisi'
//       if (form.data().email && !isEmailValid(form.data().email)) error.value.email = 'Email tidak valid'
//       if (!password.value || password.value.length < 1) error.value.password = 'Kata sandi harus diisi'
//       resolve()
//    })
// }

// const isEmailValid = (email) => {
//    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/
//    return emailRegex.test(email)
// }
</script>
