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
    const baseClasses = "w-52 border-2 py-3";
    const buttonClasses = jnmButton ? "rounded-l-3xl" : "rounded-r-3xl";
    const activeClasses = isActive
        ? "bg-white bg-opacity-25 font-bold"
        : "border-opacity-50 text-white text-opacity-75";

    return `${baseClasses} ${buttonClasses} ${activeClasses}`;
}
</script>

<template>
    <div class="flex justify-end">
        <button @click="toggle" :class="classes(true)">JNM</button>
        <button @click="toggle" :class="classes(false)">Verhuur</button>
    </div>
</template>
