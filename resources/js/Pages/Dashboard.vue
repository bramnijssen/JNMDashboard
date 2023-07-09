<script setup>
import { ref } from "vue";
import DashboardHeader from "@/Components/Dashboard/Header/DashboardHeader.vue";
import { Head } from "@inertiajs/vue3";

const jnmActive = ref(true);
</script>

<template>
    <Head title="Home" />

    <DashboardHeader @toggle="(e) => (jnmActive = e)" />

    <div v-if="jnmActive">
        <p>JNM</p>
    </div>

    <div v-else>
        <p>Verhuur</p>
    </div>
</template>
