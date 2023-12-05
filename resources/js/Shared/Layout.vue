<script setup>
    import Nav from '@/Shared/Nav.vue';
    import { computed } from 'vue';
    import { usePage } from '@inertiajs/inertia-vue3'
    const loggedIn = computed(() => {
        return usePage().props.value.auth.loggedIn;
    });
    const username = computed(() => {
        return usePage().props.value.auth.user.email;
    });

</script>
<template>
    <Head>
        <title>My App</title>
        <meta type="description" content="My App Details" head-key="description">
    </Head>
    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="font-bold text-lg">
                    My App 
                </h1>
                <p class="text-sm ml-4" v-if="loggedIn">
                    Welcome Back, {{ username }}
                </p>
            </div>
            <Nav />
        </header>
        
    </section>
    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <slot />    
        </div>
    </section>
</template>