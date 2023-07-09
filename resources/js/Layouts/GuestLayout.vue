<script setup>
import AuthHeader from "@/Components/AuthHeader.vue";
</script>

<template>
    <div class="flex flex-col min-h-screen">
        <AuthHeader />

        <div class="flex-1 flex flex-col justify-center items-center">
            <div class="w-full max-w-md px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg">
                <slot />
            </div>
        </div>
    </div>
</template>
