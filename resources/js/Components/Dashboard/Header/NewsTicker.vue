<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";

const items = ref([]);

onMounted(() => {
    getNewsItems();
    setInterval(getNewsItems, 300000);
});

function getNewsItems() {
    axios.get(`/api/news`).then((response) => {
        items.value = response.data;
    });
}
</script>

<template>
    <div class="bg-white py-2 text-2xl overflow-hidden">
        <div class="w-max flex">
            <div v-for="i in 2" :key="i" class="flex scroller">
                <div v-for="item in items" class="flex items-center">
                    <a :href="item.link" target="_blank" class="underline">{{ item.title }}</a>
                    <img src="@/Assets/nos-logo.svg" class="mx-4 h-6" />
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.scroller {
    animation-name: scroll;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    animation-duration: 300s;
}

@keyframes scroll {
    from {
        transform: translateX(0);
    }

    to {
        transform: translateX(-100%);
    }
}
</style>
