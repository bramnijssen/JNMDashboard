<script setup>
const props = defineProps({
    icon: String,
    iconColor: String,
    title: String,
});
</script>

<template>
    <div class="flex gap-4">
        <div :class="'min-w-24 text-5xl text-center ' + iconColor">
            <i :class="'fa-solid fa-' + icon"></i>
        </div>
        <div>
            <h2 class="text-3xl font-bold">{{ title }}</h2>
            <slot />
        </div>
    </div>
</template>
