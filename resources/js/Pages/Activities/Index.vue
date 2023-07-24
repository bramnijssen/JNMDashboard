<script setup>
import ActivitiesSection from "@/Components/Activities/ActivitiesSection.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

import { Head } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    activities: Array,
});

const now = new Date();

const currentActivities = computed(() => {
    return props.activities.filter((activity) => now >= new Date(activity.from) && now <= new Date(activity.until));
});

const upcomingActivities = computed(() => {
    return props.activities.filter((activity) => now < new Date(activity.from));
});

const pastActivities = computed(() => {
    return props.activities.filter((activity) => now > new Date(activity.until));
});

function deleteActivity(activity) {
    const index = props.activities.indexOf(activity);
    if (index > -1) props.activities.splice(index, 1);
}
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Activiteit" />

        <div class="flex flex-col gap-6">
            <div class="flex justify-end">
                <a :href="route('activities.create')"
                    ><PrimaryButton><i class="fa-solid fa-plus mr-3"></i>Nieuwe activiteit</PrimaryButton></a
                >
            </div>

            <div>
                <ActivitiesSection :activities="currentActivities" title="Actuele" @delete="deleteActivity" />
            </div>

            <div>
                <ActivitiesSection :activities="upcomingActivities" title="Aankomende" @delete="deleteActivity" />
            </div>

            <div>
                <ActivitiesSection :activities="pastActivities" title="Verlopen" @delete="deleteActivity" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
