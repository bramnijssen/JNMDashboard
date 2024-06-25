<script setup>
const props = defineProps({
    modalActive: Boolean,
});
</script>

<template>
    <Transition
        enter-active-class="duration-300 ease-out"
        enter-from-class="transform opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="duration-300 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="transform opacity-0"
    >
        <div
            v-if="modalActive"
            class="fixed z-10 left-0 top-0 h-screen w-screen bg-black/80 flex justify-center items-center"
        >
            <div class="h-4/5 w-4/5 relative">
                <i @click="$emit('close')" class="fa-solid fa-xmark absolute -right-32 -top-16 text-5xl text-white"></i>
                <div class="h-full w-full bg-white rounded-xl">
                    <slot />
                </div>
            </div>
        </div>
    </Transition>
</template>
