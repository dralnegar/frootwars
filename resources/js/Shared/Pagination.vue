<script setup>
defineProps({
    links: Array
});
</script>
<template>
    <div>
        <Component :is="link.url ? 'NavLink' : 'span'" v-for="link in links" :href="link.url" :active="link.active" v-html="link.label" :key="link.page"
            class="px-3" :class="{ 'text-gray-500': !link.url, 'font-bold': link.active }" />
    </div>
</template>