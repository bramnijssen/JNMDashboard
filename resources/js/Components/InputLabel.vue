<script setup>
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <label class="block mb-2 font-medium text-xl text-gray-700 uppercase">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
