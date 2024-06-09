<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";

const props = defineProps({
    dashboard: String,
});

const form = useForm({
    title: "",
    url: "",
    hex: "#2563eb",
    dashboard: props.dashboard,
});

function style(hex) {
    return `background-color: ${hex}`;
}

function submit() {
    form.post("/links");
}
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Link aanmaken" />

        <div class="mb-6">
            <h2 class="mb-2 text-3xl font-semibold">Nieuwe link</h2>
            <hr class="border-gray-500" />
        </div>

        <form @submit.prevent="submit" class="flex flex-col gap-12">
            <div>
                <InputLabel for="title" value="Titel" />
                <TextInput id="title" type="text" class="w-full" v-model="form.title" required />
            </div>

            <div>
                <InputLabel for="link" value="Link" />
                <TextInput id="link" type="text" class="w-full" v-model="form.url" required />
            </div>

            <div class="flex justify-between gap-12">
                <div class="basis-1/6">
                    <InputLabel value="Voorbeeld" />
                    <a
                        class="min-h-12 px-6 py-3 text-2xl text-white rounded-tl-xl rounded-br-xl flex gap-2 items-center"
                        :style="style(form.hex)"
                        :href="form.url"
                        target="_blank"
                    >
                        <span class="flex-1">{{ form.title }}</span>
                        <i class="fa-solid fa-up-right-from-square"></i>
                    </a>
                </div>

                <div class="flex-1">
                    <InputLabel for="color" value="Kleur" />
                    <TextInput id="color" type="color" class="w-full" v-model="form.hex" required />
                </div>
            </div>

            <PrimaryButton :disabled="form.processing" type="submit">Opslaan</PrimaryButton>
        </form>
    </AuthenticatedLayout>
</template>
