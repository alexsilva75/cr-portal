<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    startSession: Date,
    customerName: {
        type: String,
        default: "Cliente",
    },
});
</script>
<template>
    <div class="rounded p-4 sm:px-20 m-2 shadow flex flex-row justify-between">
        <p>{{ customerName }}</p>
        <Link href="/">Iniciar Atendimento</Link>
    </div>
</template>
