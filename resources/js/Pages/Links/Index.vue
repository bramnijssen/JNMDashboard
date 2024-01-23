<script setup>
import { ref, computed } from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import LinkToggle from "../../Components/Links/LinkToggle.vue";

const jnmActive = ref(true);

const props = defineProps({
    links: Array,
});

const dashboardLinks = computed(() =>
    props.links.filter((link) => link.dashboard == (jnmActive.value ? "jnm" : "rental"))
);
const dashboardLinksLength = computed(() => dashboardLinks.value.length);

function style(hex) {
    return `background-color: ${hex}`;
}
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Links" />

        <LinkToggle @toggle="(e) => (jnmActive = e)"></LinkToggle>

        <div class="p-6 border border-t-0 border-gray-500 rounded-b-lg text-xl text-white flex flex-col gap-12">
            <div v-if="dashboardLinksLength" class="flex flex-col gap-4">
                <div
                    v-for="link in dashboardLinks"
                    :key="link.id"
                    class="min-w-full px-6 py-3 rounded-lg flex gap-6 items-center"
                    :style="style(link.hex)"
                >
                    <i class="fa-solid fa-bars"></i>
                    <span class="flex-1">{{ link.title }}</span>
                    <button class="fa-solid fa-trash-can hover:scale-90 duration-300"></button>
                </div>
            </div>
            <div v-else class="italic text-black">Er zijn geen links</div>

            <div class="flex justify-end">
                <a :href="route('links.create')"
                    ><PrimaryButton><i class="fa-solid fa-plus mr-3"></i>Nieuwe link</PrimaryButton></a
                >
            </div>
        </div>
    </AuthenticatedLayout>
</template>
