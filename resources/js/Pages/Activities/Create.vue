<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { computed } from "vue";

const form = useForm({
    poster: null,
    title: "",
    description: "",
    from: "",
    until: "",
});

const posterObject = computed(() => {
    return URL.createObjectURL(form.poster) + "#toolbar=0&view=Fit";
});

function posterUpdate(event) {
    form.poster = event.target.files[0];
}

function submit() {
    form.post("/activities");
}
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Activiteit aanmaken" />

        <div class="mb-6">
            <h2 class="mb-2 text-3xl font-semibold">Nieuwe activiteit</h2>
            <hr class="border-gray-500" />
        </div>

        <form @submit.prevent="submit" class="flex gap-16">
            <div class="w-1/3 flex flex-col gap-6">
                <div>
                    <InputLabel for="poster" value="Poster" />
                    <input
                        id="poster"
                        type="file"
                        @change="posterUpdate"
                        class="w-full text-xl cursor-pointer focus:outline-none file:text-center file:mr-4 file:px-4 file:py-2 file:bg-amber-600 file:border-none file:cursor-pointer file:rounded-md file:font-semibold file:text-xl file:text-white file:uppercase file:hover:scale-90 file:duration-300"
                        accept="application/pdf"
                        required
                    />
                </div>

                <div v-if="form.poster" class="flex-1">
                    <object :data="posterObject" class="h-full w-full" type="application/pdf"></object>
                </div>
            </div>

            <div class="flex-1 flex flex-col gap-6">
                <div>
                    <InputLabel for="title" value="Titel" />
                    <TextInput id="title" type="text" class="block w-full" v-model="form.title" required />
                </div>

                <div>
                    <InputLabel for="description" value="Omschrijving" />
                    <textarea
                        id="description"
                        class="h-96 resize-none w-full rounded-md text-2xl"
                        v-model="form.description"
                        required
                    ></textarea>
                </div>

                <div class="flex gap-6">
                    <div>
                        <InputLabel for="from" value="Zichtbaar vanaf" />
                        <TextInput id="from" type="date" class="block" v-model="form.from" required />
                    </div>
                    <div>
                        <InputLabel for="until" value="Zichtbaar t/m" />
                        <TextInput id="until" type="date" class="block" v-model="form.until" required />
                    </div>
                </div>

                <PrimaryButton :disabled="form.processing" type="submit">Opslaan</PrimaryButton>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
