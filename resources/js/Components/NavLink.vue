<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() => {
    return "text-3xl py-6 px-14" + (props.active ? " bg-blue-200" : "");
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
