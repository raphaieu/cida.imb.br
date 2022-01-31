<template>
    <app-layout title="Todos os Imóveis">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Imóveis
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <h3>Imóveis</h3>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'

    export default defineComponent({
        props: [
        ],

        components: {
            AppLayout,
        },
    })
</script>
