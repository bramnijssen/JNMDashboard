<script setup>
import { computed, onMounted, ref } from "vue";
import Modal from "../Modal.vue";

const modalActive = ref(false);

const props = defineProps({
    hex: String,
    url: String,
    title: String,
});

const style = computed(() => `background-color: ${props.hex}`);

function toggleModal() {
    modalActive.value = !modalActive.value;
}
</script>

<template>
    <div
        @click="toggleModal"
        class="min-h-12 px-6 py-3 text-2xl text-white rounded-tl-xl rounded-br-xl flex gap-2 items-center"
        :style="style"
    >
        <span class="flex-1">{{ title }}</span>
        <i class="fa-solid fa-up-right-from-square"></i>
    </div>
    <Modal @close="toggleModal" :modal-active="modalActive">
        <iframe :src="url" class="h-full w-full"></iframe>
    </Modal>
</template>
