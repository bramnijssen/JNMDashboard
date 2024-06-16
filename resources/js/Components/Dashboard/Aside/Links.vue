<script setup>
import Link from "@/Components/Links/Link.vue";
import { computed, onMounted, ref } from "vue";

const links = ref([]);

const props = defineProps({
    dashboard: String,
});

const dashboardLinks = computed(() =>
    links.value.filter((link) => link.dashboard == props.dashboard).sort((a, b) => a.position - b.position)
);

onMounted(() => {
    getLinks();
    setInterval(getLinks, 300000);
});

function getLinks() {
    axios.get(`/api/links`).then((response) => {
        links.value = response.data;
    });
}
</script>

<template>
    <div class="flex flex-col gap-3 text-3xl">
        <div v-for="link in dashboardLinks">
            <Link :hex="link.hex" :url="link.url" :title="link.title" />
        </div>
    </div>
</template>
