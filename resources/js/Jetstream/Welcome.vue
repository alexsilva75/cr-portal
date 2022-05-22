<script setup>
import JetApplicationLogo from "@/Jetstream/ApplicationLogo.vue";
import ActiveSessionItem from "@/Jetstream/CR/ActiveSessionItem.vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { onMounted, computed, watch, ref } from "vue";

let connections = computed(() => usePage().props.value.connections);

// onMounted(async function () {
//     const response = await fetch(
//         "http://localhost:8000/api/v1/customers-chats"
//     );

//     const responseData = await response.json();

//     connections = responseData.connections;
//     console.log("Response data: ", responseData);
// });

function parseDate(sDate) {
    return new Date(sDate);
}
// watch(connections, async (newConnections, oldConnections) => {

// });
</script>

<template>
    <div>
        <div class="p-4 sm:px-20 bg-white border-b border-gray-200">
            <!-- <div>
                <JetApplicationLogo class="block h-12 w-auto" />
            </div> -->

            <div class="mt-4 text-2xl">Sessões ativas no Chat</div>

            <div class="mt-6 text-gray-500">
                Selecione uma sessão para iniciar o atendimento ao cliente.
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1">
            <ActiveSessionItem
                v-for="connection in connections"
                :key="connection.id"
                :startSession="parseDate(connection.created_at)"
            />
        </div>
    </div>
</template>

<style scoped>
body {
    font-size: 1.4em;
}
</style>
