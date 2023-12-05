<script setup> 
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

let form = useForm({
    email: '',
    password: ''
});

let submit = () => {
    form.post('/login');
};
</script>
<script>
export default {
    layout: null
};
</script>

<template>
    
    <Head title="Login" />


    <main class="grid place-items-center m-h-screen">
        <section class="bg-white p-6 rounded-md max-w-md mx-auto mt-8 border">
            <h1 class="text-3xl mb-6">Login</h1>
            <form @submit.prevent="submit">
               
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                        Email
                    </label>
                    <input v-model="form.email" class="border p-2 w-full rounded-md" type="email" name="email" id="email"
                        required />
                    <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                        Password
                    </label>
                    <input v-model="form.password" class="border p-2 w-full rounded-md" type="password" name="password"
                        id="password"/>
                    <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-gray-200 text-white rounded py-2 px-4 hover:bg-gray-700" :disabled="form.processing">
                        Login
                    </button>
                </div>

            </form>
        </section>
    </main>
    
</template>