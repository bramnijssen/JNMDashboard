<script setup>
import { ref } from "vue";
import DashboardHeader from "@/Components/Dashboard/Header/DashboardHeader.vue";
import { Head } from "@inertiajs/vue3";
import JNMDashboard from "@/Components/Dashboard/JNMDashboard.vue";
import Clock from "@/Components/Dashboard/Clock.vue";

const jnmActive = ref(true);
</script>

<template>
    <div class="flex flex-col h-screen bg-gray-100">
        <Head title="Home" />

        <DashboardHeader @toggle="(e) => (jnmActive = e)" />

        <div class="flex-1 flex m-6">
            <div class="flex-1 mr-6 pr-6 border-r-2 border-black">
                <JNMDashboard v-if="jnmActive" />

                <div v-else>
                    <p>Verhuur</p>
                </div>
            </div>

            <div class="w-1/5 flex flex-col">
                <h1 class="text-5xl text-center">Handige links</h1>
                <div class="flex-1 py-4 my-4 border-y-2 border-black"></div>
                <Clock class="h-1/6 flex items-center justify-center" />
            </div>
        </div>
    </div>
</template>
