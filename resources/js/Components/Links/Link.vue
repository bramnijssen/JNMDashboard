<script setup>
import { computed, onMounted, ref } from "vue";

const props = defineProps({
    hex: String,
    url: String,
    title: String,
});

const style = computed(() => `background-color: ${props.hex}`);
</script>

<template>
    <a
        class="min-h-12 px-6 py-3 text-2xl text-white rounded-tl-xl rounded-br-xl flex gap-2 items-center"
        :style="style"
        :href="url"
        target="_blank"
    >
        <span class="flex-1">{{ title }}</span>
        <i class="fa-solid fa-up-right-from-square"></i>
    </a>
</template>
