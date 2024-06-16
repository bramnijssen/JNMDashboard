<script setup>
import { onMounted, ref } from "vue";

const weekday = ref();
const time = ref();
const date = ref();

onMounted(() => {
    updateDateTime();
    setInterval(updateDateTime, 1000);
});

function updateDateTime() {
    const now = new Date();

    weekday.value = now
        .toLocaleDateString("nl-NL", {
            weekday: "long",
        })
        .toUpperCase();

    date.value = now
        .toLocaleDateString("nl-NL", {
            year: "numeric",
            month: "long",
            day: "numeric",
        })
        .toUpperCase();

    time.value = now.toLocaleTimeString("nl-NL", {
        hour: "numeric",
        minute: "numeric",
    });
}
</script>

<template>
    <div class="flex flex-col gap-2 text-3xl text-center">
        <div>{{ weekday }}</div>
        <div>{{ time }}</div>
        <div>{{ date }}</div>
    </div>
</template>
