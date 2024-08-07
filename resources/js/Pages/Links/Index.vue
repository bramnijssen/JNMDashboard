<script setup>
import { ref, computed } from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import LinkToggle from "../../Components/Links/LinkToggle.vue";
import axios from "axios";

const draggableClasses = ["border-2", "border-dashed", "!bg-transparent", "text-transparent"];
let draggable = null;

const jnmActive = ref(true);
const props = defineProps({
    links: Array,
});

const dashboardLinks = computed(() =>
    props.links
        .filter((link) => link.dashboard == (jnmActive.value ? "jnm" : "rental"))
        .sort((a, b) => a.position - b.position)
);

function style(hex) {
    return `background-color: ${hex}`;
}

function dragStart(e) {
    draggable = e.target;
    // Avoid displaying classes on draggable
    setTimeout(() => draggable.classList.add(...draggableClasses));
}

function dragEnd() {
    draggable.classList.remove(...draggableClasses);
    Array.from(draggable.parentElement.children).forEach((element, index) => {
        const link = props.links.find((link) => link.id == element.getAttribute("data-id"));
        if (link.position != index) {
            axios.patch(`/links/${link.id}`, {
                position: index,
            });
        }
    });
    draggable = null;
}

function dragOver(e) {
    const target = e.target;
    if (target.closest("li") !== draggable) {
        const position = draggable.compareDocumentPosition(target);
        target.parentNode.insertBefore(
            draggable,
            position === Node.DOCUMENT_POSITION_PRECEDING ? target : target.nextSibling
        );
    }
}

function deleteLink(link) {
    if (confirm(`Weet je zeker dat je de link '${link.title}' wilt verwijderen?`)) {
        axios.delete(`/links/${link.id}`);
        const index = props.links.indexOf(link);
        if (index > -1) props.links.splice(index, 1);
    }
}
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Links" />

        <LinkToggle @toggle="(e) => (jnmActive = e)"></LinkToggle>

        <div class="p-6 border border-t-0 border-gray-500 rounded-b-lg text-xl text-white flex flex-col gap-12">
            <ul v-if="dashboardLinks.length" class="flex flex-col gap-4">
                <li
                    v-for="link in dashboardLinks"
                    :key="link.id"
                    :data-id="link.id"
                    :style="style(link.hex)"
                    class="min-w-full px-6 py-3 rounded-lg border-gray-500 cursor-grab flex gap-6 items-center"
                    draggable="true"
                    @dragstart="dragStart"
                    @dragend="dragEnd"
                    @dragover="dragOver"
                >
                    <i class="fa-solid fa-grip-vertical"></i>
                    <span class="flex-1">{{ link.title }}</span>
                    <button
                        @click="deleteLink(link)"
                        class="fa-solid fa-trash-can hover:scale-90 duration-300"
                    ></button>
                </li>
            </ul>
            <span v-else class="italic text-black">Er zijn geen links</span>

            <div class="flex justify-end">
                <a :href="route('links.create', jnmActive ? 'jnm' : 'rental')"
                    ><PrimaryButton><i class="fa-solid fa-plus mr-3"></i>Nieuwe link</PrimaryButton></a
                >
            </div>
        </div>
    </AuthenticatedLayout>
</template>
