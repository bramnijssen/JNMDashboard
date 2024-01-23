<script setup>
import { ref } from "vue";

const jnmActive = ref(true);

const emit = defineEmits(["toggle"]);

function toggle() {
    jnmActive.value = !jnmActive.value;
    emit("toggle", jnmActive.value);
}

function classes(jnmButton) {
    const isActive = jnmButton ? jnmActive.value : !jnmActive.value;
    const baseClasses = "flex-1 p-3 text-2xl text-center border border-gray-500 rounded-t-3xl";
    const activeClasses = isActive ? "font-semibold border-b-0" : "bg-gray-100";

    return `${baseClasses} ${activeClasses}`;
}
</script>

<template>
    <div class="flex justify-stretch">
        <button @click="toggle" :class="classes(true)">JNM</button>
        <button @click="toggle" :class="classes(false)">Verhuur</button>
    </div>
</template>
