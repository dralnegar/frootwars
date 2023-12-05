<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/TextInput.vue';


let form = useForm({
    name: '',
    email: '',
    password: ''
});

let submit = () => {
    form.post('/users');
};

</script>

<template>

    <Head title="Create New User" />
    <h1 class="text-3xl">Create New User</h1>

    <form @submit.prevent="submit" class="max-w-xl mx-auto mt-8">
        <div class="mb-6">
            <InputLabel for="name" value="Name"></InputLabel>
            <TextInput id="name" name="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus
                autocomplete="name" :modelValue=name required />
            <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1"></div>
        </div>

        <div class="mb-6">
            <InputLabel for="email" value="Email"></InputLabel>
            <TextInput id="email" name="email" type="email" class="mt-1 block w-full" v-model="form.email"
                autocomplete="email" :modelValue=email required/>
            <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
        </div>

        <div class="mb-6">
            <InputLabel for="password" value="Password"></InputLabel>
            <TextInput id="password" name="password" type="password" class="mt-1 block w-full" v-model="form.password"
                autocomplete="password" :modelValue=passord required/>
                <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-gray-200 text-white rounded py-2 px-4 hover:bg-gray-700" :disabled="form.processing">
                Submit
            </button>
        </div>

    </form>
</template>



