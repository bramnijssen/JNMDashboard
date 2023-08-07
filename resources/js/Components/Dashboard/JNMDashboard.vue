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
                <object :data="getPosterURL(activity)" class="basis-2/5" type="application/pdf"></object>
                <div class="flex-1">
                    <div class="text-6xl font-bold">{{ activity.title }}</div>
                    <hr class="my-4 border border-black" />
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
