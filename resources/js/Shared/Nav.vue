<script setup>
    import NavLink from '@/Components/NavLink.vue';
    import { computed } from 'vue';
    import { usePage } from '@inertiajs/inertia-vue3'
    const loggedIn = computed(() => { 
        return usePage().props.value.auth.loggedIn;
    });
</script>
<template>
    <nav>
        <ul class="flex list-disc spece-x-4 list-inside" style="list-style: none;">
            <li><NavLink :active="$page.url === '/'">Home</NavLink></li>
            <li><NavLink :href="route('users')" :active="route().current('users')">Users</NavLink></li>
            <li><NavLink :href="route('settings')" :active="route().current('settings')">Settings</NavLink></li>
            <li v-if="loggedIn"><NavLink :href="route('logout')" method='post' as="button">Logout</NavLink></li>
            <li v-else><NavLink :href="route('login')">Login</NavLink></li>

        </ul>
    </nav>
</template>