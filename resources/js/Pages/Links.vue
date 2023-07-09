<script setup>
import GridHeader from "@/Components/GridHeader.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Links" />

        <div class="p-4 rounded-lg border-2 border-gray-300 bg-white">
            <div class="pb-3 border-b-2 border-gray-400">
                <div class="grid grid-cols-3 gap-4">
                    <GridHeader>Naam</GridHeader>
                    <GridHeader>E-mailadres</GridHeader>
                    <GridHeader>Acties</GridHeader>
                </div>
            </div>

            <div v-for="user in users" :key="user.id" class="py-3 border-b-2 border-gray-300">
                <div class="grid grid-cols-3 gap-4 items-center">
                    <p>{{ user.name }}</p>
                    <p>{{ user.email }}</p>
                    <a class="fa-solid fa-trash-can text-xl text-amber-700"></a>
                </div>
            </div>

            <div class="h-96"></div>
            <div class="h-96"></div>
            <div class="h-96"></div>
            <div class="h-96"></div>
            <div class="h-96"></div>
        </div>
    </AuthenticatedLayout>
</template>
