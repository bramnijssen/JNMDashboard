<script setup>
import GridHeader from "@/Components/GridHeader.vue";
import axios from "axios";

const props = defineProps({
    activities: Array,
    title: String,
});

const emit = defineEmits(["delete"]);

function formatDate(date) {
    return new Date(date).toLocaleDateString("nl-NL", { dateStyle: "short" });
}

function deleteActivity(activity) {
    if (confirm(`Weet je zeker dat je de activiteit '${activity.title}' wilt verwijderen?`)) {
        axios.delete(`/activities/${activity.id}`);
        emit("delete", activity);
    }
}
</script>

<template>
    <h2 class="text-2xl font-semibold">{{ title }} activiteiten</h2>

    <div class="mt-3 p-6 rounded-lg border border-gray-500 text-xl">
        <table v-if="activities.length" class="w-full">
            <thead>
                <tr class="grid grid-cols-6">
                    <GridHeader class="col-span-3">Titel</GridHeader>
                    <GridHeader>Zichtbaar vanaf</GridHeader>
                    <GridHeader>Zichtbaar t/m</GridHeader>
                    <GridHeader>Acties</GridHeader>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="activity in activities"
                    :key="activity.id"
                    class="grid grid-cols-6 mt-3 pt-3 border-t border-gray-500"
                >
                    <td class="col-span-3">{{ activity.title }}</td>
                    <td>{{ formatDate(activity.from) }}</td>
                    <td>{{ formatDate(activity.until) }}</td>
                    <td>
                        <button
                            @click="deleteActivity(activity)"
                            class="fa-solid fa-trash-can text-amber-600 hover:scale-90 duration-300"
                        ></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div v-else class="italic">Er zijn geen {{ title.toLowerCase() }} activiteiten</div>
    </div>
</template>
