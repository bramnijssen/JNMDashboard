<script setup>
import { onMounted, ref } from "vue";
import iconMap from "@/Assets/icon-map.json";
import axios from "axios";

const iconClass = ref("wi wi-na");
const temp = ref("N/A");
const desc = ref("N/A");

onMounted(() => {
    getWeather();
    setInterval(getWeather, 300000);
});

function getWeather() {
    axios.get(`/api/weather`).then((response) => {
        const data = response.data;
        const icon = iconMap.filter((item) => item.desc == data.image);
        if (icon.length > 0) iconClass.value = `wi ${icon[0].icon}`;
        temp.value = Math.round(data.temp);
        desc.value = data.samenv;
    });
}
</script>

<template>
    <div class="flex items-center space-x-4">
        <i :class="iconClass"></i>
        <p>{{ temp }} &deg;C</p>
        <p>{{ desc }}</p>
    </div>
</template>
