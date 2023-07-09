<script setup>
import BreezeNavLink from "@/Components/NavLink.vue";
import AuthHeader from "@/Components/AuthHeader.vue";
</script>

<template>
    <div class="flex flex-col h-screen">
        <AuthHeader />

        <!-- Forcing min-h-0. Flex default is min-h-auto which messes with set height -->
        <div class="flex-auto flex min-h-0">
            <!-- Navigation Menu -->
            <aside class="bg-blue-300">
                <nav class="flex flex-col">
                    <BreezeNavLink :href="route('activities')" :active="route().current('activities')">
                        <i class="fa-solid fa-calendar-days mr-3"></i>
                        Activiteiten
                    </BreezeNavLink>
                    <BreezeNavLink :href="route('links')" :active="route().current('links')">
                        <i class="fa-solid fa-arrow-up-right-from-square mr-3"></i>
                        Links
                    </BreezeNavLink>
                </nav>
            </aside>

            <!-- Page Content -->
            <main class="flex-auto overflow-y-auto">
                <div class="m-4">
                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>
