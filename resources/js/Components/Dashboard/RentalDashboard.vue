<script setup>
import { ref } from "vue";
import RentalInfoBlock from "@/Components/Dashboard/RentalInfoBlock.vue";
import Modal from "../Modal.vue";

const modalActive = ref(false);

function toggleModal() {
    modalActive.value = !modalActive.value;
}
</script>

<template>
    <div class="h-full flex text-2xl">
        <div class="w-2/5 pr-6 mr-6 border-r-2 border-black">
            <div class="flex flex-col gap-4 text-center">
                <h1 class="text-5xl pb-4 border-b-2 border-black">Dagje weg</h1>
                <p>
                    Of je nu op zoek bent naar ontspanning, avontuur, of een combinatie van beide, Noord-Limburg heeft
                    alles in huis om aan al jouw wensen te voldoen. Ga via onderstaande knop op zoek naar inspiratie!
                </p>
                <div @click="toggleModal" class="self-center">
                    <img src="@/Assets/visit-noord-limburg.png" />
                </div>
                <Modal @close="toggleModal" :modal-active="modalActive">
                    <iframe src="https://www.visitnoordlimburg.nl/nl" class="h-full w-full"></iframe>
                </Modal>
            </div>
        </div>

        <div class="flex-auto">
            <h1 class="text-5xl text-center pb-4 mb-4 border-b-2 border-black">Praktische info</h1>

            <div class="flex flex-col gap-6">
                <RentalInfoBlock icon="wifi" title="Wi-Fi">
                    <p>Netwerk: deblokhut</p>
                    <p>Wachtwoord: @5993BH11</p>
                </RentalInfoBlock>
                <RentalInfoBlock icon="trash-can" icon-color="text-green-700" title="Afval">
                    <ul class="list-disc list-inside">
                        <li>Per nacht/dag mag je 2 afvalzakken à 150 L bij ons deponeren</li>
                        <li>
                            Samen met de verhuurder deponeer je tijdens, of na, de verhuurperiode het afval in de
                            container
                        </li>
                        <li>Voor elke extra eenheid betaal je € 2,00</li>
                        <li>Je mag het afval ook zelf afvoeren</li>
                    </ul>
                </RentalInfoBlock>
                <RentalInfoBlock icon="triangle-exclamation" icon-color="text-yellow-500" title="Noodnummers">
                    <div class="flex flex-col gap-4">
                        <div>
                            <p>Bij acuut gevaar of twijfel: <u>112</u></p>
                            <p>Geen spoed, wel politie: <u>0900-8844</u></p>
                            <p>Geen spoed, wel brandweer: <u>0900-0904</u></p>
                        </div>
                        <div>
                            <p>Huisartsenpraktijk Maasbree: <u>077 465 15 00</u></p>
                            <i class="text-xl">* (ma t/m vr - 08:00-17:00)</i>
                            <p>Huisartsenpost Venlo: <u>0900-8818</u></p>
                            <i class="text-xl">* (avond/nacht (17:00-08:00), weekend en feestdagen)</i>
                        </div>
                    </div>
                </RentalInfoBlock>
            </div>
        </div>
    </div>
</template>
