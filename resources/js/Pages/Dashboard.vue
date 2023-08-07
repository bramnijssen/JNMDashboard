<script setup>
import { ref } from "vue";
import DashboardHeader from "@/Components/Dashboard/Header/DashboardHeader.vue";
import { Head } from "@inertiajs/vue3";
import JNMDashboard from "@/Components/Dashboard/JNMDashboard.vue";

const jnmActive = ref(true);
</script>

<template>
    <div class="flex flex-col h-screen bg-gray-100">
        <Head title="Home" />

        <DashboardHeader @toggle="(e) => (jnmActive = e)" />

        <div class="flex-1 flex gap-6 m-6">
            <div class="flex-1">
                <JNMDashboard v-if="jnmActive" />

                <div v-else>
                    <p>Verhuur</p>
                </div>
            </div>

            <div class="basis-1/6">Handige links</div>
        </div>
    </div>
</template>
