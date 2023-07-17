<script setup>
import WeatherModule from "./WeatherModule.vue";
import DashboardToggle from "./DashboardToggle.vue";
import NewsTicker from "./NewsTicker.vue";

defineEmits(["toggle"]);
</script>

<template>
    <div>
        <div class="bg-blue-600 px-6 py-3 text-4xl text-white grid grid-cols-4 items-center">
            <WeatherModule />
            <h1 class="font-logo lowercase text-6xl col-span-2 justify-self-center">Jong Nederland Maasbree</h1>
            <DashboardToggle @toggle="(e) => $emit('toggle', e)" />
        </div>

        <NewsTicker />
    </div>
</template>
