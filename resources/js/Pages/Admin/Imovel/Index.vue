<template>
    <app-layout title="Todos os Imóveis">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Módulo: Imóveis
            </h2>
        </template>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <h3>Listagem</h3>
            <div class="py-12">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                        </div>
                    </div>
                </div>
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
