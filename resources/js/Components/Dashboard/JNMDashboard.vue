<script setup>
import { computed, onMounted, ref } from "vue";
import axios from "axios";

const activities = ref([]);
const counter = ref(0);

const translate = computed(() => {
    return `translateX(-${counter.value * 100}%)`;
});

onMounted(() => {
    getActivities();
    setInterval(getActivities, 300000);
    setInterval(moveCarousel, 60000);
});

function getActivities() {
    axios.get("/api/activities").then((response) => {
        activities.value = response.data;
    });
}

function moveCarousel() {
    counter.value = (counter.value + 1) % activities.value.length;
}

function getPosterURL(activity) {
    return `/storage/posters/${activity.id}.pdf#toolbar=0&view=Fit`;
}
</script>

<template>
    <div v-if="activities.length" class="h-full overflow-hidden">
        <div class="h-full flex carousel transition duration-1000">
            <div v-for="activity in activities" :key="activity.id" class="flex gap-6 min-w-full">
                <object :data="getPosterURL(activity)" class="w-2/5" type="application/pdf"></object>
                <div class="flex-1">
                    <div class="text-5xl font-bold pb-4 mb-4 border-b-2 border-black">{{ activity.title }}</div>
                    <pre class="font-sans text-2xl">{{ activity.description }}</pre>
                </div>
            </div>
        </div>
    </div>
    <div v-else class="h-full flex justify-center items-center">
        <div class="text-2xl italic underline font-bold">Er zijn geen aankomende activiteiten</div>
    </div>
</template>

<style scoped>
.carousel {
    transform: v-bind(translate);
}
</style>

<!-- <div class="flex w-screen">

        <div class="flex w-3/4 overflow-hidden">
            <div class="flex-none w-full bg-aqua">a</div>
            <div class="flex-none w-full bg-darkblue">b</div>
            <div class="flex-none w-full bg-green-500">c</div>
        </div>

        <div class="w-1/4 bg-pink-500">
            side
        </div>
    </div> -->
