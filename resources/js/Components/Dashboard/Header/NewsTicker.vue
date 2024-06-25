<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";
import Modal from "../../Modal.vue";

const modalActive = ref(false);
const modalItem = ref(null);
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

function toggleModal(item = null) {
    modalItem.value = item;
    modalActive.value = !modalActive.value;
}
</script>

<template>
    <div class="bg-white py-3 overflow-hidden">
        <div class="w-max flex">
            <div v-for="i in 2" :key="i" class="flex scroller">
                <div v-for="item in items" class="flex items-center">
                    <p @click="toggleModal(item)" class="text-2xl underline">{{ item.title }}</p>
                    <img src="@/Assets/nos-logo.svg" class="mx-4 h-6" />
                </div>
            </div>
        </div>
    </div>
    <Modal @close="toggleModal" :modal-active="modalActive">
        <div class="h-full w-full flex justify-center overflow-y-scroll">
            <div class="h-max w-2/5 mt-4">
                <img :src="modalItem.enclosure['@attributes'].url" class="" />
                <h1 class="my-6 text-3xl underline font-bold">{{ modalItem.title }}</h1>
                <span id="description" v-html="modalItem.description"></span>
            </div>
        </div>
    </Modal>
</template>

<style scoped>
#description :deep(h2) {
    font-size: larger;
    font-weight: bold;
}

#description :deep(p) {
    margin-bottom: 1rem;
}

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
