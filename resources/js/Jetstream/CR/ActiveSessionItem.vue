<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import moment from "moment";

defineProps({
    startSession: Date,
    customerName: {
        type: String,
        default: "Cliente",
    },
});
</script>
<template>
    <div
        class="rounded p-4 sm:px-20 m-2 shadow flex flex-row justify-between items-center"
    >
        <span>{{ customerName }}</span>
        <span
            >Iniciado em:
            {{ moment(startSession).format("DD / MM / YYYY HH:mm") }}</span
        >
        <Link class="bg-lime-700 rounded p-4 text-white" href="/"
            >Iniciar Atendimento</Link
        >
    </div>
</template>
