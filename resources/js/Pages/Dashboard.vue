<script setup>
import { ref } from "vue";
import DashboardHeader from "@/Components/Dashboard/Header/DashboardHeader.vue";
import { Head } from "@inertiajs/vue3";
import JNMDashboard from "@/Components/Dashboard/JNMDashboard.vue";
import Clock from "@/Components/Dashboard/Aside/Clock.vue";
import Links from "@/Components/Dashboard/Aside/Links.vue";

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

            <aside class="w-1/6 flex flex-col">
                <h1 class="text-5xl text-center">Links</h1>
                <div class="h-0 flex-auto overflow-y-auto py-4 my-4 border-y-2 border-black">
                    <Links :dashboard="jnmActive ? 'jnm' : 'rental'" />
                </div>
                <Clock class="h-1/6 flex items-center justify-center" />
            </aside>
        </div>
    </div>
</template>
