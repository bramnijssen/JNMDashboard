<script setup>
import BreezeNavLink from "@/Components/NavLink.vue";
import AuthHeader from "@/Components/AuthHeader.vue";
</script>

<template>
    <div class="flex flex-col h-screen">
        <AuthHeader />

        <!-- Forcing min-h-0. Flex default is min-h-auto which messes with set height -->
        <div class="flex-1 flex min-h-0">
            <!-- Navigation Menu -->
            <aside class="flex-none bg-blue-300">
                <nav class="flex flex-col">
                    <BreezeNavLink :href="route('activities.index')" :active="route().current('activities.*')">
                        <i class="fa-solid fa-calendar-days mr-3"></i>
                        Activiteiten
                    </BreezeNavLink>
                    <BreezeNavLink :href="route('links')" :active="route().current('links.*')">
                        <i class="fa-solid fa-arrow-up-right-from-square mr-3"></i>
                        Links
                    </BreezeNavLink>
                </nav>
            </aside>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gray-100">
                <div class="m-6 p-6 rounded-lg border border-gray-500 bg-white">
                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>
